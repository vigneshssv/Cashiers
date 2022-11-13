<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\SubscriptionItem;
use Auth;
use Stripe;
use Validator;
use Response;

class ProductsController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $products = Product::where('status', 'active')
                    ->select('id','uuid', 'name', 'price', 'description','status')
                    ->get();
        return view('products.index', compact('products'));
    }

    public function product_details($id = '') {
        if(!empty($id)) {
            $products = Product::where('uuid', $id)
                        ->select('id','uuid', 'name', 'price', 'description','status')
                        ->first();

            if(!empty($products)) {
                  $intent = auth()->user()->createSetupIntent();

                return view('products.product_details', compact('products', 'intent'));
            } else {
                return redirect('/home')->with('error_message', 'Something Went Wrong...!');;
            }
        }
    }

    public function purchase(Request $request) {
        $id = (isset($request->id) && !empty($request->id)) ? $request->id : '';
        $payment_method = (isset($request->payment_method) && !empty($request->payment_method)) ? $request->payment_method : '';
        if(!empty($id) && !empty($payment_method)) {

        $user = auth()->user();
        
        $products = Product::where('uuid', $request->id)->first();

        try {
            $secret_key = env('STRIPE_SECRET');
            if(empty($secret_key)) {
                $secret_key = config('app.STRIPE_SECRET');
            }
            $stripe = new \Stripe\StripeClient($secret_key);

            $customer = $stripe->customers->create(
              [
                'name' => (isset($user->name) && !empty($user->name)) ? $user->name : NULL,
                'payment_method' => $payment_method,
                'address' => [
                  'line1' => (isset($user->address) && !empty($user->address)) ? $user->address : NULL,
                  'postal_code' => '98140',
                  'city' => 'San Francisco',
                  'state' => 'CA',
                  'country' => 'US',
                ],
              ]
            );

            if(isset($customer['id']) && !empty($customer['id'])) {

            $order_details = $stripe->paymentIntents->create(
              [
                'description' => (isset($products->description) && !empty($products->description)) ? $products->description : NULL,
                'payment_method' => $payment_method,
                'confirm' => true,
                'customer' => $customer['id'],
                'shipping' => [
                  'name' => (isset($rquest->card_holder_name) && !empty($rquest->card_holder_name)) ? $rquest->card_holder_name : NULL,
                  'address' => [
                    'line1' => (isset($user->address) && !empty($user->address)) ? $user->address : NULL,
                    'postal_code' => '98140',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'country' => 'US',
                  ],
                ],
                'amount' => (isset($products->price) && !empty($products->price)) ? (int)round($products->price) * 100 : NULL,
                'currency' => 'inr',
                'payment_method_types' => ['card']
              ]
            );
            if($order_details['status'] == "succeeded") {
                $data = array(
                  'user_id' => Auth::user()->id,
                  'name' => (isset($products->name) && !empty($products->name)) ? $products->name : NULL,
                  'stripe_id' => (isset($order_details['id']) && !empty($order_details['id'])) ? $order_details['id'] : NULL,
                  'stripe_status' => (isset($order_details['status']) && !empty($order_details['status'])) ? $order_details['status'] : NULL,
                  'stripe_price' => (isset($products->price) && !empty($products->price)) ? $products->price : NULL,
                );
                $subscription = Subscription::create($data);
                if($subscription == true) {
                    $item_data = array(
                        'subscription_id' => (isset($subscription->id) && !empty($subscription->id)) ? $subscription->id : NUlL,
                        'stripe_id' => (isset($order_details['id']) && !empty($order_details['id'])) ? $order_details['id'] : NULL,
                        'stripe_product' => (isset($products->id) && !empty($products->id)) ? $products->id : NULL,
                        'stripe_price' => (isset($products->price) && !empty($products->price)) ? $products->price : NULL
                    );
                    SubscriptionItem::create($item_data);
                }
                return redirect('/home')->with('flash_message', 'Product Purchsed Successfully...!');
            } else {
                 return redirect('/home')->with('error_message', 'Payment is Pending.Kindly contact the administration...!');
            }
            } else {
                return redirect('/home')->with('error_message', 'Customer Not Found...!');
            }
         

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            return back()->with('error', $exception->getMessage());
        }

        
    } else {
         return redirect('/home')->with('error_message', 'Product Not Found...!');
    }
    }

    function validate_purchase_form(Request $request) {
        $rules = [
            'card_holder_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }
}

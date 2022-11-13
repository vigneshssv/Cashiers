@extends('layouts.app')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="card card-solid">
        <div class="card-body">
          <form method="POST" action="{{ url('/purchase') }}" class="card-form mt-3 mb-3 products_form">
    @csrf
    <input type="hidden" name="id" value="{{ (isset($products->uuid) && !empty($products->uuid)) ? $products->uuid : '' }}">
   
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="{{ asset('images/laptop.png') }}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{ asset('images/laptop.png') }}" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="{{ asset('images/laptop.png') }}" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="{{ asset('images/laptop.png') }}" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="{{ asset('images/laptop.png') }}" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="{{ asset('images/laptop.png') }}" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ (isset($products->name) && !empty($products->name)) ? $products->name : '-' }}</p>
              </h3>
              <hr>
              <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div>

            

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 ₹ {{ (isset($products->price) && !empty($products->price)) ? $products->price : '0' }}
                </h2>
                <h4 class="mt-0">
                  <small>Include All Taxes </small>
                </h4>
              </div>

              <div class="col-md-12 pt-4">

               
               <div class="row">
                <input type="hidden" name="payment_method" class="payment-method">
                <div class="col-md-6">
                <input class="form-control StripeElement mb-3" name="card_holder_name" placeholder="Card holder name" required>
                <span class="help-block text-danger card_holder_name_error"></span>
              </div>
                <div class="col-md-6">
                    <div id="card-element"></div>
                    <span class="help-block text-danger cardnumber_error"></span>
                </div>
              </div>
                <div id="card-errors" role="alert"></div>
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary pay" onclick="validate_purchase();">
                        Purchase
                    </button>
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ (isset($products->description) && !empty($products->description)) ? $products->description : '0' }}</div>
            </div>
          </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <script src="https://js.stripe.com/v3/"></script>

      <script>
       
    let stripe = Stripe('{{config('app.STRIPE_KEY')}}');
    let elements = stripe.elements();
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style});
    card.mount('#card-element');
    let paymentMethod = null;
    $('.card-form').on('submit', function (e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
            }
        })
        return false
    });
</script>
    @endsection
@section('css')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('js')


@endsection
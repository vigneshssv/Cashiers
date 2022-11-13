@extends('layouts.app')
@section('content')
   
   
    <div class="row">
        @forelse($products as $item)
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions">
                        <img src="{{ asset('images/laptop.png') }}" class="card-img img-fluid" width="96" height="350" alt="" />
                    </div>
                </div>

                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2">
                            <a href="#" class="text-default mb-2" data-abc="true">{{ (isset($item->name) && !empty($item->name)) ? $item->name : '-' }}</a>
                        </h6>

                        <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>

                    <h3 class="mb-0 font-weight-semibold">₹ {{ (isset($item->price) && !empty($item->price)) ? $item->price : '0' }}</h3>

                    <div>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                    </div>

                    <div class="text-muted mb-3">34 reviews</div>
                 
                   <a href="{{ url('product-details', [$item->uuid]) }}"> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Buy Now</button></a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <h5 class="text-center"><b>No Data Found</b></h5>
        </div>
        @endforelse
        <!-- forloop end -->
    </div>
@endsection

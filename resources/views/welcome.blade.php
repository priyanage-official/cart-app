@extends('app')

@section('main-section')
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if(count($productData) > 0)
            @foreach($productData as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{$product->product_image}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><a target="_blank" href="{{route('product-details', ['id' => $product->id])}}">{{$product->product_name}}</a></h5>
                            <!-- Product price-->
                            ${{$product->product_price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            @php
                                $btnTxt = 'Add to cart';
                                $btnId = 'AddToCart-'.$product->id;
                                $btnClass = 'AddToCart';
                                $btnBadge = 'primary';

                                if(session('user') && in_array($product->id,$userCart)){
                                    $btnTxt = 'Remove from cart';
                                    $btnId = 'RemoveFromCart-'.$product->id;
                                    $btnClass = 'RemoveFromCart';
                                    $btnBadge = 'danger';
                                }
                            @endphp
                            <a class="btn btn-{{$btnBadge}} mt-auto {{$btnClass}}" id="{{$btnId}}">
                               {{$btnTxt}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3>No Products Found</h3>
            @endif
        </div>
    </div>
@endsection

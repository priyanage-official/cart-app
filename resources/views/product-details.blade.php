@extends('app')

@section('main-section')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $productData->product_image }}"
                    alt="..." /></div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $productData->product_name }}</h1>
                <div class="fs-5 mb-5">
                    <span>${{ $productData->product_price }}</span>
                </div>
                <p class="lead">{{ $productData->product_description }}</p>
                <div class="d-flex">
                    {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" /> --}}
                    @php
                        $btnTxt = 'Add to cart';
                        $btnId = 'AddToCart-' . $productData->id;
                        $btnClass = 'AddToCart';
                        $btnBadge = 'primary';

                        if (session('user') && in_array($productData->id, $userCart)) {
                            $btnTxt = 'Remove from cart';
                            $btnId = 'RemoveFromCart-' . $productData->id;
                            $btnClass = 'RemoveFromCart';
                            $btnBadge = 'danger';
                        }
                    @endphp

                    <a class="btn btn-{{ $btnBadge }} mt-auto {{ $btnClass }}" id="{{ $btnId }}">
                        {{ $btnTxt }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

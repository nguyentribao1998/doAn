@extends('client.layouts.master')

@section('title')
    Tìm kiếm
@endsection

@section('content')

    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                    <span>T</span>ìm
                    <span>K</span>iếm

                    <!-- //tittle heading -->
                    <div class="row">
                        <!-- product left -->
                        <div class="agileinfo-ads-display col-lg-9">
                            <div class="wrapper">
                                <!-- first section -->
                                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

                                    <div class="row">
                                        @foreach($product as $pro)
                                            <div class="col-md-4 product-men mt-5">
                                                <div class="men-pro-item simpleCart_shelfItem">
                                                    <div class="men-thumb-item text-center">
                                                        <img src="img/upload/product/{{ $pro->image }}" class="img-fluid" style="height: 225px">
                                                        <div class="men-cart-pro">
                                                            <div class="inner-men-cart-pro">
                                                                <a href="{{route('Chitiet',['id' => $pro->id] ) }}" class="link-product-add-cart">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info-product text-center border-top mt-4">
                                                        <h4 class="pt-1">
                                                            <a href="single.html">{{ $pro->name }}</a>
                                                        </h4>
                                                        <div class="info-product-price my-2">
                                                            @if($pro->promotional>0)
                                                                <span class="item_price">
													{{ number_format($pro->promotional) }}
												</span>
                                                                <del>{{ number_format($pro->price) }}</del>
                                                            @else
                                                                <span class="item_price">
													{{ number_format($pro->price) }}
												</span>
                                                            @endif
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                            <a href="{{ route('addCart',['id' => $pro->id]) }}"  style="font-size: 13px;color: #fff; background: #0879c9; text-decoration: none; border: none; border-radius: 0;width: 100%; text-transform: uppercase; padding: 13px; outline: none; letter-spacing: 1px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.45);font-weight: 600;cursor: pointer; border-radius: 4px;transition: 0.5s all; -webkit-transition: 0.5s all;-moz-transition: 0.5s all;-o-transition: 0.5s all; -ms-transition: 0.5s all;">Thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
@endsection
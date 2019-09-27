@extends('client.layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('content')
    <div class="page-head_agile_info_w3l">
    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="#">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Loại sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>


    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">

        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">

                        <div class="row">
                            @foreach($sp_theoloai as $lsp)
                                <div class="col-md-4 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img src="{{ URL::to('/') }}/img/upload/product/{{ $lsp->image }}" alt="{{ $lsp->Title }}" data-imagezoom="true" class="img-fluid" style="height: 225px"/>
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{route('Chitiet',['id' => $lsp->id] ) }}" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="single.html">{{ $lsp->name }}</a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                @if($lsp->promotional>0)
                                                    <span class="item_price">
													{{ number_format($lsp->promotional) }}
												</span>
                                                    <del>{{ number_format($lsp->price) }}</del>
                                                @else
                                                    <span class="item_price">
													{{ number_format($lsp->price) }}
												</span>
                                                @endif
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <a href="{{ route('addCart',['id' => $lsp->id]) }}"  style="font-size: 13px;color: #fff; background: #0879c9; text-decoration: none; border: none; border-radius: 0;width: 100%; text-transform: uppercase; padding: 13px; outline: none; letter-spacing: 1px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.45);font-weight: 600;cursor: pointer; border-radius: 4px;transition: 0.5s all; -webkit-transition: 0.5s all;-moz-transition: 0.5s all;-o-transition: 0.5s all; -ms-transition: 0.5s all;">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
@endsection
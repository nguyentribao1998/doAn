@extends('client.layouts.master');
@section('title')
   Thông tin chi tiết sản phẩm
@endsection

@section('content')
    <!-- page -->
    <div class="page-head_agile_info_w3l">
    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="trangchu">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Chi tiết sản phẩm {{$chitiet->name}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>C</span>hi tiết sản phẩm
                </h3>
            <!-- //tittle heading -->
            <div class="row">

                <div class="col-lg-5 col-md-8 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider">
                            <ul class="slides">
                                <img src="{{ URL::to('/') }}/img/upload/product/{{ $chitiet->image }}" alt="{{ $chitiet->Title }}" data-imagezoom="true" class="img-fluid" style="height: 225px"/>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                    <h3 class="mb-3">{{ $chitiet->name }}</h3>
                    <p class="mb-3">
                        @if($chitiet->promotional > 0)
                            <span class="item_price">
                                {{number_format($chitiet ->promotional)}}
                            </span>
                            <del class="mx-2 font-weight-light">
                                {{number_format($chitiet ->price)}}
                            </del>
                        @else
                            <span class="item_price">
                                {{number_format($chitiet ->price)}}
                            </span>

                        @endif

                        <label>Giao hàng miễn phí</label>
                    </p>
                    <div class="single-infoagile">
                        <ul>
                            <li class="mb-3">
                            Thanh toán sau khi mua hàng
                            </li>
                            <li class="mb-3">
                                Giao hàng nhanh nhát có thể
                            </li>
                            <li class="mb-3">
                               Khuyến mại từ 200000 VND
                            </li>
                            <li class="mb-3">
                                Ưu đãi giảm từ 5 % khi thanh toán từ thẻ ngân hàng
                            </li>
                        </ul>
                    </div>
                    <div class="product-single-w3l">
                        <p class="my-3">
                            <i class="far fa-hand-point-right mr-2"></i>
                            {{$chitiet->Warranty}}
                        </p>
                       {!! $chitiet->description !!}
                        <p class="my-sm-4 my-3">
                            <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                        </p>
                    </div>
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <a href="{{ route('addCart',['id' => $chitiet->id]) }}" style="font-size: 13px;color: #fff; background: #0879c9; text-decoration: none; border: none; border-radius: 0;width: 100%; text-transform: uppercase; padding: 13px; outline: none; letter-spacing: 1px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.45);font-weight: 600;cursor: pointer; border-radius: 4px;transition: 0.5s all; -webkit-transition: 0.5s all;-moz-transition: 0.5s all;-o-transition: 0.5s all; -ms-transition: 0.5s all;">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
        </div>

            <div class="row" >
                <div class="col-md-12">
                    <h4>Bình luận</h4>
                    <div class="col-md-6 comment">
                        <form method="post" action="{{route('Comment',['id' => $chitiet->id])}}">
                            <div class="form-group">
                                <label for="email" >Email</label>
                                <input type="email" class="form-control" id="email" name="email" style="width: 900px;">
                            </div>
                            <div class="form-group">
                                <label for="name"style="text-align: center">Tên:</label>
                                <input type="text" class="form-control" id="name" name="name" style="width: 900px;">
                            </div>
                            <div class="form-group">
                                <label for="cm" style="text-align: center">Bình luận</label>
                                <textarea name="cm_content" id="" cols="30" rows="10" style="width: 900px;"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button   type="submit" class=" btn btn-default"style="text-align: center">Gửi</button>
                            </div>
                            {{csrf_field()}}
                        </form>

                    </div>
                </div>
            </div>


    </div>
        <div class="testimonials py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <!-- tittle heading -->
                <h3 class="tittle-w3l text-center text-white mb-lg-5 mb-sm-4 mb-3">
                    <span>O</span>ur
                    <span>C</span>ustomers
                    <span>S</span>ays</h3>
                <!-- tittle heading -->
                <div class="row gallery-index">
                    <div class="col-sm-6 med-testi-grid">
                        <div class="med-testi test-tooltip rounded p-4">
                            <p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="row med-testi-left my-5">
                            <div class="col-lg-2 col-3 w3ls-med-testi-img">
                                <img src="images/user.jpg" alt=" " class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-lg-10 col-9 med-testi-txt">
                                <h4 class="font-weight-bold mb-lg-1 mb-2">Tyson</h4>
                                <p>fames ac turpis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 med-testi-grid">
                        <div class="med-testi test-tooltip rounded p-4">
                            <p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="row med-testi-left my-5">
                            <div class="col-lg-2 col-3 w3ls-med-testi-img">
                                <img src="images/user.jpg" alt=" " class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-lg-10 col-9 med-testi-txt">
                                <h4 class="font-weight-bold mb-lg-1 mb-2">Alejandra</h4>
                                <p>fames ac turpis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 med-testi-grid">
                        <div class="med-testi test-tooltip rounded p-4">
                            <p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="row med-testi-left mt-sm-5 my-5">
                            <div class="col-lg-2 col-3 w3ls-med-testi-img">
                                <img src="images/user.jpg" alt=" " class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-lg-10 col-9 med-testi-txt">
                                <h4 class="font-weight-bold mb-lg-1 mb-2">Charles</h4>
                                <p>fames ac turpis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 med-testi-grid">
                        <div class="med-testi test-tooltip rounded p-4">
                            <p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="row med-testi-left mt-5">
                            <div class="col-lg-2 col-3 w3ls-med-testi-img">
                                <img src="images/user.jpg" alt=" " class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-lg-10 col-9 med-testi-txt">
                                <h4 class="font-weight-bold mb-lg-1 mb-2">Jessie</h4>
                                <p>fames ac turpis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
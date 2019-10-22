

@extends('client.layouts.master')

@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container">

        <!-- slider -->
        @include('client.layouts.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('client.layouts.menu')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Tin tức</h2>
                    </div>

                    <div class="panel-body">
                        @foreach($theloai as $tl)
                        <div class="row-item row">
                            <h3>
                                <a href="category.html">{{$tl->name}}</a> |

                                @if(count($tl ->loaitin)>0)
                                    @foreach($tl ->loaitin as $lt)
                                <small><a href="category.html"><i>{{$lt->name}}</i></a>/</small>
                                    @endforeach
@endif
                            </h3>

                            <div class="col-md-8 border-right">
                                <div class="col-md-5">
                                    <a href="detail.html">
                                        <img class="img-responsive" src="" alt="">
                                    </a>
                                </div>
                                @foreach($tintuc as $tt)

                                <div class="col-md-7">
                                    <h3>{{$tt->TieuDe}}</h3>
                                    <p>{{$tt->TomTat}}</p>
                                    <a class="btn btn-primary" href="detail.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                @endforeach
                            </div>


                            <div class="col-md-4">
                                <a href="detail.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>

                                <a href="detail.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>

                                <a href="detail.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>

                                <a href="detail.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>
                            </div>

                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <!-- item -->

                        <!-- end item -->
@endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

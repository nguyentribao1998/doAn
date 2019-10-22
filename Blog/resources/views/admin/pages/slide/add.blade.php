@extends('admin.layouts.master')

@section('title')
    Thêm slide
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm slide</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('slide.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập tên ">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </fieldset>

                    <div class="form-group">
                        <label>Nội dung </label>
                        <textarea name="noidung" id="demo" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('noidung'))
                            <div class="alert alert-danger">{{ $errors->first('noidung') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <fieldset class="form-group">
                        <label>Link</label>
                        <textarea name="link" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('link'))
                            <div class="alert alert-danger">{{ $errors->first('link') }}</div>
                        @endif
                    </fieldset>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
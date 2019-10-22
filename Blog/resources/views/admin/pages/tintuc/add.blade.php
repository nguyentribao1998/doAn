@extends('admin.layouts.master')

@section('title')
    Thêm tin tức
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('tintuc.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhập tên tiêu đề">
                        @if($errors->has('TieuDe'))
                            <div class="alert alert-danger">{{ $errors->first('TieuDe') }}</div>
                        @endif
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="TomTat" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('TomTat'))
                            <div class="alert alert-danger">{{ $errors->first('TomTat') }}</div>
                        @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Nội dung tin tức</label>
                        <textarea name="NoiDung" id="demo" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('NoiDung'))
                            <div class="alert alert-danger">{{ $errors->first('NoiDung') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity">Nổi bật</label>
                        <input type="number" name="NoiBat" min="1" value="1" class="form-control">
                        @if($errors->has('NoiBat'))
                            <div class="alert alert-danger">{{ $errors->first('NoiBat') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượt xem</label>
                        <input type="number" name="SoLuotXem" min="0" value="1" class="form-control">
                        @if($errors->has('SoLuotXem'))
                            <div class="alert alert-danger">{{ $errors->first('SoLuotXem') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Loại tin tức</label>
                        <select class="form-control proTypeProduct" name="idLoaiTin">
                            @foreach($loaitin as $lt)
                                <option value="{{ $lt->id }}">{{ $lt->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
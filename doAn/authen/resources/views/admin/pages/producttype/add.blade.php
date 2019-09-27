@extends('admin.layouts.master')
@section('title')
    Thêm danh mục sản phẩm
@endsection
@section('content')
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product Type</h6>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="{{route('producttype.store')}}" method="post">
                @csrf
                <fieldset class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Nhập tên loại sp" name="name">


                    @if($errors -> has('name'))
                        <div class="alert alert-danger">{{ $errors ->first('name') }}</div>

                    @endif



                </fieldset>
                <fieldset class="form-group">
                    <label>Slug</label>
                    <input class="form-control" placeholder="Nhập slug" name="slug">
                </fieldset>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Hiển thị</option>
                        <option value="0">Không hiển thị</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="idCategory">
                        @foreach($category as $cate)

                        <option value="{{$cate->id}}"> {{$cate ->name}}</option>
                            @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-success">Thêm</button>
                <button type="reset" class="btn btn-primary">Nhập lại</button>

            </form>

        </div>
    </div>
    </div>
@endsection
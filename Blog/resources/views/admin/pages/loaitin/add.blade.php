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
                <form role="form" action="{{route('loaitin.store')}}" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Nhập tên loại tin" name="name">


                        @if($errors -> has('name'))
                            <div class="alert alert-danger">{{ $errors ->first('name') }}</div>

                        @endif



                    </fieldset>


                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="idTheLoai">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}"> {{$tl ->name}}</option>
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
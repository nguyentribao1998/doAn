@extends('admin.layouts.master')
@section('title')
    Thêm danh mục sản phẩm
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thể Loại</h6>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="{{route('theloai.store')}}" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" placeholder="Nhập tên thể loại" name="name">
                    </fieldset>


                    <button type="submit" class="btn btn-success">Submit Button</button>
                    <button type="reset" class="btn btn-primary">Reset Button</button>

                </form>

            </div>
        </div>
    </div>
@endsection
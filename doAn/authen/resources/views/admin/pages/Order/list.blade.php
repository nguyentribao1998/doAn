@extends('admin.layouts.master')

@section('title')
	Danh sách loại sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Quản lí đơn hàng</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                    <tr>
	                        <th>STT</th>
	                        <th>Name order</th>
	                        <th>Địa chỉ</th>
	                        <th>Ngày đặt</th>
	                        <th>Email</th>
	                        <th>Trạng thái</th>
	                        <th>Chỉnh sửa</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
                            <th>STT</th>
                            <th>Name order</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đặt</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Chỉnh sửa</th>
	                    </tr>
	                </tfoot>
	                <tbody>
						@foreach($all_order as $key => $order)
		                    <tr>
		                        <td>{{ $key+1 }}</td>
		                        <td>{{ $order->name }}</td>
		                        <td>{{ $order->address }}</td>
		                        <td>
                                    {{ $order->created_at }}
		                        </td>
		                        <td>{{ $order->email }}</td>

		                        <td>
                                    @if($order->status == 1)
                                        {{ 'Đã giao dịch' }}
                                    @else
                                        {{ 'chưa giao dịch' }}
                                    @endif
                                </td>
		                        <td>
		                        	<button class="btn btn-danger deleteUser" title="{{ "Xóa ".$order->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $order->id }}"><i class="fas fa-trash-alt"></i></button>
		                        </td>
		                    </tr>
						@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
	<!-- Edit Modal-->

    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delUser">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
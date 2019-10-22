$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $('.edit').click(function() {
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: 'admin/theloai/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function ($result) {
                console.log($result);
                $('.name').val($result.name);
                $('.title').text($result.name);
            }
        });
    });
    $('.update').click(function(){
        let ten = $('.name').val();
        let id = $(this).data('id');
        $.ajax({
            url : 'admin/theloai/'+id,

            data : {
                name : ten,
                id: id
            },
            type : 'put',
            dataType : 'json',
            success : function($result){
                toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                $('#edit').modal('hide');
                location.reload();
            },



        });
    });
    //delete loai tin
    $('.deleteLoaiTin').click(function(){
        let id = $(this).data('id');
        $('.delLoaiTin').click(function(){
            $.ajax({
                url : 'admin/loaitin/'+id,
                dataType : 'json',
                type : 'delete',
                success : function($data){
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });


    });
//delete thể loại
    $('.delete').click(function(){
        let id = $(this).data('id');
        $('.del').click(function(){
            $.ajax({
                url : 'admin/theloai/'+id,
                dataType : 'json',
                type : 'delete',
                success : function($data){
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });


    });
    //delete Slide
    $('.deleteSlide').click(function(){
        let id = $(this).data('id');
        $('.delSlide').click(function(){
            $.ajax({
                url : 'admin/slide/'+id,
                dataType : 'json',
                type : 'delete',
                success : function($data){
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });


    });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#file').on('change',()=>{
    
    var formData = new FormData();
    var file = $('#file')[0].files[0]
    formData.append('file',file)
    $.ajax({
        url : '/upload',
        processData: false,//illega invocation
        dataType: 'json',
        data: formData,
        method: 'POST',
        contentType: false,// khong hien o preview
        success: function(result){
            if(result.success == true)
            {
                html = '';
                html+= '<img src="'+result.path+'" alt="">';
                $('#input-file-img').html(html)
                $('#input-file-img-hiden').val(result.path)
            }
        }
    })
    })


    ///THEM NHIEU ANH ------------------------------------------------------------------------------------------------------------------

    $('#files').on('change',()=>{
        var formData = new FormData()
        var files = $('#files')[0].files
        for (let index = 0; index < files.length; index++) {
            formData.append('files[]',files[index])
        }
        $.ajax({
            url:'/uploads',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            processData: false,
            success:function(result){
                if(result.success = true)
                {
                    
                        html =''
                        for (let index = 0; index < result.url.length; index++) {
                           html+='<img src="'+result.url[index]+'" alt=""><input type="hidden" value="'+result.url[index]+'" class="product_images" name="product_images[]">'
                           $('#input-file-imgs').html(html)
                           
                       
                        }
                    }
    
                
            }
        })
    })


//delete row product list
    function removeRow(product_id, url) {
        if (confirm("Bạn Có Chắc Chán Xóa?")) {
            $.ajax({
                url: url,
                data: { product_id },
                method: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    if (res.success == true) {
                        setTimeout(function() {
                                location.reload();
                        }, 2000); 
                    } else {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                },
                error: function() {
                    alert("Không thể kết nối đến máy chủ. Vui lòng kiểm tra kết nối mạng.");
                }
            });
        }
    }

    
    function removeRows(slide_id, url) {
        if (confirm("Bạn Có Chắc Chán Xóa?")) {
            $.ajax({
                url: url,
                data: { slide_id },
                method: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    if (res.success == true) {
                        setTimeout(function() {
                                location.reload();
                        }, 2000); 
                    } else {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                },
                error: function() {
                    alert("Không thể kết nối đến máy chủ. Vui lòng kiểm tra kết nối mạng.");
                }
            });
        }
    }


    function removeRowOD(order_id, url) {
        if (confirm("Bạn Có Chắc Chán Xóa?")) {
            $.ajax({
                url: url,
                data: { order_id },
                method: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    if (res.success == true) {
                        setTimeout(function() {
                                location.reload();
                        }, 2000); 
                    } else {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                },
                error: function() {
                    alert("Không thể kết nối đến máy chủ. Vui lòng kiểm tra kết nối mạng.");
                }
            });
        }
    }


    function removeRowOD(user_id, url) {
        if (confirm("Bạn Có Chắc Chán Xóa?")) {
            $.ajax({
                url: url,
                data: { user_id },
                method: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    if (res.success == true) {
                        setTimeout(function() {
                                location.reload();
                        }, 2000); 
                    } else {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                },
                error: function() {
                    alert("Không thể kết nối đến máy chủ. Vui lòng kiểm tra kết nối mạng.");
                }
            });
        }
    }



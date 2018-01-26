 // Cập nhật tổng quan, thủ tục nhập học
  $('#ok').css('display', 'none');
  $('#edit').click(function(){
      $('#ok').css('display', 'block');
      $('.go_back').css('display', 'none');
      $(this).css('display', 'none');
      // $('input').removeAttr('readonly');
      $('input').removeAttr('disabled');
      // $('textarea').removeAttr('readonly');
      $('select').removeAttr('disabled');
      $('.mce-toolbar').show();
      tinymce.activeEditor.getBody().setAttribute('contenteditable', true);
      return false;
  });

  $(window).on('load', function(){
    
    if($('textarea').hasClass('txt_hide')){
      $('.mce-toolbar').hide();
      tinymce.activeEditor.getBody().setAttribute('contenteditable', false);
    }
  });

  $(document).ready(function () {
    var pathname = window.location.pathname;

    $('#check-all').change(function() {
        var checkboxes = $(this).closest('form').find(':checkbox');
        if($(this).is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    });
    $('.checkbox').change(function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#check-all').prop('checked', true);
        }else{
            $('#check-all').prop('checked', false);
        }
    });
    if($('#select_main').length == 1 && $('#select_category').length == 1 && $('#url').length == 1){
        $('#menu-form').validate({
            rules: {
                title: {
                    required: true
                },
                select_main: {
                    required: true
                },
                select_category: {
                    required: true
                },
                url: {
                    required: true
                }
            },
            messages :{
                title: {
                    required : 'Cần nhập tên menu'
                },
                select_main: {
                    required: 'Cần chọn menu chính'
                },
                select_category: {
                    required: 'Cần chọn danh mục hoặc bài viết'
                },
                url: {
                    required: 'Đường dẫn không được trống'
                }
            }
        });
    }else{
        $('#menu-form').validate({
            rules: {
                title: {
                    required: true
                }
            },
            messages :{
                title: {
                    required : 'Cần nhập tên menu'
                }
            }
        });
    }


});

$('.cat').change(function(){
    var cat = $(this).val();
    if(cat == 1){
        $('.sub-cat').slideDown();
    }else{
        $('.sub-cat').slideUp();
    }
    return false;
});

// xoa danh sach
$('.btn-remove').click(function(e){
  e.preventDefault();
  var image_id = $(this).data('image');
  var client_id = $(this).data('id');
  var url = $(this).attr('href');
  if(confirm('Chắc chắn xóa?')){
    $(this).parents('tr').fadeOut();
    $.ajax({
        url: url,
        type: 'GET',
        data: {id : client_id, image_id : image_id}
    })
  }
  
  return false;
});

//xoa category

$('.btn-remove-category').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var check = $(this);
    var url = $(this).attr('href');
    if(confirm('Chắc chắn xóa?')){
        jQuery.ajax({
            method: "get",
            url: url,
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {id : id},
            success: function(result){
                if(JSON.parse(result).isExists == false){
                    alert('Vui lòng xóa bài viết trong danh mục này trước');
                }else{
                    $(check).parents('tr').fadeOut();
                }
            }
        });
    };
    return false;
});

 $('.btn-remove-menu').click(function(e){
     e.preventDefault();
     var client_id = $(this).data('id');
     var url = $(this).data('url');
     if(confirm('Chắc chắn xóa?')){
         $(this).parents('li').fadeOut();
         $.ajax({
             url: url,
             method: 'GET',
             data: {
                 id : client_id
             },
             success: function(){

             }
         })
     }

     return false;
 });

 $('.btn-active-menu').click(function(e){
     e.preventDefault();
     var parent_id = $(this).data('parent-id');
     var client_id = $(this).data('id');
     var is_actived = $(this).data('active');

     var message = (is_actived == 1) ? 'Chắc chắn tắt?' : 'Chắc chắn bật?';
     var url = $(this).data('url');
     if(confirm(message)){
         $.ajax({
             url: url,
             method: 'GET',
             data: {
                 parent_id : parent_id,
                 id : client_id,
                 is_actived : is_actived
             },
             success: function(){
                window.location.reload();
             }
         })
     }

     return false;
 });

 $('#select_main').change(function(){
    if($('#select_main').val() == 'article'){
        $('#select_article').prop('disabled', true);
    }else{
        $('#select_article').prop('disabled', false);
    }
    $('#select_category').html('');
    $('#select_article').html('');
    $.ajax({
        method: 'GET',
        url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/admin/menu/fetch_category",
        data: {
            main_category: $('#select_main').val()
        },
        success: function(res){
            var categories = JSON.parse(res).data;

            if($('#select_main').val() == 'article'){
                $('#select_article').prop('disabled', true);
                $('#select_category').append($('<option>', {
                    value: '',
                    text: 'Chọn bài viết'
                }));
            }else{
                $('#select_article').prop('disabled', false);
                $('#select_category').append($('<option>', {
                    value: '',
                    text: 'Chọn danh mục'
                }));
            }

            $.each(categories, function(key, item){
                $('#select_category').append($('<option>', {
                    value: item.slug,
                    text: item.title
                }));
            });
        },
        error: function(){}
    });
});

$('#select_category').change(function(){
    var main = build_main_string();
    $('#url').val(location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + '/tuoithantien/' + main + '/' + $('#select_category').val());

    if($('#select_main').val() != 'article'){
        $('#select_article').html('');
        $.ajax({
            method: 'GET',
            url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/admin/menu/fetch_article",
            data: {
                main_category: $('#select_main').val(),
                sub_category: $('#select_category').val()
            },
            success: function(res){
                var articles = JSON.parse(res).data;
                $('#select_article').append($('<option>', {
                    value: '',
                    text: 'Chọn bài viết'
                }));
                $.each(articles, function(key, item){
                    $('#select_article').append($('<option>', {
                        value: item.slug,
                        text: item.title
                    }));
                });
            },
            error: function(){}
        });
    }
});

$('#select_article').change(function(){
    var main = build_main_string();
    if($('#select_article').val() === '' || $('#select_article').val() === null){
        $('#url').val(location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + '/tuoithantien/' + main + '/' + $('#select_category').val());
    }else{
        $('#url').val(location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + '/tuoithantien/' + main + '/' + $('#select_category').val() + '/' + $('#select_article').val());
    }
});

function build_main_string(){
    var main = '';
    switch($('#select_main').val()){
        case 'introduce_category':
            main = 'gioi-thieu';
            break;
        case 'admission_category':
            main = 'thong-tin-nhap-hoc';
            break;
        case 'parental_category':
            main = 'phoi-hop-cung-phu-huynh';
            break;
        case 'activity_category':
            main = 'hoat-dong';
            break;
        default:
            main = 'bai-viet'
            break;
    }

    return main;
}


//check comment
$('.show_comment').click(function(){
    var category = $(this).data('category');
    var slug = $(this).data('slug');
    $.ajax({
        url: 'http://localhost/tuoithantien/admin/comment/check_status',
        type: 'GET',
        data: {category : category, slug : slug}
    })
})






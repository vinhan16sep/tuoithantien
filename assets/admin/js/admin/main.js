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

});


$('#trademark').change(function(){
    $('#category').html('<option value="">Select</option>');
    $.ajax({
        url: "<?php echo site_url('admin/product/get_category_by_trademark') ?>",
        type: "GET",
        data: {
            id : $('#trademark').val()
        },
        dataType: "json",
        success: function(res){
            $.each(res, function(index, value){
               $('#category').append('<option value="' + value.id + '">' + value.title + '</option>');
            });
        },
        error: function(){

        }
    })
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






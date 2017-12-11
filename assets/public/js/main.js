$(document).ready(function(){
	'use strict';
	$('#itemslider').carousel({ interval: 3000 });

	$('.carousel-showmanymoveone .item').each(function(){
	var itemToClone = $(this);

	for (var i=1;i<4;i++) {
	itemToClone = itemToClone.next();

	if (!itemToClone.length) {
	itemToClone = $(this).siblings(':first');
	}

	itemToClone.children(':first-child').clone()
	.addClass("cloneditem-"+(i))
	.appendTo($(this));
	}
	});

	if($('#count-comment').val() > 5){
		$('#comment_readmore').css('display', 'block');
	}

	/* comment */
	$('.submit-comment').click(function(e){
		e.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var content = $('#content').val();
		var category_id = $('#category_id').val();
		var slug = $('#slug').val();
		if(name.length == 0){
			$('.name_error').text('Họ và Tên không được trống!');
		}else{
			$('.name_error').text('');
		}

		if(email.length == 0){
			$('.email_error').text('Email không được trống!');
		}
		else{
			$('.email_error').text('');
		}

		if(content.length == 0){
			$('.content_error').text('Nội dung không được trống!');
		}
		else{
			$('.content_error').text('');
		}
		if(name.length != 0 && email.length != 0 && content.length != 0){
			$('.cmt_error').hide();
			jQuery.ajax({
				type: "get",
				url: "http://localhost:8080/tuoithantien/comment/create_comment",
				// url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
				data: {name : name, email : email, content : content, category_id : category_id, slug : slug},
				success: function(result){
                    $('#comment > .cmt:first-child').before(JSON.parse(result).comment);
                    $('#name').val('');
                    $('#email').val('');
                    $('#content').val('');
				}
			})
		}
		
		return false;
	})

	// see more comment
    var page = 1;
	$('#comment_readmore').click(function () {
		var slug = $('#slug').val();
        page ++;
        jQuery.ajax({
            type: "get",
            url: "http://localhost:8080/tuoithantien/comment/see_more_comment",
            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
            data: {page : page, slug : slug},
            success: function(result){
				$('#comment > .cmt:last-child').after(result);
				if(result == ''){
                    $('#comment_readmore').fadeOut();
				}
            }
        })
    })
	
});
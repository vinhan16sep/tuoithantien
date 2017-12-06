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
	
	imagePreview();
	
});
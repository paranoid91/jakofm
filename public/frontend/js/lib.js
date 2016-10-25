$(document).ready(function() {

	/*	$(window).scroll( function(){

			$('.serv-item-wrapper').each( function(i){
				var bottom_of_object = $(this).position().top + $(this).outerHeight();
				var bottom_of_window = $(window).scrollTop() + $(window).height();

				/!* Adjust the "200" to either have a delay or that the content starts fading a bit before you reach it  *!/
				bottom_of_window = bottom_of_window + 200;

				if( bottom_of_window > bottom_of_object ){

					$(this).animate({'opacity':'1'},600);

				}
			});

		});*/

	$('.dark-block img').hover(function () {
		$(this).siblings('.item-appear').stop(true, true).fadeIn();
	}, function () {
		$(this).siblings('.item-appear').stop(true, true).fadeOut();
	});
	
	$('.navbar-wrapper .search-icon a').click(function () {

		var clicks = $(this).data('clicks');
		if (clicks) {
			$('.navbar-wrapper .search-icon form input').fadeOut(200);
		} else {
			$('.navbar-wrapper .search-icon form input.search-input').fadeIn(200);
			$('.navbar-wrapper .search-icon form input.search-btn').fadeIn(600);
		}
		$(this).data("clicks", !clicks);
	});


	//change navbar item background
	$(".navbar-wrapper .navbar .nav li a").each(function() {
		if (this.href == window.location.href) {
			$(this).parent().addClass("active");
		}
	});

    $("footer .footer-bottom ul li a").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("footer-active");
        }
    });

	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	//main carousel

	if($('.carousel').length > 0){

		$('.carousel').carousel({
		 interval: 5000
		});

		/*var $item = $('.carousel .item');
		var $wHeight = $(window).height();

		$item.height($wHeight); 
		$item.addClass('full-screen');

		$('.carousel img').each(function() {
		  var $src = $(this).attr('src');
		  var $color = $(this).attr('data-color');
		  $(this).parent().css({
		    'background-image' : 'url(' + $src + ')',
		    'background-color' : $color
		  });
		  $(this).remove();
		});

		$(window).on('resize', function (){
		  $wHeight = $(window).height();
		  $item.height($wHeight);
		});*/

	}

	if($('.serv-img').length > 0){

		$('.serv-item-wrapper a').hide();

		$('.serv-item-wrapper').hover(function(){
			$(this).children('a').fadeIn();

		}, function(){
			$(this).children('a').fadeOut();
		});
	}


	$('div.vcb-ppl-bg').hover(function () {
		$(this).children('.ppl-audio-hov').stop(true, true).animate({width:'toggle'}, 400);
	});

/*	$('div.vcb-ppl-wrapper').hover(function () {
		$('.ppl-audio-hov',this).toggle('slide',{direction:'right'},300);
		//$('.ppl-audio-hov',this).toggle('slide',{direction:'right'},300);
	},function(){
		//$('.ppl-audio-hov',this).toggle('slide',{direction:'left'},300);
	});*/

	if($('.ppl-audio-hov').length>0){
		$('.audioplayer-playpause a').click(function (e) {
			var clicks = $(this).data('clicks');
			if (clicks) {
				$(this).parents('.ppl-audio-wrapper').children('h3.mini-audio-cap').removeClass('activeTitle');
			} else {
				$(this).parents('.ppl-audio-wrapper').children('h3.mini-audio-cap').addClass('activeTitle');
			}
			$(this).data("clicks", !clicks);
		});
	}

	if($('.play-audio').length > 0){
		$('.play-audio').audioPlayer();
	}

	if($("ul.tagsort-tags-container").length > 0){

		$('ul.tagsort-tags-container').tagSort({
			items: '.item-to-filter',
			tagElement: 'span',
			tagClassPrefix: false,
			itemTagsView: false,
			itemTagsSeperator: ',',
			itemTagsElement: false,
			sortType: 'exclusive',
			fadeTime: 300,
			reset: false,
			sortAlphabetical: false
		});

		$("ul.tagsort-tags-container span").prop('data-checked', 0);
	}

	$("ul.tagsort-tags-container span").click(function () {
		var clicks = $(this).data('clicks');
		if (clicks) {
			$(this).css({backgroundColor: '#999'}).attr('data-checked', 0);
		} else {
			$(this).css({backgroundColor: '#E93F33'}).attr('data-checked', 1);
		}
		$(this).data("clicks", !clicks);
	});

	$('a#filter-button').click(function () {
		var clicks = $(this).data('clicks');
		if (clicks) {
			$('.voice-filters').fadeOut();
		} else {
			$('.voice-filters').fadeIn();
		}
		$(this).data("clicks", !clicks);
	});

	/*if($('.filters-list').length > 0){
		$('a.filter-tag').on('click', function(){*/

			/*if($('a.filter-tag[data-tag="all"]').attr('data-checked') == 1 ||
				$('.filters-list').find('a.filter-tag[data-checked="1"]').length == 0) {
					$('li.author-data').fadeIn(300);
					return 0;
			}

			var tags = $('a.filter-tag[data-checked="1"]');
			var show = [];

			$(tags).each(function (i) {
				if($(this).attr('data-tag') == 'man'){

				}
			});*/

			/*$(tags).each(function () {
				var item = $(this).attr('data-tag');
				var show = [];
				var hide = [];
					$('li.author-data').each(function () {
						if($(this).attr('data-audio-cat').indexOf('|'+ item +'|') < 0) {
							show.push($(this));
						}
						else if($(this).attr('data-audio-cat').indexOf('|'+ item +'|') > 0){
							hide.push($(this));
						}
					});
				$(show).each(function () {
					$(this).fadeOut(300);
				});
				$(hide).each(function () {
					$(this).fadeIn(300);
				});
			});*/






			/*var tag = $(this).attr('data-tag');

			if($(this).attr('data-checked') == 1){
				$('li.author-data').each(function () {
					if($(this).attr('data-audio-cat').indexOf('|'+ tag +'|') < 0){
						$(this).fadeOut(300);
					}
				});
			} else if($(this).attr('data-checked') == 0){
				$('li.author-data').each(function () {
					if($(this).attr('data-audio-cat').indexOf('|'+ tag +'|') < 0){
						$(this).fadeIn(300);
					}
				});
			}*/
/*		});
	}*/

	$('#see-more-authors-link').on('click', function(){
		
	});

});
var msie6 = $.browser == 'msie' && $.browser.version < 7;
$(document).ready(function () {
	$('#search').click(function() {
		var $search = $('#search-field')
		// $('#search-field').show('slide', { direction: 'right' }, 5000)
		$search.slideToggle('slow', function() {
			$search.find('input').focus()
		})
	})

	/* ======================== responsive ====================== */
	/* full desktop */
	// $(window).resize(function() { console.log($(this).width()) })
	$('.dk').show()
	$('.subject').css('display','block')
	$('.dk_container').css({
		'display': 'none',
		'visibility': 'hidden'
	})

	/* deteksi tablet */
	if($(window).width() < 979) {
		$('#nav-headline').css({
			'overflow': 'hidden'
		})
		$('#nav-headline li:last-child').hide()

		// setting select menu
		$('.dk').dropkick({ theme: 'black' })
		$('.subject').dropkick({ theme: 'black' })

		var imageUrl = 'images/login-button.png'
		$('.dk_container').css({
			'border': '1px solid #b6b6b6',
			'display': 'block',
			'height': '33px',
			'line-height': '0',
			'padding': '5px 0',
			'visibility': 'visible',
			'width': '115px'
		}).addClass('dl_theme_black')
		$('.dk_open').css('width', '100')
		$('.dk_toggle').css({
			'border': '0',
			'height': '20px',
			'margin-top': '10px',
			'padding': '7px 4px 7px 10px',
			'width': '100px'
		})
		$('.dk_option_inner').css({
			'border': 'none'
		})
		$('.dk_options_inner li').css({
			'background': '#fff',
			'border': '0',
			'display': 'block',
			'letter-spacing': '-1px',
			'padding': '10px 0',
			'text-transform': 'uppercase'
		})
		$('.dk_options a').css({
			'border': '0',
			'padding': '3px 10px'
		})
	} else {
		$('.dk').hide()
		$('.subject').show()
	}

	$("#accordion > li").click(function() {
		if(false == $(this).next().is(':visible')) {
			$('#accordion > ul').slideUp(300)
		}
		$(this).next().slideToggle(300)
	});
	$('#accordion > ul:eq(0)').show()

	if(!msie6) {
		var trueTop = $('#menu-headline').offset().top
		var trueFloat = parseFloat($('#menu-headline').css('margin-top').replace(/auto/, 0))
		var truely = trueTop - trueFloat
		$(window).scroll(function(event) {
			var y = $(this).scrollTop()
			if(y >= truely) {
				$('#menu-headline').css({
					'top': '-10px',
					'opacity': '0.95'
				})
			} else {
				$('#menu-headline').css({
					'top': '60px',
					'opacity': '1'
				})
			}
		})
	}
	$('#menu-headline a').live('click', function(event) {
		event.preventDefault()
		$('body').animate({
			scrollTop: $($(this).attr('href')).offset().top
		}, 500)
		$(this).parent().siblings().removeClass('active')
		$(this).parent().addClass('active')
	})
	if($(window).width() <= 979 && $(window).width() >= 480) {
		$('#menu-headline ul').hoverscroll({
			height: 78,
			width: 696,
			arrows:	true,
			arrowsOpacity: 1,
		    fixedArrows: false,
			vertical: false
		})
	}
	$('#slider').slides({
		play: 5000,
		pause: 2500
	})
})

function register() {
	$('#login').css({
		'left': '-400px'
	})
	$('#register').css({
		'left': '50px'
	})
	$('#btn').css({
		'left': '110px'
	})
}

function login() {
	$('#login').css({
		'left': '50px'
	})
	$('#register').css({
		'left': '450px'
	})
	$('#btn').css({
		'left': '0px'
	})
}

$(document).ready(function () {

	$('.btn-modal-auth').click(function () {
		$('.modal-auth').addClass('modal-auth-show');
	})

	$('.btn-modal-close').click(function () {
		$('.modal-auth').removeClass('modal-auth-show');
		$('#register')[0].reset();
	})

	$('.btn-get-started').click(function (e) {
		var tujuan = $(this).attr('href');
		var elemen = $(tujuan);

		$('html').animate({
			scrollTop: elemen.offset().top + 120
		})

		e.preventDefault();
	})

	$(window).scroll(function () {
		var x = $(this).scrollTop();

		if (x > 80) {
			$('.navbar').addClass('sticky');

		} else {
			$('.navbar').removeClass('sticky');
		}
	})

	// Owl Carousel
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		// nav: true,
		dotss: true,
		responsive: {
			0: {
				items: 3
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}
	});

	// Show / hide password
	const pass_field = $('input[type="password"]');
	$('body').on('click', '#btn-show', function () {
		if (pass_field.attr('type') == 'password') {
			pass_field.attr('type', 'text');
			$('#btn-show').removeClass('fa-eye-slash');
			$('#btn-show').addClass('fa-eye');

		} else {
			pass_field.attr('type', 'password');
			$('#btn-show').removeClass('fa-eye');
			$('#btn-show').addClass('fa-eye-slash');
		}
	})

	// Datepicker
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		modal: true,
		footer: true,
		uiLibrary: 'bootstrap4',
		icons: {
			rightIcon: `<img src=` + url + `public/frontend/images/icon/ic_doe.png />`
		}
	})

	$('#tgl_booking').on('change', function (selected) {
		$('.tanggal').text($('#tgl_booking').val())
	})

	$('#engineer').on('change', function () {
		$('.engineer').text($('#engineer option:selected').data('nama'))
	})

})

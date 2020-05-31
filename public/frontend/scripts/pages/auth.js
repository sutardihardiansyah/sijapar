$(document).ready(function () {
	$('#register').validate({
		rules: {
			nm_customer: {
				required: true,
			},
			password: {
				required: true
			},
			username: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			email: {
				required: "Harap isi field email",
				email: "Harap masukan email yang valid"
			},
			password: {
				required: "Harap isi field password",
			},
			username: "Harap isi field Username",
			nm_customer: "Harap isi field Nama Lengkap"
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			element.closest('.input-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function () {
			let formdata = $('#register').serialize();
			$.ajax({
				type: 'post',
				url: url + 'register',
				data: formdata,
				success: function (response) {
					let result = JSON.parse(response);
					if (result.status === 'success') {
						$('.error').html(`
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data Berhasil disimpan, Silahkan Login!</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						`)
						$('#register')[0].reset();
					} else {
						$('.error').html(`
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>` + result.message + `</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						`)
					}
				}
			})
		}
	});

	$('#login').validate({
		rules: {
			password: {
				required: true
			},
			username: {
				required: true,
			}
		},
		messages: {
			password: {
				required: "Harap isi field password",
			},
			username: "Harap isi field Username",
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			element.closest('.input-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function () {
			let formdata = $('#login').serialize();
			$.ajax({
				type: 'post',
				url: url + 'login',
				data: formdata,
				success: function (response) {
					let result = JSON.parse(response);
					if (result.status === 'success') {
						window.location.href = url;
					} else {
						$('.error').html(`
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>` + result.message + `</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						`)
					}
				}
			})
		}
	})
});

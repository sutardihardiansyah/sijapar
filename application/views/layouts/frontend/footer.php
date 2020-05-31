<!-- footer -->
<footer class="section-footer mt-5 mb-4 border-top">
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-12 text-center mb-4">
				<h2>Opening Hours</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-6 col-md-4">
						<h5>Address</h5>
						<ul class="list-unstyled">
							<li>Jl.Bimasakti 117 Cikarang Baru, Mekarmukti
								Cikarang Selatan, Bekasi- Jawa Barat</li>
							<li>
								<span class="font-weight-bold">Telephone</span>&nbsp;&nbsp;&nbsp; : 08161116107 / 082110808768
							</li>
							<li>
								<span class="font-weight-bold">Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								: t10ck@yahoo.com
							</li>
						</ul>
					</div>
					<div class="col-6 col-md-4">
						<ul class="list-unstyled">
							<li>
								<span>Monday</span> <span class="float-right">08am - 17pm</span>
							</li>
							<li><span>Tuesday</span><span class="float-right">08am - 17pm</span></li>
							<li><span>Wednesday</span><span class="float-right">08am - 17pm</span></li>
							<li><span>Thursday</span><span class="float-right">08am - 17pm</span></li>
							<li><span>Friday</span><span class="float-right">08am - 17pm</span></li>
							<li><span>Saturday</span><span class="float-right">08am - 17pm</span></li>
							<li><span>Sunday</span><span class="float-right">08am - 17pm</span></li>
						</ul>
					</div>
					<div class="col-12 col-md-4">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.66448157315!2d107.17418841431103!3d-6.307735763484738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b6a0ad52dcd%3A0xd5fc3568b4b325f7!2sJl.%20Cikarang%20Baru%20Raya%20No.117%2C%20Sertajaya%2C%20Kec.%20Cikarang%20Tim.%2C%20Bekasi%2C%20Jawa%20Barat%2017530!5e0!3m2!1sid!2sid!4v1589420679337!5m2!1sid!2sid" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid copyright text-center border-top">
		<div class="row justify-content-center align-items-center">
			<div class="col-auto text-gray-500 font-weight-light">
				<p><?= date('Y'); ?> Copyright CV. Berkah Abadi • All rights reserved •</p>
			</div>
		</div>
	</div>
</footer>

<?php $this->load->view('layouts/frontend/modal_auth') ?>

<!-- /modal Auth -->
<!-- Optional JavaScript -->
<script src="<?= base_url('public/'); ?>frontend/libraries/jquery/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('public/'); ?>frontend/libraries/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url('public/'); ?>frontend/libraries/popper/popper.min.js"></script>
<script src="<?= base_url('public/'); ?>frontend/libraries/retina/retina.min.js"></script>
<!-- Font Awesome -->
<script src="<?= base_url('public/'); ?>frontend/libraries/fontawesome/all.js"></script>
<!-- Owl Carousel -->
<script src="<?= base_url('public/'); ?>frontend/libraries/owlcarousel/owl.carousel.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('public/'); ?>frontend/libraries/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('public/'); ?>frontend/libraries/jquery-validation/additional-methods.min.js"></script>
<!-- Gijgo -->
<script src="<?= base_url('public/'); ?>frontend/libraries/gijgo/js/gijgo.js"></script>
<!-- Main Js -->
<script src="<?= base_url('public/'); ?>frontend/scripts/main.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
	var url = '<?php echo base_url(); ?>';
</script>

<?php if (isset($addon_script)) : ?>
	<?php addon_script($addon_script) ?>
<?php endif; ?>

</body>

</html>

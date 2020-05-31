<main>
	<!-- Keunggulan -->
	<div class="container">
		<section class="exce">
			<div class="row justify-content-center">
				<div class="col-12 col-md-4 exce-detail">
					<div class="exce-card shadow">
						<div class="icon">
							<i class="fa fa-money-bill-alt"></i>
						</div>
						<div class="content">
							<h3>Biaya Terjangkau</h3>
							<p>Lorem ipsum dolor sit, amet.</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 exce-detail">
					<div class="exce-card shadow">
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						<div class="content">
							<h3>Engineer Handal</h3>
							<p>Lorem ipsum dolor sit, amet.</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 exce-detail">
					<div class="exce-card shadow">
						<div class="icon">
							<i class="far fa-clock"></i>
						</div>
						<div class="content">
							<h3>Pengerjaan Cepat</h3>
							<p>Lorem ipsum dolor sit, amet.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- popular -->
	<section class="section-popular" id="section-popular">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center section-popular-heading pt-3 mt-5">
					<h2>Paket Maintenance</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- Maintenance content -->
	<section class="section-maintenance" id="section-maintenance">
		<div class="container">
			<div class="row justify-content-center">
				<?php foreach ($items->result_array() as $item) : ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3">
						<div class="card card-maintenance p-2">
							<div class="img-box">
								<img src="<?= base_url('public/'); ?>frontend/images/design.png" alt="">
							</div>
							<div class="content-box">
								<h3><?= $item['nm_paket']; ?></h3>
								<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit tempore quod, quis harum molestiae
									molestias.</p>
								<a href="<?= base_url('booking-checkout/maintenance/') . $item['id_paket']; ?>" class="btn-book-maintenance"><span>Booking</span></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Section Customer -->
	<section class="section-customer" id="section-customer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<h2>Our Customers</h2>
				</div>
				<div class="col-12 col-md-8">
					<div class="owl-carousel">
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=N U" alt="Logo Partners" class="rounded-circle">
						</div>
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=L M" alt="Logo Partners" class="rounded-circle">
						</div>
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=J O" alt="Logo Partners" class="rounded-circle">
						</div>
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=G H" alt="Logo Partners" class="rounded-circle">
						</div>
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=B C" alt="Logo Partners" class="rounded-circle">
						</div>
						<div class="item">
							<img src="https://ui-avatars.com/api/?name=D E" alt="Logo Partners" class="rounded-circle">
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</main>

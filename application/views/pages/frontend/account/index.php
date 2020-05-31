<main>
	<section class="account-header"></section>
	<div class="container">
		<section class="account">

			<!-- breadcrumb -->
			<div class="row">
				<div class="col">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								Home
							</li>
							<li class="breadcrumb-item active">
								Booking Checkout
							</li>
						</ol>
					</nav>
				</div>
			</div>

			<div class="account-content">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<?php $this->load->view('layouts/frontend/sidebar-account') ?>
							<div class="col-md-8">
								<h3>History</h3>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Nomor PO</th>
											<th>Tanggal</th>
											<th>Status</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($bookings as $key => $booking) : ?>
											<tr>
												<th>1</th>
												<td><?= $booking['nomor_po']; ?></td>
												<td><?= $booking['tgl_booking']; ?></td>
												<td>
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: <?= $booking['status'] . '%'; ?>" aria-valuenow="<?= $booking['status']; ?>" aria-valuemin="0" aria-valuemax="100"><?= $booking['status']; ?>%</div>
													</div>
												</td>
												<td><?= $booking['total'] ? format_rupiah($booking['total']) : format_rupiah(0); ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
	</div>

</main>

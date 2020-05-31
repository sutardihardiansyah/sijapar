<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				From
				<address>
					<strong>Admin, Inc.</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					Phone: (804) 123-5432<br>
					Email: info@almasaeedstudio.com
				</address>
			</div>
			<div class="col-md-4">
				To
				<address>
					<strong><?= $booking['nm_customer']; ?></strong><br>
					<?= $booking['perusahaan']; ?><br>
					<?= $booking['alamat']; ?><br>
					Phone: <?= $booking['tlp_customer']; ?><br>
					Email: <?= $booking['email']; ?>
				</address>
			</div>
			<div class="col-md-4">
				<b>Nomor PO #<?= $booking['nomor_po']; ?></b><br>
				<br>
				<b>Tanggal:</b> <?= $booking['tgl_booking']; ?><br>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Engineer</th>
							<th>Jasa</th>
							<th>Keluhan</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>1</th>
							<td><?= $booking['nm_engineer']; ?></td>
							<td><?= $booking['jenis']; ?></td>
							<td><?= $booking['keluhan']; ?></td>
							<td><?= format_rupiah($booking['total']); ?></td>
						</tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-12 float-right">
						<!-- <a href="<?= base_url('pdf/booking/') . encode($booking['id_booking']) . '/1'; ?>" class="btn btn-primary float-right">
							<i class="fas fa-download"></i> Download PDF
						</a> -->
						<a href="<?= base_url('pdf/booking/') . encode($booking['id_booking']) . '/0'; ?>" target="_blank" class="btn btn-secondary float-right mr-1"><i class="fas fa-print"></i> Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 border-0 bg-white">
		<?php if ($this->session->flashdata('message')) : ?>
			<?= $this->session->flashdata('message'); ?>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Nomor PO</th>
						<th>Nama Engineer</th>
						<th>Nama Customer</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th class="text-center">
							<i class="fas fa-cog"></i>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bookings->result_array() as $key => $booking) : ?>
						<tr>
							<th><?= $key += 1; ?></th>
							<td><?= $booking['nomor_po']; ?></td>
							<td><?= $booking['nm_engineer']; ?></td>
							<td><?= $booking['nm_customer']; ?></td>
							<td><?= $booking['tgl_booking']; ?></td>
							<td><?= format_rupiah($booking['total']); ?></td>
							<td>
								<a href="<?= base_url('booking/edit/') . encode($booking['id_booking']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?= base_url('booking/detail/') . encode($booking['id_booking']); ?>" class="btn btn-light btn-sm">View</a>
								<a href="<?= base_url('booking/delete/') . encode($booking['id_booking']); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

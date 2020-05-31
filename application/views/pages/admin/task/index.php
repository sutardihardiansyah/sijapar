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
			<table class="table table-bordered" id="table-task" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Nomor PO</th>
						<th>Nama Engineer</th>
						<th>Nama Customer</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status</th>
						<th class="text-center">
							<i class="fas fa-cog"></i>
						</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>

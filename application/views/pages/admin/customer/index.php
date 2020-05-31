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
						<th>Nama</th>
						<th>Email</th>
						<th>Nomor Telepon</th>
						<th>Perusahaan</th>
						<th>Alamat</th>
						<th class="text-center">
							<i class="fas fa-cog"></i>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($customers->result_array() as $key => $customer) : ?>
						<tr>
							<th><?= $key += 1; ?></th>
							<td><?= $customer['nm_customer']; ?></td>
							<td><?= $customer['email']; ?></td>
							<td><?= $customer['tlp_customer']; ?></td>
							<td class="text-center"><?= $customer['perusahaan'] ? $customer['perusahaan'] : '-'; ?></td>
							<td><?= $customer['almt_customer']; ?></td>
							<td class="text-center">
								<a href="<?= base_url('customer/edit/') . encode($customer['id_customer']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?= base_url('customer/delete/') . encode($customer['id_customer']); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

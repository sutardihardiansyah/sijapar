<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 border-0 bg-white">
		<a href="<?= base_url('engineer/create'); ?>" class="btn btn-primary">Tambah Engineer</a>
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
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th class="text-center">
							<i class="fas fa-cog"></i>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($engineers->result_array() as $key => $engineer) : ?>
						<tr>
							<th><?= $key += 1; ?></th>
							<td><?= $engineer['nm_engineer']; ?></td>
							<td><?= $engineer['email']; ?></td>
							<td><?= $engineer['tlp_engineer']; ?></td>
							<td><?= $engineer['jk_engineer'] === 'l' ? 'Laki-laki' : 'Perempuan'; ?></td>
							<td><?= $engineer['almt_engineer']; ?></td>
							<td class="text-center">
								<a href="<?= base_url('engineer/edit/') . encode($engineer['id_engineer']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?= base_url('engineer/delete/') . encode($engineer['id_engineer']); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

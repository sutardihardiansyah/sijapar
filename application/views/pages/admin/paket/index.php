<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 border-0 bg-white">
		<a href="<?= base_url('paket/create'); ?>" class="btn btn-primary">Tambah Paket</a>
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
						<th>Nama Paket</th>
						<th>Deskripsi</th>
						<th class="text-center">
							<i class="fas fa-cog"></i>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($items->result_array() as $key => $item) : ?>
						<tr>
							<th><?= $key += 1; ?></th>
							<td><?= $item['nm_paket']; ?></td>
							<td><?= $item['deskripsi']; ?></td>
							<td class="text-center">
								<a href="<?= base_url('paket/edit/') . encode($item['id_paket']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?= base_url('paket/delete/') . encode($item['id_paket']); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

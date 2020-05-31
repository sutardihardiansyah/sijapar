<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
	<div class="card-body">
		<form action="<?= base_url('paket/update'); ?>" method="post">
			<input type="hidden" name="id_paket" value="<?= $paket['id_paket']; ?>">
			<div class="form-group row col-md-6">
				<label for="nm_paket">Nama Paket</label>
				<input type="text" name="nm_paket" id="nm_paket" class="form-control <?= form_error('nm_paket') ? 'is-invalid' : ''; ?>" value="<?= $paket['nm_paket']; ?>">
				<div class="invalid-feedback">
					<?= form_error('nm_paket'); ?>
				</div>
			</div>

			<div class="form-group row col-md-6">
				<label for="deskripsi">Deskripsi</label>
				<textarea name="deskripsi" id="" class="form-control"><?= $paket['deskripsi']; ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
	<div class="card-body">
		<form action="<?= base_url('engineer/update'); ?>" method="post">
			<input type="hidden" name="id_engineer" value="<?= $engineer['id_engineer']; ?>">
			<div class="form-group col-md-6">
				<label for="nm_engineer">Nama Lengkap</label>
				<input type="text" name="nm_engineer" id="nm_engineer" class="form-control <?= form_error('nm_engineer') ? 'is-invalid' : ''; ?>" value="<?= $engineer['nm_engineer']; ?>">
				<div class="invalid-feedback">
					<?= form_error('nm_engineer'); ?>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $engineer['email']; ?>">
				<div class="invalid-feedback">
					<?= form_error('email'); ?>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="tlp_engineer">Nomor Hp</label>
				<input type="text" name="tlp_engineer" id="tlp_engineer" class="form-control <?= form_error('tlp_engineer') ? 'is-invalid' : ''; ?>" value="<?= $engineer['tlp_engineer']; ?>">
				<div class="invalid-feedback">
					<?= form_error('tlp_engineer'); ?>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="jk_engineer" class="d-block">Jenis Kelamin</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" <?= $engineer['jk_engineer'] === 'l' ? 'checked' : ''; ?> name="jk_engineer" id="inlineRadio1" value="l">
					<label class="form-check-label" for="inlineRadio1">Lakik-laki</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" <?= $engineer['jk_engineer'] === 'p' ? 'checked' : ''; ?> name="jk_engineer" id="inlineRadio2" value="p">
					<label class="form-check-label" for="inlineRadio2">Perempuan</label>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="almt_engineer" id="" cols="30" rows="10" class="form-control <?= form_error('almt_engineer') ? 'is-invalid' : ''; ?>"><?= $engineer['almt_engineer']; ?></textarea>
				<div class="invalid-feedback">
					<?= form_error('alamat'); ?>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>

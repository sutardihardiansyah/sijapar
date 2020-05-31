<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
	<div class="card-body">
		<form action="<?= base_url('customer/update'); ?>" method="post">
			<input type="hidden" name="id_customer" value="<?= $customer['id_customer']; ?>">
			<div class="form-group row col-md-6">
				<label for="nm_customer">Nama Customer</label>
				<input type="text" name="nm_customer" id="nm_customer" class="form-control <?= form_error('nm_customer') ? 'is-invalid' : ''; ?>" value="<?= $customer['nm_customer']; ?>">
				<div class="invalid-feedback">
					<?= form_error('nm_customer'); ?>
				</div>
			</div>
			<div class="form-group row col-md-6">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $customer['email']; ?>">
				<div class="invalid-feedback">
					<?= form_error('email'); ?>
				</div>
			</div>
			<div class="form-group row col-md-6">
				<label for="tlp_customer">Nomor Hp</label>
				<input type="text" name="tlp_customer" id="tlp_customer" class="form-control <?= form_error('tlp_customer') ? 'is-invalid' : ''; ?>" value="<?= $customer['tlp_customer']; ?>">
				<div class="invalid-feedback">
					<?= form_error('tlp_customer'); ?>
				</div>
			</div>

			<div class="form-group row col-md-6">
				<label for="perusahaan">Perusahaan</label>
				<input type="text" name="perusahaan" id="perusahaan" class="form-control <?= form_error('perusahaan') ? 'is-invalid' : ''; ?>" value="<?= $customer['perusahaan']; ?>">
				<div class="invalid-feedback">
					<?= form_error('perusahaan'); ?>
				</div>
			</div>

			<div class="form-group row col-md-6">
				<label for="alamat">Alamat</label>
				<textarea name="almt_customer" id="" class="form-control <?= form_error('almt_customer') ? 'is-invalid' : ''; ?>"><?= $customer['almt_customer']; ?></textarea>
				<div class="invalid-feedback">
					<?= form_error('alamat'); ?>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>

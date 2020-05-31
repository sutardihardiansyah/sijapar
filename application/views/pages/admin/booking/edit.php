<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<div class="card shadow">
	<div class="card-body">
		<form action="<?= base_url('booking/update'); ?>" method="post">
			<input type="hidden" name="id_booking" value="<?= $booking['id_booking']; ?>">

			<div class="form-group row col-md-4">
				<label for="total">Total</label>
				<input type="text" name="total" id="total" class="form-control <?= form_error('total') ? 'is-invalid' : ''; ?>" value="<?= $booking['total']; ?>">
				<div class="invalid-feedback">
					<?= form_error('total'); ?>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>

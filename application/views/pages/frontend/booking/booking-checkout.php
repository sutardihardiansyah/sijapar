<main>
	<section class="section-details-header"></section>

	<section class="section-details-content">
		<div class="container">
			<!-- breadcrumb -->
			<div class="row">
				<div class="col p-0">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								Home
							</li>
							<li class="breadcrumb-item active">
								Booking Checkout
							</li>
						</ol>
					</nav>
				</div>
			</div>
			<!-- image details -->
			<div class="row">
				<div class="col-md-8 pl-md-0">
					<div class="card section-details-card">
						<h2>Schedule Online</h2>

						<div class="member mt-3">
							<form action="<?= base_url('booking-checkout/save'); ?>" class="" method="post">
								<div class="form-group">
									<label for="engineer">Enginner</label>
									<select name="id_engineer" id="engineer" class="custom-select <?= form_error('id_engineer') ? 'is-invalid' : ''; ?>">
										<option>Pilih Engineer</option>
										<?php foreach ($engineers->result_array() as $engineer) : ?>
											<option data-nama="<?= $engineer['nm_engineer']; ?>" value="<?= $engineer['id_engineer']; ?>"><?= $engineer['nm_engineer']; ?></option>
										<?php endforeach ?>
									</select>
									<div class="text-danger">
										<?= form_error('id_engineer'); ?>
									</div>
								</div>

								<label for="jenis" class="d-block">Jenis Jasa</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" checked type="radio" name="jenis" value="repair">
									<label class="form-check-label" for="inlineRadio1">Repair</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis" value="maintenance">
									<label class="form-check-label" for="inlineRadio2">Maintenance</label>
								</div>

								<div class="form-group row col-md-6 mt-2">
									<label for="perusahaan">Perusahaan</label>
									<input type="text" name="perusahaan" id="perusahaan" class="form-control <?= form_error('perusahaan') ? 'is-invalid' : ''; ?>" value="<?= set_value('perusahaan'); ?>">
									<div class="text-danger">
										<?= form_error('perusahaan'); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" cols="" rows="" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"><?= set_value('alamat'); ?></textarea>
									<div class="text-danger">
										<?= form_error('alamat'); ?>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="tanggal" class="">Tanggal</label>
											<div class="input-group mb-2">
												<input type="text" autocomplete="off" name="tgl_booking" class="form-control datepicker <?= form_error('tgl_booking') ? 'is-invalid' : ''; ?>" id="tgl_booking" width="80px">
											</div>
											<div class="text-danger">
												<?= form_error('tgl_booking'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="keluhan">Keluhan</label>
									<textarea name="keluhan" id="keluhan" cols="30" rows="10" class="form-control <?= form_error('keluhan') ? 'is-invalid' : ''; ?>"><?= set_value('keluhan'); ?></textarea>
									<div class="text-danger">
										<?= form_error('keluhan'); ?>
									</div>
								</div>

								<h4 class="mt-2 mb-0">Note</h4>
								<p class="disclamer mb-0">
									<a href="#" data-toggle="modal" data-target="#staticBackdrop">Jadwal Engineer</a>
								</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card section-details-card card-right">
						<h3>Booking Informations</h3>

						<div class="table-informations">
							<table>
								<tr>
									<th width="50%">Engineer</th>
									<td width="50%" class="text-right engineer">-</td>
								</tr>
								<tr>
									<th width="50%">Tanggal</th>
									<td width="50%" class="text-right tanggal">-</td>
								</tr>
								<tr>
									<th width="50%">Total(+Unique)</th>
									<td width="50%" class="text-right text-total">
										<span class="text-blue">-</span>
									</td>
								</tr>
							</table>
							<hr>
						</div>
					</div>
					<div class="join-container">
						<button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Booking</button>
					</div>
					</form>
					<div class="cancel-booking text-center mt-3">
						<a href="details.html" class="text-muted">Cancel Booking</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<!-- Modal Jadwal Enginert-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Jadwal Engineer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Engineer</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($engineers->result_array() as $key => $engineer) : ?>
							<tr>
								<th><?= $key += 1; ?></th>
								<td><?= $engineer['nm_engineer']; ?></td>
								<td>
									<ul style="list-style-type: none;" class="p-0">
										<?php
										$tanggal = $this->db->get_where('booking', ['id_engineer' => $engineer['id_engineer']])->result_array();
										foreach ($tanggal as $tgl) : ?>
											<li><?= $tgl['tgl_booking']; ?></li>
										<?php endforeach; ?>
									</ul>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

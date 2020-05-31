<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row" id="filter">
			<div class="col-md-3">
				<div class="form-group">
					<input type="text" class="form-control" name="period" readonly="" id="period" autocomplete="off">
				</div>
			</div>
			<div class="col-md-3">
				<button class="btn btn-primary" id="filter-submit">Filter</button>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table" id="table-report" data-url="<?php echo base_url('lap-booking/') . 'get_list'; ?>">
				<thead class="bg-primary">
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	var table_el = 'table-report';
</script>

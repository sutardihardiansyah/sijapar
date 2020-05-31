<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking <?= $booking['nomor_po']; ?></title>
	<style>
		body {
			font-family: 'Arial';
		}

		.container {
			border: 1px solid #333;
			height: 900px;
			padding: 12px
		}

		table {
			border-collapse: collapse;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			color: #212529;
		}

		.table th,
		.table td {
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}

		.table tbody+tbody {
			border-top: 2px solid #dee2e6;
		}

		.table-bordered {
			border: 1px solid #dee2e6;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #dee2e6;
		}

		.table-bordered thead th,
		.table-bordered thead td {
			border-bottom-width: 2px;
		}

		.mt-1,
		.my-1 {
			margin-top: 0.25rem !important;
		}

		.mt-3,
		.my-3 {
			margin-top: 1rem !important;
		}

		.mt-5,
		.my-5 {
			margin-top: 3rem !important;
		}
	</style>
</head>

<body>
	<!-- Page Heading -->

	<div class="container">
		<div class="mt-5">
			<table class="">
				<tr>
					<td>
						From
						<address>
							<strong>CV. Berkah Abadi</strong><br>
							Jl.Bimasakti 117 Cikarang Baru<br>
							Mekarmukti Cikarang Selatan, Bekasi- Jawa Barat<br>
							Phone: 08161116107 / 082110808768<br>
							Email: t10ck@yahoo.com
						</address>
					</td>
					<td>
						To
						<address>
							<strong><?= $booking['nm_customer']; ?></strong><br>
							<?= $booking['perusahaan']; ?><br>
							<?= $booking['alamat']; ?><br>
							Phone: <?= $booking['tlp_customer']; ?><br>
							Email: <?= $booking['email']; ?>
						</address>
					</td>
					<td>
						<b>Nomor PO #<?= $booking['nomor_po']; ?></b><br>
						<br>
						<b>Tanggal:</b> <?= $booking['tgl_booking']; ?><br>
					</td>
				</tr>
			</table>

		</div>

		<div class="">
			<div class="mt-5">
				<table border="" class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Engineer</th>
							<th>Jasa</th>
							<th>Keluhan</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>1</th>
							<td><?= $booking['nm_engineer']; ?></td>
							<td><?= $booking['jenis']; ?></td>
							<td><?= $booking['keluhan']; ?></td>
							<td><?= format_rupiah($booking['total']); ?></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>

</html>

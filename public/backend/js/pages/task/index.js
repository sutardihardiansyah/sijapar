console.log(url);

function reload_table() {
	dataTable.ajax.reload(null, false)
}
$(document).ready(function () {

	// datatable
	dataTable = $("#table-task").DataTable({
		language: {
			paginate: {
				previous: "<i class='fas fa-arrow-left'>",
				next: "<i class='fas fa-arrow-right'>"
			}
		},
		drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		},
		"responsive": true,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"order": [],

		"ajax": {
			"url": url + 'task/get_data',
			"type": "POST",
		},

		"columns": [{
				"orderable": false,
				"data": "no"
			},
			{
				"data": "nomor_po",
			},
			{
				"data": "nm_engineer"
			},
			{
				"data": "nm_customer"
			},
			{
				"data": "tgl_booking"
			},
			{
				"data": "total"
			},
			{
				"data": "status"
			},
			{
				"orderable": false,
				"data": "action"
			}
		]
	});

	$('body').on('change', '.status', function () {
		$.ajax({
			url: url + 'task/update_ajax',
			type: 'post',
			dataType: 'json',
			data: {
				data: $(this).val()
			},
			success: function (res) {
				if (res.status == 'success') {
					reload_table();
				}
			}
		})
	})
})

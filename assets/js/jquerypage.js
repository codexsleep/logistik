function dataAkun() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		// mendapatkan nilai parameter 'role' dari URL
		const role = url.searchParams.get("role")
			? url.searchParams.get("role")
			: "all";
		// mendapatkan nilai parameter 'status' dari URL
		const status = url.searchParams.get("status")
			? url.searchParams.get("status")
			: "all";
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			scrollX: true,
			ajax: {
				url:
					site_url + "admin/users/user_data?role=" + role + "&status=" + status,
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "nama",
				},
				{
					data: "email",
				},
				{
					data: "role",
				},
				{
					data: "status",
				},
				{
					render: function (data, type, row) {
						return (
							'<a href="' +
							site_url +
							"admin/users/edit/" +
							row.id +
							'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/users/delete_user",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}


function dataLog() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		// mendapatkan nilai parameter 'user' dari URL
		const userid_log = url.searchParams.get("userid_log")
			? url.searchParams.get("userid_log")
			: "all";
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			scrollX: true,
			ajax: {
				url:
					site_url + "admin/users/log_data?userid_log=" + userid_log,
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "activity",
				},
				{
					data: "user",
				},
				{
					data: "tanggal",
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/users/delete_user",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}



function tambahOutlet() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var alamatInput = $("#alamat-input").val();
			var areaInput = $("#area-input").val(); // Mengganti hargaSatuan-input menjadi hargaBarang-input
			var jenisInput = $("input[name='jenis']:checked").val(); // mengubah variabel jenislInput menjadi jenisInput dan menambahkan metode .val() untuk mengambil nilai dari radio button
			var statusInput = $("input[name='status']:checked").val(); // mengubah variabel statusInput dan menambahkan metode .val() untuk mengambil nilai dari radio button

			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" && // Mengganti variabel dari 'nama' menjadi 'namaInput'
				alamatInput !== "" && // Mengganti variabel dari 'alamat' menjadi 'alamatInput'
				areaInput !== "" && // Mengganti variabel dari 'harga' menjadi 'hargaInput'
				jenisInput !== undefined && // menambahkan kondisi untuk mengecek apakah radio button jenis telah dipilih
				statusInput !== undefined // menambahkan kondisi untuk mengecek apakah radio button status telah dipilih
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = site_url + "admin/outlet/tambah";
				var form_data = {
					nama: namaInput,
					alamat: alamatInput,
					area: areaInput,
					jenis: jenisInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Outlet baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("namaBarang-input").value = "";
						document.getElementById("alamat-input").value = "";
						document.getElementById("area-input").value = "";
						document.getElementById("jenis-input").value = "";
						document.getElementById("status-input").value = "";
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}


function tambahUPC() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var alamatInput = $("#alamat-input").val();
			var jenisInput = $("input[name='jenis']:checked").val(); // mengubah variabel jenislInput menjadi jenisInput dan menambahkan metode .val() untuk mengambil nilai dari radio button
			var statusInput = $("input[name='status']:checked").val(); // mengubah variabel statusInput dan menambahkan metode .val() untuk mengambil nilai dari radio button

			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" && // Mengganti variabel dari 'nama' menjadi 'namaInput'
				alamatInput !== "" && // Mengganti variabel dari 'alamat' menjadi 'alamatInput'
				jenisInput !== undefined && // menambahkan kondisi untuk mengecek apakah radio button jenis telah dipilih
				statusInput !== undefined // menambahkan kondisi untuk mengecek apakah radio button status telah dipilih
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = "";
				var form_data = {
					nama: namaInput,
					alamat: alamatInput,
					jenis: jenisInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Outlet baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("namaBarang-input").value = "";
						document.getElementById("alamat-input").value = "";
						document.getElementById("jenis-input").value = "";
						document.getElementById("status-input").value = "";
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function dataOutlet() {
	const url = new URL(window.location.href);
	const area = url.searchParams.get("area") ? url.searchParams.get("area") : "all";
	const jenis = url.searchParams.get("jenis") ? url.searchParams.get("jenis") : "all";
	const status = url.searchParams.get("status") ? url.searchParams.get("status") : "all";
	const table = $("#scroll-horizontal-datatable").DataTable({
		processing: true,
		serverSide: true,
		scrollX: true,
		ajax: {
			url: site_url + "admin/outlet/outlet_data?area=" + area + "&jenis=" + jenis + "&status=" + status,
			type: "POST",
		},
		columns: [
			{
				data: "id",
			},
			{
				data: "nama",
			},
			{
				data: "alamat",
			},
			{
				data: "area",
			},
			{
				data: "jenis",
			},
			{
				data: "status",
			},
			{
				render: function (data, type, row) {
					return (
						'<a href="' +
						site_url +
						"admin/outlet/upc/" +
						row.id +
						'" class="btn btn-soft-info btn-xs waves-effect waves-light"><i class="mdi mdi-store-outline"></i> Daftar UPC</button> ' +
						'<a href="' +
						site_url +
						"admin/outlet/edit/" +
						row.id +
						'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
						' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
					);
				},
			},
		],
		language: {
			paginate: {
				previous: '<i class="mdi mdi-chevron-left"></i>',
				next: '<i class="mdi mdi-chevron-right"></i>',
			},
		},
		drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
		},
	});

	$(document).on("click", ".btn-soft-danger", function () {
		const id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/outlet/delete_outlet",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function dataUpc() {
	const url = window.location.href;
	const parts = url.split('/');
	const id = parts[parts.length - 1];
	const table = $("#scroll-horizontal-datatable").DataTable({
		processing: true,
		serverSide: true,
		scrollX: true,
		ajax: {
			url: site_url + "admin/outlet/upc_data/" + id,
			type: "POST",
		},
		columns: [
			{
				data: "id",
			},
			{
				data: "nama",
			},
			{
				data: "alamat",
			},
			{
				data: "jenis",
			},
			{
				data: "status",
			},
			{
				render: function (data, type, row) {
					return (
						'<a href="' +
						site_url +
						"admin/outlet/editupc/" +
						row.id +
						'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
						' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
					);
				},
			},
		],
		language: {
			paginate: {
				previous: '<i class="mdi mdi-chevron-left"></i>',
				next: '<i class="mdi mdi-chevron-right"></i>',
			},
		},
		drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
		},
	});

	$(document).on("click", ".btn-soft-danger", function () {
		const id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/outlet/delete_outlet",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function editOutlet() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var alamatInput = $("#alamat-input").val();
			var areaInput = $("#area-input").val(); // Mengganti hargaSatuan-input menjadi hargaBarang-input
			var jenisInput = $("input[name='jenis']:checked").val(); // mengubah variabel jenislInput menjadi jenisInput dan menambahkan metode .val() untuk mengambil nilai dari radio button
			var statusInput = $("input[name='status']:checked").val(); // mengubah variabel statusInput dan menambahkan metode .val() untuk mengambil nilai dari radio button

			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" && // Mengganti variabel dari 'nama' menjadi 'namaInput'
				alamatInput !== "" && // Mengganti variabel dari 'alamat' menjadi 'alamatInput'
				areaInput !== "" && // Mengganti variabel dari 'harga' menjadi 'hargaInput'
				jenisInput !== undefined && // menambahkan kondisi untuk mengecek apakah radio button jenis telah dipilih
				statusInput !== undefined // menambahkan kondisi untuk mengecek apakah radio button status telah dipilih
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = ""; // action URL needs to be specified
				var form_data = {
					nama: namaInput,
					alamat: alamatInput,
					area: areaInput,
					jenis: jenisInput,
					status: statusInput,
					is_ajax: 1,
				};

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Outlet cabang berhasil diedit</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = namaInput;
						document.getElementById("alamat-input").value = alamatInput;
						document.getElementById("area-input").value = areaInput;
						document.getElementById("jenis-input").value = jenisInput;
						document.getElementById("status-input").value = statusInput;
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}



function editUPC() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var alamatInput = $("#alamat-input").val();
			var areaInput = $("#area-input").val(); // Mengganti hargaSatuan-input menjadi hargaBarang-input
			var jenisInput = $("input[name='jenis']:checked").val(); // mengubah variabel jenislInput menjadi jenisInput dan menambahkan metode .val() untuk mengambil nilai dari radio button
			var statusInput = $("input[name='status']:checked").val(); // mengubah variabel statusInput dan menambahkan metode .val() untuk mengambil nilai dari radio button

			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" && // Mengganti variabel dari 'nama' menjadi 'namaInput'
				alamatInput !== "" && // Mengganti variabel dari 'alamat' menjadi 'alamatInput'
				areaInput !== "" && // Mengganti variabel dari 'harga' menjadi 'hargaInput'
				jenisInput !== undefined && // menambahkan kondisi untuk mengecek apakah radio button jenis telah dipilih
				statusInput !== undefined // menambahkan kondisi untuk mengecek apakah radio button status telah dipilih
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = ""; // action URL needs to be specified
				var form_data = {
					nama: namaInput,
					alamat: alamatInput,
					area: areaInput,
					jenis: jenisInput,
					status: statusInput,
					is_ajax: 1,
				};

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Outlet upc berhasil diedit</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = namaInput;
						document.getElementById("alamat-input").value = alamatInput;
						document.getElementById("area-input").value = areaInput;
						document.getElementById("jenis-input").value = jenisInput;
						document.getElementById("status-input").value = statusInput;
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function editGudang() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form

			var namaInput = $("#nama-input").val();
			var satuanInput = $("#satuan-input").val();
			var hargaInput = $("#harga-input").val();
			var minInput = $("#min-input").val();
			var statusInput = $("input[name='status']:checked").val();
			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" &&
				satuanInput !== "" &&
				hargaInput !== "" &&
				minInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = ""; // action URL needs to be specified
				var form_data = {
					nama: namaInput,
					satuan: satuanInput,
					harga: hargaInput,
					min: minInput,
					status: statusInput,
					is_ajax: 1,
				};

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Barang berhasil diedit</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = namaInput;
						document.getElementById("satuan-input").value = satuanInput;
						document.getElementById("harga-input").value = hargaInput;
						document.getElementById("min-input").value = minInput;
						document.getElementById("status-input").value = statusInput;
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function tambahGudang() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var satuanInput = $("#satuan-input").val();
			var hargaInput = $("#harga-input").val();
			var minInput = $("#min-input").val();
			var statusInput = $("input[name='status']:checked").val();
			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" &&
				satuanInput !== "" &&
				hargaInput !== "" &&
				minInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = site_url + "admin/gudang/tambah";
				var form_data = {
					nama: namaInput,
					satuan: satuanInput,
					harga: hargaInput,
					min: minInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Barang baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = "";
						document.getElementById("satuan-input").value = "";
						document.getElementById("harga-input").value = "";
						document.getElementById("min-input").value = "";
						document.getElementById("status-input").value = "";
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}



function tambahLog() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var barangInput = $("#barang-input").val();
			var jenisInput = $("#jenis-input").val();
			var outletInput = $("#outlet-input").val();
			var KeteranganInput = $("#keterangan-input").val();
			var jumlahInput = $("#jumlah-input").val();
			var tanggalInput = $("#tanggal-input").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				barangInput !== "" &&
				jenisInput !== "" &&
				jumlahInput !== "" &&
				tanggalInput !== ""
			) {
				var action = site_url + "admin/gudang/log";
				var form_data = {
					barang: barangInput,
					jenis: jenisInput,
					jumlah: jumlahInput,
					tanggal: tanggalInput,
					is_ajax: 1,
				};

				// Tambahkan kondisi khusus untuk outletInput dan KeteranganInput
				if (jenisInput === "1") {
					form_data.keterangan = KeteranganInput;
				} else if (jenisInput === "2") {
					form_data.outlet = outletInput;
				}

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Log baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("barang-input").value = "";
						document.getElementById("jenis-input").value = "";
						document.getElementById("outlet-input").value = "";
						document.getElementById("keterangan-input").value = "";
						document.getElementById("jumlah-input").value = "";
						$("#scroll-horizontal-datatable").DataTable().ajax.reload();
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}

		});
	});
}

function dataGudang() {
	const table = $("#scroll-horizontal-datatable").DataTable({
		processing: true,
		serverSide: true,
		scrollX: true,
		ajax: {
		  url: site_url + "admin/gudang/gudang_data",
		  type: "POST",
		},
		columns: [
		  { data: "id" },
		  { data: "nama" },
		  { data: "satuan" },
		  {
			data: "harga",
			render: function(data, type, row) {
			  if (type === 'display' || type === 'filter') {
				return 'Rp. ' + new Intl.NumberFormat('id-ID').format(data); // Format the number using the Indonesian locale
			  }
			  return data;
			}
		  },
		  { data: "sisa" },
		  { data: "status" },
		  {
			render: function (data, type, row) {
			  return (
				'<a href="' +
				site_url +
				"admin/gudang/edit/" +
				row.id +
				'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
				' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
			  );
			},
		  },
		],
		language: {
		  paginate: {
			previous: '<i class="mdi mdi-chevron-left"></i>',
			next: '<i class="mdi mdi-chevron-right"></i>',
		  },
		},
		drawCallback: function () {
		  $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
		},
		rowCallback: function (row, data) {
			var sisa = parseFloat(data.sisa);
			var minStok = parseFloat(data.min_stok);
			if (sisa <= minStok) {
			  $('td', row).addClass('bg-soft-danger');
			}
		  },
	  });
	  
			

	$(document).on("click", ".btn-soft-danger", function () {
		const id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Menghapus data barang juga akan menghapus data log barang. Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/gudang/delete",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}



function dataGudangLog() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		const filstart = url.searchParams.get("filstart") ? url.searchParams.get("filstart") : "";
		const filend = url.searchParams.get("filend") ? url.searchParams.get("filend") : "";
		const filbarang = url.searchParams.get("filbarang") ? url.searchParams.get("filbarang") : "";
		const filstatus = url.searchParams.get("filstatus") ? url.searchParams.get("filstatus") : "";
		$(document).ready(function () {
			var table = $("#scroll-horizontal-datatable").DataTable({
				processing: true,
				serverSide: true,
				scrollX: true,
				ajax: {
					
					url: site_url + "admin/gudang/log_data?filstart=" + filstart + "&filend=" + filend + "&filbarang=" + filbarang + "&filstatus=" + filstatus,
					type: "POST",
					data: function (d) {
						// Menambahkan data start dan length
						d.start = d.start;
						d.length = d.length;
					}
				},
				columns: [
					{
						data: "id",
					},
					{
						data: "tanggal",
					},
					{
						data: "barang",
					},
					{
						data: "keterangan",
					},
					{
						data: "jumlah",
					},
					{
						render: function (data, type, row) {
							return (
								' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
							);
						},
					},
				],
				language: {
					paginate: {
						previous: '<i class="mdi mdi-chevron-left"></i>',
						next: '<i class="mdi mdi-chevron-right"></i>',
					},
				},
				drawCallback: function () {
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
				},
				rowCallback: function (row, data) {
					var keterangan = data.keterangan;
					var keyword = "Barang Masuk";
			
					if (keterangan.indexOf(keyword) !== -1) {
						var startIndex = keterangan.indexOf(keyword) + keyword.length;
						var nextText = keterangan.substring(startIndex).trim();
			
						if (nextText.length > 0) {
							$(row).find('td:eq(3)').css("font-weight", "bold");
						} else if (data.keterangan.includes("Barang Masuk")) {
							$(row).find('td:eq(3)').css("font-weight", "bold");
						}
					}
				},
			});
		});


	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/gudang/deleteLog",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function editAnggaran() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var detailInput = $("#detail-input").val();
			var tahunInput = $("#tahun-input").val();
			var iventarisInput = $("#inventaris-input").val();
			var gedungInput = $("#gedung-input").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				detailInput !== "" &&
				tahunInput !== "" &&
				iventarisInput !== "" &&
				gedungInput !== ""
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = "";
				var form_data = {
					detail: detailInput,
					tahun: tahunInput,
					iventaris: iventarisInput,
					gedung: gedungInput,
					is_ajax: 1,
				};

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Anggaran berhasil diedit</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("detail-input").value = detailInput;
						document.getElementById("tahun-input").value = tahunInput;
						document.getElementById("inventaris-input").value = iventarisInput;
						document.getElementById("gedung-input").value = gedungInput;
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function tambahAnggaran() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var detailInput = $("#detail-input").val();
			var tahunInput = $("#tahun-input").val();
			var iventarisInput = $("#inventaris-input").val();
			var gedungInput = $("#gedung-input").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				detailInput !== "" &&
				tahunInput !== "" &&
				iventarisInput !== "" &&
				gedungInput !== ""
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = site_url + "admin/anggaran/tambah";
				var form_data = {
					detail: detailInput,
					tahun: tahunInput,
					iventaris: iventarisInput,
					gedung: gedungInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Anggaran baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("detail-input").value = "";
						document.getElementById("tahun-input").value = "";
						document.getElementById("inventaris-input").value = "";
						document.getElementById("gedung-input").value = "";
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function dataAnggaran() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		// mendapatkan nilai parameter 'tahun' dari URL
		const tahun = url.searchParams.get("tahun")
			? url.searchParams.get("tahun")
			: "all";
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			scrollX: true,
			ajax: {
				url:
					site_url + "admin/anggaran/anggaran_data?tahun=" + tahun,
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "detail",
				},
				{
					data: "tahun",
				},
				{
					data: "inventaris",
				},
				{
					data: "gedung",
				},
				{
					data: "total",
				},
				{
					data: "sisa",
				},
				{
					render: function (data, type, row) {
						return (
							'<a href="' +
							site_url +
							"admin/anggaran/edit/" +
							row.id +
							'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/anggaran/delete",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function dataUser() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		// mendapatkan nilai parameter 'role' dari URL
		const role = url.searchParams.get("role")
			? url.searchParams.get("role")
			: "all";
		// mendapatkan nilai parameter 'status' dari URL
		const status = url.searchParams.get("status")
			? url.searchParams.get("status")
			: "all";
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			scrollX: true,
			serverSide: true,
			ajax: {
				url:
					site_url + "admin/users/user_data?role=" + role + "&status=" + status,
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "nama",
				},
				{
					data: "email",
				},
				{
					data: "role",
				},
				{
					data: "status",
				},
				{
					render: function (data, type, row) {
						return (
							'<a href="' +
							site_url +
							"admin/users/edit/" +
							row.id +
							'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/users/delete_user",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function dataRole() {
	$(document).ready(function () {
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			scrollX: true,
			ajax: {
				url: site_url + "admin/users/role_data",
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "role_name",
				},
				{
					render: function (data, type, row) {
						return (
							'<button type="button" class="btn btn-soft-info btn-xs waves-effect waves-light"><i class="mdi mdi-format-list-bulleted"></i> Detail</button> ' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/users/delete_role",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function akun() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		// mendapatkan nilai parameter 'role' dari URL
		const role = url.searchParams.get("role")
			? url.searchParams.get("role")
			: "all";
		// mendapatkan nilai parameter 'status' dari URL
		const status = url.searchParams.get("status")
			? url.searchParams.get("status")
			: "all";
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url:
					site_url + "admin/auth/user_data?role=" + role + "&status=" + status,
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "nama",
				},
				{
					data: "email",
				},
				{
					data: "role",
				},
				{
					data: "status",
				},
				{
					render: function (data, type, row) {
						return (
							'<a href="' +
							site_url +
							"admin/auth/edit/" +
							row.id +
							'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/auth/delete_user",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function signin() {
	$(document).ready(function () {
		$("#signin-btn").click(function () {
			if (
				document.getElementById("email-input").value != "" &&
				document.getElementById("password-input").value != ""
			) {
				var action = $("#sign-in").attr("action");
				var form_data = {
					email: $("#email-input").val(),
					password: $("#password-input").val(),
					remember: $("#auth-remember-check").is(":checked") ? 1 : 0,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						if (response == "success") {
							$("#message").html(
								'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Anda akan dialihkan ke dasboard dalam beberapa saat</div>'
							);
							setTimeout(function () {
								window.location.href = site_url + "admin/dashboard";
							}, 1000);
						} else if (response == "notactive") {
							$("#message").html(
								'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Status akun belum aktif, mohon hubungi administrator</div>'
							);
						} else
							$("#message").html(
								'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Mohon periksa email atau password anda</div>'
							);
					},
				});
				return false;
			}
		});
	});
}

function tambahUser() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var userNameInput = $("#userName-input").val();
			var emailAddressInput = $("#emailAddress-input").val();
			var passwordInput = $("#password-input").val();
			var roleInput = $("#role-input").val();
			var statusInput = $("input[name='status']:checked").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				userNameInput !== "" &&
				emailAddressInput !== "" &&
				passwordInput !== "" &&
				roleInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = site_url + "admin/users/tambah";
				var form_data = {
					nama: userNameInput,
					email: emailAddressInput,
					password: passwordInput,
					role: roleInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						if (response === "available") {
							$("#message").html(
								'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Email sudah terdaftar sebelumnya</div>'
							);
						} else {
							$("#message").html(
								'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - User baru berhasil ditambahkan</div>'
							);
							setTimeout(function () {
								window.location.href = site_url + "admin/users/tambah";
							}, 1000);
						}
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function editUser() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var userNameInput = $("#userName-input").val();
			var passwordInput = $("#password-input").val();
			var roleInput = $("#role-input").val();
			var statusInput = $("input[name='status']:checked").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				userNameInput !== "" &&
				roleInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = "";
				var form_data = {
					nama: userNameInput,
					password: passwordInput,
					role: roleInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - User berhasil di edit</div>'
						);
						setTimeout(function () {
							window.location.href = "";
						}, 1000);
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}

function dataRole() {
	$(document).ready(function () {
		$("#scroll-horizontal-datatable").DataTable({
			processing: true,
			serverSide: true,
			scrollX: true,
			ajax: {
				url: site_url + "admin/users/role_data",
				type: "POST",
			},
			columns: [
				{
					data: "id",
				},
				{
					data: "role_name",
				},
				{
					render: function (data, type, row) {
						return (
							'<a href="' +
							site_url +
							"admin/users/roledetail/" +
							row.id +
							'" class="btn btn-soft-info btn-xs waves-effect waves-light"><i class="mdi mdi-format-list-bulleted"></i> Detail</a>' +
							' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
						);
					},
				},
			],
			language: {
				paginate: {
					previous: '<i class="mdi mdi-chevron-left"></i>',
					next: '<i class="mdi mdi-chevron-right"></i>',
				},
			},
			drawCallback: function () {
				$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
			},
		});
	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/users/delete_role",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}

function signin() {
	$(document).ready(function () {
		$("#signin-btn").click(function () {
			if (
				document.getElementById("email-input").value != "" &&
				document.getElementById("password-input").value != ""
			) {
				var action = $("#sign-in").attr("action");
				var form_data = {
					email: $("#email-input").val(),
					password: $("#password-input").val(),
					remember: $("#auth-remember-check").is(":checked") ? 1 : 0,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						if (response == "success") {
							$("#message").html(
								'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Anda akan dialihkan ke dasboard dalam beberapa saat</div>'
							);
							setTimeout(function () {
								window.location.href = site_url + "admin/dashboard";
							}, 1000);
						} else if (response == "notactive") {
							$("#message").html(
								'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Status akun belum aktif, mohon hubungi administrator</div>'
							);
						} else
							$("#message").html(
								'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Mohon periksa email atau password anda</div>'
							);
					},
				});
				return false;
			}
		});
	});
}


function editUser() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var userNameInput = $("#userName-input").val();
			var passwordInput = $("#password-input").val();
			var roleInput = $("#role-input").val();
			var statusInput = $("input[name='status']:checked").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				userNameInput !== "" &&
				roleInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = "";
				var form_data = {
					nama: userNameInput,
					password: passwordInput,
					role: roleInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - User berhasil di edit</div>'
						);
						setTimeout(function () {
							window.location.href = "";
						}, 1000);
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}


//atk

function dataAtk() {
	const table = $("#scroll-horizontal-datatable").DataTable({
		processing: true,
		serverSide: true,
		scrollX: true,
		ajax: {
		  url: site_url + "admin/gudang/atk_data",
		  type: "POST",
		},
		columns: [
		  { data: "id" },
		  { data: "nama" },
		  { data: "satuan" },
		  {
			data: "harga",
			render: function(data, type, row) {
			  if (type === 'display' || type === 'filter') {
				return 'Rp. ' + new Intl.NumberFormat('id-ID').format(data); // Format the number using the Indonesian locale
			  }
			  return data;
			}
		  },
		  { data: "sisa" },
		  { data: "status" },
		  {
			render: function (data, type, row) {
			  return (
				'<a href="' +
				site_url +
				"admin/gudang/atkedit/" +
				row.id +
				'" class="btn btn-soft-warning btn-xs waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i> Edit</a> ' +
				' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
			  );
			},
		  },
		],
		language: {
		  paginate: {
			previous: '<i class="mdi mdi-chevron-left"></i>',
			next: '<i class="mdi mdi-chevron-right"></i>',
		  },
		},
		drawCallback: function () {
		  $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
		},
		rowCallback: function (row, data) {
			var sisa = parseFloat(data.sisa);
			var minStok = parseFloat(data.min_stok);
			if (sisa <= minStok) {
			  $('td', row).addClass('bg-soft-danger');
			}
		  },
	  });
	  
			

	$(document).on("click", ".btn-soft-danger", function () {
		const id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/gudang/deleteAtk",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}






function tambahAtk() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var namaInput = $("#nama-input").val();
			var satuanInput = $("#satuan-input").val();
			var hargaInput = $("#harga-input").val();
			var minInput = $("#min-input").val();
			var statusInput = $("input[name='status']:checked").val();
			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" &&
				satuanInput !== "" &&
				hargaInput !== "" &&
				minInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = site_url + "admin/gudang/tambahatk";
				var form_data = {
					nama: namaInput,
					satuan: satuanInput,
					harga: hargaInput,
					min: minInput,
					status: statusInput,
					is_ajax: 1,
				};
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Barang Atk baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$('#message .alert:last-child').fadeOut('fast', function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = "";
						document.getElementById("satuan-input").value = "";
						document.getElementById("harga-input").value = "";
						document.getElementById("min-input").value = "";
						document.getElementById("status-input").value = "";
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}


function editAtk() {
	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form

			var namaInput = $("#nama-input").val();
			var satuanInput = $("#satuan-input").val();
			var hargaInput = $("#harga-input").val();
			var minInput = $("#min-input").val();
			var statusInput = $("input[name='status']:checked").val();
			// memeriksa nilai inputan pada semua elemen form
			if (
				namaInput !== "" &&
				satuanInput !== "" &&
				hargaInput !== "" &&
				minInput !== "" &&
				statusInput !== undefined
			) {
				// jika semua nilai inputan sudah diisi, maka submit form menggunakan ajax
				var action = ""; // action URL needs to be specified
				var form_data = {
					nama: namaInput,
					satuan: satuanInput,
					harga: hargaInput,
					min: minInput,
					status: statusInput,
					is_ajax: 1,
				};

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Barang Atk berhasil diedit</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("nama-input").value = namaInput;
						document.getElementById("satuan-input").value = satuanInput;
						document.getElementById("harga-input").value = hargaInput;
						document.getElementById("min-input").value = minInput;
						document.getElementById("status-input").value = statusInput;
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				// jika ada nilai inputan yang kosong, tampilkan pesan kesalahan
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}
		});
	});
}





function dataAtkLog() {
	$(document).ready(function () {
		const url = new URL(window.location.href);
		const filstart = url.searchParams.get("filstart") ? url.searchParams.get("filstart") : "";
		const filend = url.searchParams.get("filend") ? url.searchParams.get("filend") : "";
		const filbarang = url.searchParams.get("filbarang") ? url.searchParams.get("filbarang") : "";
		const filstatus = url.searchParams.get("filstatus") ? url.searchParams.get("filstatus") : "";
		$(document).ready(function () {
			var table = $("#scroll-horizontal-datatable").DataTable({
				processing: true,
				serverSide: true,
				scrollX: true,
				ajax: {
					
					url: site_url + "admin/gudang/atk_log_data?filstart=" + filstart + "&filend=" + filend + "&filbarang=" + filbarang + "&filstatus=" + filstatus,
					type: "POST",
					data: function (d) {
						// Menambahkan data start dan length
						d.start = d.start;
						d.length = d.length;
					}
				},
				columns: [
					{
						data: "id",
					},
					{
						data: "tanggal",
					},
					{
						data: "barang",
					},
					{
						data: "keterangan",
					},
					{
						data: "jumlah",
					},
					{
						render: function (data, type, row) {
							return (
								' <button type="button" class="btn btn-soft-danger btn-xs waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i> Hapus</button> '
							);
						},
					},
				],
				language: {
					paginate: {
						previous: '<i class="mdi mdi-chevron-left"></i>',
						next: '<i class="mdi mdi-chevron-right"></i>',
					},
				},
				drawCallback: function () {
					$(".dataTables_paginate > .pagination").addClass("pagination-rounded");
				},
				rowCallback: function (row, data) {
					var keterangan = data.keterangan;
					var keyword = "Barang Masuk";
			
					if (keterangan.indexOf(keyword) !== -1) {
						var startIndex = keterangan.indexOf(keyword) + keyword.length;
						var nextText = keterangan.substring(startIndex).trim();
			
						if (nextText.length > 0) {
							$(row).find('td:eq(3)').css("font-weight", "bold");
						} else if (data.keterangan.includes("Barang Masuk")) {
							$(row).find('td:eq(3)').css("font-weight", "bold");
						}
					}
				},
			});
		});


	});

	$(document).on("click", ".btn-soft-danger", function () {
		var id = $(this).closest("tr").find("td:first-child").text();

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus data!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: site_url + "admin/gudang/delete_logAtk",
					type: "POST",
					data: {
						id: id,
					},
					success: function (response) {
						Swal.fire({
							title: "Berhasil",
							text: "Data berhasil dihapus",
							icon: "success",
						}).then(() => {
							$("#scroll-horizontal-datatable").DataTable().ajax.reload();
						});
					},
				});
			}
		});
	});
}


function tambahAtkLog() {

	$(document).ready(function () {
		$("#simpan-btn").click(function (e) {
			e.preventDefault(); // untuk mencegah form submit secara default
			// mengambil nilai inputan pada semua elemen form
			var barangInput = $("#barang-input").val();
			var jenisInput = $("#jenis-input").val();
			var departemenInput = $("#departemen-input").val();
			var KeteranganInput = $("#keterangan-input").val();
			var jumlahInput = $("#jumlah-input").val();
			var tanggalInput = $("#tanggal-input").val();

			// memeriksa nilai inputan pada semua elemen form
			if (
				barangInput !== "" &&
				jenisInput !== "" &&
				jumlahInput !== "" &&
				tanggalInput !== ""
			) {
				var action = site_url + "admin/gudang/logatk";
				var form_data = {
					barang: barangInput,
					jenis: jenisInput,
					jumlah: jumlahInput,
					tanggal: tanggalInput,
					is_ajax: 1,
				};

				// Tambahkan kondisi khusus untuk outletInput dan KeteranganInput
				if (jenisInput === "1") {
					form_data.keterangan = KeteranganInput;
				} else if (jenisInput === "2") {
					form_data.departemen = departemenInput;
				}

				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function (response) {
						$("#message").html(
							'<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Berhasil</strong> - Log Atk baru berhasil ditambahkan</div>'
						);
						setTimeout(function () {
							$("#message .alert:last-child").fadeOut("fast", function () {
								$(this).remove();
							});
						}, 3000);
						document.getElementById("barang-input").value = "";
						document.getElementById("jenis-input").value = "";
						document.getElementById("departemen-input").value = "";
						document.getElementById("keterangan-input").value = "";
						document.getElementById("jumlah-input").value = "";
						$("#scroll-horizontal-datatable").DataTable().ajax.reload();
					},
					error: function () {
						$("#message").html(
							'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Gagal</strong> - Terjadi kesalahan saat mengirim data</div>'
						);
					},
				});
			} else {
				$("#message").html(
					'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Galat!</strong> - Mohon pastikan anda mengisi semua data</div>'
				);
			}

		});
	});
}
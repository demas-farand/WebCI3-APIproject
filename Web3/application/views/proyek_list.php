<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Proyek</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
			background-color: #f4f4f4;
		}

		h1 {
			text-align: center;
			color: #333;
		}

		.container {
			max-width: 1000px;
			margin: 0 auto;
			background: #fff;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		table,
		th,
		td {
			border: 1px solid #ddd;
		}

		th,
		td {
			padding: 12px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		a.button {
			display: inline-block;
			padding: 10px 15px;
			margin: 5px 0;
			font-size: 14px;
			color: #fff;
			background-color: #007bff;
			border: none;
			border-radius: 5px;
			text-decoration: none;
			text-align: center;
		}

		a.button:hover {
			background-color: #0056b3;
		}

		.actions a {
			margin-right: 10px;
		}

		.actions a.edit {
			background-color: #28a745;
		}

		.actions a.delete {
			background-color: #dc3545;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Daftar Proyek</h1>
		<a href="<?php echo site_url('proyek/create'); ?>" class="button">Tambah Proyek Baru</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Proyek</th>
					<th>Client</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Pimpinan Proyek</th>
					<th>Keterangan</th>
					<th>Created At</th>
					<th>Lokasi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($proyek)): ?>
					<?php foreach ($proyek as $p): ?>
						<tr>
							<td><?php echo isset($p['id']) ? $p['id'] : ''; ?></td>
							<td><?php echo isset($p['namaProyek']) ? $p['namaProyek'] : ''; ?></td>
							<td><?php echo isset($p['client']) ? $p['client'] : ''; ?></td>
							<td><?php echo isset($p['tglMulai']) ? $p['tglMulai'] : ''; ?></td>
							<td><?php echo isset($p['tglSelesai']) ? $p['tglSelesai'] : ''; ?></td>
							<td><?php echo isset($p['pimpinanProyek']) ? $p['pimpinanProyek'] : ''; ?></td>
							<td><?php echo isset($p['keterangan']) ? $p['keterangan'] : ''; ?></td>
							<td><?php echo isset($p['createdAt']) ? $p['createdAt'] : ''; ?></td>
							<td><?php echo isset($p['lokasi']['nama']) ? $p['lokasi']['nama'] : 'Tidak ada lokasi'; ?></td>
							<td class="actions">
								<a href="<?php echo site_url('proyek/edit/' . $p['id']); ?>" class="button edit">Edit</a>
								<a href="<?php echo site_url('proyek/delete/' . $p['id']); ?>" class="button delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="10">Tidak ada data proyek.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</body>

</html>

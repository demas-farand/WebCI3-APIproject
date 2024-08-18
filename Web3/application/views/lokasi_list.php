<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Lokasi</title>
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
		<h1>Daftar Lokasi</h1>
		<a href="<?php echo site_url('lokasi/create'); ?>" class="button">Tambah Lokasi Baru</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Lokasi</th>
					<th>Negara</th>
					<th>Provinsi</th>
					<th>Kota</th>
					<th>Created At</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($lokasi)): ?>
					<?php foreach ($lokasi as $item): ?>
						<tr>
							<td><?php echo $item['id']; ?></td>
							<td><?php echo $item['namaLokasi']; ?></td>
							<td><?php echo $item['negara']; ?></td>
							<td><?php echo $item['provinsi']; ?></td>
							<td><?php echo $item['kota']; ?></td>
							<td><?php echo $item['createdAt']; ?></td>
							<td class="actions">
								<a href="<?php echo site_url('lokasi/edit/' . $item['id']); ?>" class="button edit">Edit</a>
								<a href="<?php echo site_url('lokasi/delete/' . $item['id']); ?>"
									class="button delete">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="7">Tidak ada data lokasi.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</body>

</html>

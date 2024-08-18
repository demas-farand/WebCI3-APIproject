<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Form Proyek</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.form-container {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 300px;
		}

		.form-container h1 {
			margin-bottom: 20px;
			font-size: 24px;
			text-align: center;
		}

		.form-container label {
			display: block;
			margin-bottom: 8px;
			font-weight: bold;
		}

		.form-container input[type="text"],
		.form-container select {
			width: 100%;
			padding: 8px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		.form-container button {
			width: 100%;
			padding: 10px;
			background-color: #007BFF;
			border: none;
			border-radius: 4px;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
		}

		.form-container button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div class="form-container">
		<h1>Form Proyek</h1>
		<form action="<?php echo site_url('proyek/save'); ?>" method="post">
			<input type="hidden" name="id" value="<?php echo isset($proyek['id']) ? $proyek['id'] : ''; ?>">
			<label for="nama">Nama Proyek:</label>
			<input type="text" name="nama" value="<?php echo isset($proyek['nama']) ? $proyek['nama'] : ''; ?>">
			<label for="lokasi_id">Lokasi:</label>
			<select name="lokasi_id">
				<?php foreach ($lokasi as $l): ?>
					<option value="<?php echo $l['id']; ?>" <?php echo isset($proyek['lokasi_id']) && $proyek['lokasi_id'] == $l['id'] ? 'selected' : ''; ?>><?php echo $l['nama']; ?></option>
				<?php endforeach; ?>
			</select>
			<button type="submit">Simpan</button>
		</form>
	</div>
</body>

</html>

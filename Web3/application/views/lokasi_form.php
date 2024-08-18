<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Form Lokasi</title>
</head>

<body>
	<h1>Form Lokasi</h1>
	<form action="<?php echo site_url('lokasi/save'); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo isset($lokasi['id']) ? $lokasi['id'] : ''; ?>">

		<label for="nama">Nama Lokasi:</label>
		<input type="text" name="nama" value="<?php echo isset($lokasi['nama']) ? $lokasi['nama'] : ''; ?>">

		<label for="negara">Negara:</label>
		<input type="text" name="negara" value="<?php echo isset($lokasi['negara']) ? $lokasi['negara'] : ''; ?>">

		<label for="provinsi">Provinsi:</label>
		<input type="text" name="provinsi" value="<?php echo isset($lokasi['provinsi']) ? $lokasi['provinsi'] : ''; ?>">

		<label for="kota">Kota:</label>
		<input type="text" name="kota" value="<?php echo isset($lokasi['kota']) ? $lokasi['kota'] : ''; ?>">

		<label for="created_at">Created At:</label>
		<input type="text" name="created_at"
			value="<?php echo isset($lokasi['created_at']) ? $lokasi['created_at'] : ''; ?>">

		<button type="submit">Simpan</button>
	</form>
</body>

</html>

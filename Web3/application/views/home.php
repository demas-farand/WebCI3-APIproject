<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}

		.container {
			text-align: center;
			background: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		h1 {
			margin-bottom: 20px;
			color: #333;
		}

		.button {
			display: inline-block;
			margin: 10px 0;
			padding: 10px 20px;
			text-decoration: none;
			color: white;
			background-color: #007BFF;
			border-radius: 5px;
			font-size: 18px;
			transition: background-color 0.3s;
		}

		.button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Selamat Datang</h1>
		<a href="<?php echo site_url('lokasi'); ?>" class="button">Arsip Lokasi</a>
		<a href="<?php echo site_url('proyek'); ?>" class="button">Arsip Proyek</a>
	</div>
</body>

</html>

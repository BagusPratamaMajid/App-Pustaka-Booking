<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
		<style type="text">
				.table-data {
						width: 100%;
						border-collapse: collapse;
				}

				.table-data tr th,
				.table-data	tr td {
						border: 1px solid black;
						font-size: 11pt;
						padding: 10px 10px 10px 10px;
				}
		</style>
<body>
			<h3>
				<center>
				Laporan Data Buku Perpustakaan Online
				</center>
			</h3>
			<br>
			<table class="table-data">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Buku</th>
						<th>Pengarang</th>
						<th>Terbit</th>
						<th>Tahun Penerbit</th>
						<th>ISBN</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody>
				 <?php 
							$no = 1;
							foreach ($buku as $b) :
					?>
					<tr>
						<th scope="row"><?= $no++; ?></th>
						<td><?= $b['judul_buku']; ?></td>
						<td><?= $b['pengarang']; ?></td>
						<td><?= $b['penerbit']; ?></td>
						<td><?= $b['tahun_terbit']; ?></td>
						<td><?= $b['isbn']; ?></td>
						<td><?= $b['stok']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
	
</body>
</html>

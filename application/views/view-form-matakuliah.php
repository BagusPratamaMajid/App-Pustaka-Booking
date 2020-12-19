<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Input Matakuliah</title>
</head>
<body>

			<center>
					<form action="<?php base_url() ?>matakuliah/cetak" method="post">
										<table style="background:green">
														<tr>
																<th colspan="3">
																			Form Input Data Mata Kuliah
																</th>
														</tr>

														<tr>
																<th colspan="3">
																				<hr>
																</th>
														</tr>

														<tr>
															<th>Kode MTK</th>
															<td>:</td>
															<td>
																		<input type="text" name="kode" id="kode" autocomplete="off" autofocus 
																		value="<?= set_value('kode');?>">
															</td>
															<td><?= form_error('kode') ?></td>
														</tr>

														<tr>
																<th>Nama MTK</th>
																<td>:</td>
																<td>
																			<input type="text" name="nama" id="nama" autocomplete="off" 
																			value="<?= set_value('nama'); ?>">
																</td>
																<td><?= form_error('nama'); ?></td>
														</tr>

														<tr>
																<th>SKS</th>
																<td>:</td>
																<td>
																			<select name="sks" id="sks">
																							<option value="">Pilih SKS</option>
																							<option value="2">2</option>
																							<option value="3">3</option>
																							<option value="4">4</option>
																			</select>
																</td>
																<td><?= form_error('sks'); ?></td>
														</tr>
														
														<tr>
																<td colspan="3" align="center">
																			<button type="submit">Submit</button>
																</td>
														</tr>											
										</table>
										<br>
						</form>
			</center>
</body>
</html>

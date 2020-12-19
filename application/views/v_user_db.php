<section>
	<h1><?= $judul; ?></h1>
			<table >
					<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Email</th>
								<th scope="col">Aksi</th>
							</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach( $user as $user ) : ?>
						<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $user['nama']; ?></td>
								<td><?= $user['email']; ?></td>
								<td>
										<a href=""><i class="fas fa-trash">&nbsp;Delete</i></a>
										<a href=""><i class="fas fa-pencil-square">&nbsp;Edit</i></a>
										<a href=""><i class="fas fa-eye">&nbsp;Detail</i></a>
								</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
			</table>
</section>	

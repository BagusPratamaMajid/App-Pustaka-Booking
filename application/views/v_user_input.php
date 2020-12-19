<section>
		<div class="user-input">
				<h1><?= $judul ?></h1>
				<form action="<?= base_url() ?>web/user_output" method="post">
							<div class="container">
										<div class="content">
													<label for="username">Username</label><br><br>
													<input type="text" name="username" id="username"><br><br>

													<label for="password">Password</label><br><br>
													<input type="password" name="password" id="password"><br><br>

													<button type="submit">Login</button>
										</div>
							</div>
				</form>
		</div>
</section>

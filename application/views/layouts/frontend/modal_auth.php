<!-- Modal Auth -->
<div class="modal-auth">
	<div class="btn-modal-close">
		<h1>X</h1>
	</div>
	<div class="modal-content-auth">
		<div class="container">
			<div class="card-auth">
				<div class="button-box">
					<div id="btn"></div>
					<button type="button" class="toggle-btn" onclick="login()">Login</button>
					<button type="button" class="toggle-btn" onclick="register()">Register</button>
				</div>
				<div class="error"></div>
				<form id="login" class="form-input-auth" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" autocomplete="off">
					</div>

					<label for="password">Password</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" autocomplete="off">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">
								<i class="fa fa-eye-slash" id="btn-show"></i>
							</span>
						</div>
					</div>
					<button type="submit" class="btn-login-auth">Login</button>
				</form>
				<form id="register" class="form-input-auth" method="post">
					<div class="form-group">
						<label for="nm_customer">Nama Lengkap</label>
						<input type="text" class="form-control" name="nm_customer" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" autocomplete="off">
					</div>
					<label for="password">Password</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" autocomplete="off">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">
								<i class="fa fa-eye-slash" id="btn-show"></i>
							</span>
						</div>
					</div>
					<button type="submit" class="btn-login-auth">Register</button>
				</form>
			</div>
		</div>

	</div>
</div>

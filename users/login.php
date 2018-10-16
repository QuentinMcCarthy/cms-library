<?php
	require "../includes/head.php";

	// password_verify($password, $hashedPassword);

	if($_POST){
		extract($_POST);

		$errors = array();

		$sql = "SELECT * FROM `users` WHERE username = '$username'";

		$result = mysqli_query($dbc, $sql);

		if($result && mysqli_affected_rows($dbc) > 0){
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(password_verify($password, $user['password'])){
				$_SESSION["valid"]=true;
				$_SESSION["timeout"]=time();
				$_SESSION["username"]=$username;

				header("Location: confirmlogin.php");
			} else {
				array_push($errors, "Incorrect password");
			}
		} else if($result && mysqli_affected_rows($dbc) == 0){
			array_push($errors, "Incorrect username");
		} else {
			die("ERROR: Database SELECT failed");
		}
	}
?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card rounded-0">
				<div class="card-header">
					<h3 class="mb-0">Login</h3>
				</div>

				<div class="card-body">
					<?php if($_POST && !empty($errors)): ?>
						<div class="row">
							<div class="col">
								<div class="alert alert-danger pb-0" role="alert">
									<ul>
										<?php foreach($errors as $singleError): ?>
											<li><?= $singleError; ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<form class="form" method="POST" action="./users/login.php">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control form-control-lg rounded-0" name="username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control form-control-lg rounded-0" name="password" autocomplete="new-password">
						</div>

						<button type="submit" class="btn btn-info btn-lg btn-block">Login</button>
					</form>
				</div>

				<div class="card-footer">
					<a class="btn btn-link text-muted" href="./users/signup.php">Register</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require "../includes/footer.php" ?>

<?php
	require "../includes/head.php";

	if($_POST){
		extract($_POST);

		$errors = array();

		if(!$email){
			array_push($errors, "Please provide an email");
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Please enter a valid email address");
		} elseif(strlen($email) > 254){
			array_push($errors, "Email address is too long, cannot be longer than 254 characters");
		}

		if(!$username){
			array_push($errors, "Please provide a username");
		} elseif(strlen($username) < 6){
			array_push($errors, "Username is too short, must be at least 6 characters");
		} elseif(strlen($username) > 25){
			array_push($errors, "Username cannot be longer than 25 characters");
		}

		if(!$password){
			array_push($errors, "Please provide a password");
		} elseif(strlen($password) < 6){
			array_push($errors, "Password is too short, must be at least 6 characters");
		} elseif(strlen($password) > 25){
			array_push($errors, "Password cannot be longer than 25 characters");
		}

		if($confirmpass != $password){
			array_push($errors, "Passwords do not match");
		}

		if(empty($errors)){
			$email = mysqli_real_escape_string($dbc, $email);
			$username = mysqli_real_escape_string($dbc, $username);
			$password = mysqli_real_escape_string($dbc, $password);

			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email','$username','$hashedPassword')";

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				$_SESSION["valid"]=true;
				$_SESSION["timeout"]=time();
				$_SESSION["username"]=$username;

				header("Location: confirmSignup.php");
			} else {
				die("ERROR: Database INSERT failed");
			}
		}
	}
?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card rounded-0">
				<div class="card-header">
					<h3 class="mb-0">Register</h3>
				</div>

				<div class="card-body">
					<?php if($_POST && !empty($errors)): ?>
						<div class="row mb-2">
							<div class="col">
								<div class="alert alert-danger" role="alert">
									<ul>
										<?php foreach($errors as $error): ?>
											<li><?= $error; ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<form action="./users/signup.php" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
						</div>

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>

						<div class="form-group">
							<label for="confirmpass">Confirm Password</label>
							<input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password">
		                </div>

						<button type="submit" class="btn btn-outline-info btn-block">Submit</button>
					</form>
				</div>

				<div class="card-footer">
					<a class="btn btn-link text-muted" href="./users/login.php">Already a member? Login in</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require "../includes/footer.php"; ?>

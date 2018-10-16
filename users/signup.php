<?php
	require "../includes/head.php";

	// $hashedPassword = password_hashg($password, PASSWORD_DEFAULT);
	// password_verify(FROM_INPUT_FIELD, HASHED_FROM_DATABASE);
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1>Sign up</h1>
		</div>
	</div>

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

	<div class="row mb-2">
		<div class="col">
			<form action="./users/signup.php" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="title" placeholder="Enter book title" value="<?php if(isset($_POST['title'])){ echo $_POST['title']; } ?>">
				</div>

				<div class="form-group">
					<label for="author">Author</label>
					<input type="text" class="form-control" name="author" placeholder="Enter books author" value="<?php if(isset($_POST['author'])){ echo $_POST['author']; } ?>">
				</div>

				<div class="form-group">
					<label for="description">Book Description</label>
					<textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description about the book"><?php if(isset($_POST['description'])){ echo $_POST['description']; } ?></textarea>
                </div>

				<div class="form-group">
					<label for="file">Upload an Image</label>
					<input type="file" name="image" class="form-control-file">
				</div>

				<button type="submit" class="btn btn-outline-info btn-block">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php require "../includes/footer.php"; ?>

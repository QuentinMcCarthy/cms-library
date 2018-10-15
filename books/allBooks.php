<?php
	require "../includes/head.php";

	$sql = "SELECT `id`, `book_name`, `image_name` FROM `books`";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allBooks = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		die("ERROR: Database SELECT failed");
	}
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1>All Books</h1>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col">
			<a class="btn btn-outline-primary" href="./books/add.php">Add new Book</a>
		</div>
	</div>

	<div class="row">
		<?php if($allBooks): ?>
			<?php foreach($allBooks as $book): ?>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<img class="card-img-top" src="./img/uploads/thumbs/<?= $book['image_name']; ?>" alt="Book cover">
						<div class="card-body">
							<p class="card-text"><?= $book['book_name']; ?></p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a href="./books/book.php?id=<?= $book['id']; ?>" class="btn btn-sm btn-outline-info">View</a>
									<a href="./books/update.php?id=<?= $book['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="col-md-4">
				<p>No books found</p>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php require "../includes/footer.php" ?>

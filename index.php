<?php
	require "includes/head.php";

	// $sql = "SELECT * FROM `books` ORDER BY `id` DESC LIMIT 1";
	$sql = "SELECT books.id AS bookID, book_name, description, image_name, name AS author FROM books INNER JOIN authors ON books.author_id = authors.id ORDER BY bookID DESC LIMIT 1";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$latestBook = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		die("ERROR: Database SELECT failed");
	}
?>

<div class="container">
	<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
		<div class="col-md-6 px-0">
			<h1 class="display-4 font-italic">Harry Potter and the Philosopher's Stone</h1>
			<p class="lead my-3">Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his eleventh birthday when he receives a letter of acceptance into a Hogwarts School of Witchcraft and Wizardry.</p>
			<p class="lead mb-0"><a href="./books/single.php" class="text-white font-weight-bold">Continue reading...</a></p>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col-md-6">
			<div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Books</strong>
                    <h3 class="mb-0"><a class="text-dark" href="./books/book.php?id=<?= $latestBook['id']; ?>"><?= $latestBook['book_name']; ?></a></h3>

                    <div class="mb-1 text-muted">
						<?= $latestBook['author']; ?>
					</div>

                    <p class="card-text mb-auto"><?= $latestBook['description']; ?></p>
                    <a href="./books/single.php">Continue reading</a>
                </div>

                <img class="card-img-right flex-auto d-none d-lg-block" src="./img/uploads/thumbs/small/<?= $latestBook['image_name']; ?>" alt="Card image cap">
            </div>
        </div>

        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Movies</strong>

                    <h3 class="mb-0"><a class="text-dark" href="#">Latest Movie Title</a></h3>

                    <div class="mb-1 text-muted">
						Nov 11
					</div>

                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>

                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
    </div>
</div>

<?php require "includes/footer.php"; ?>

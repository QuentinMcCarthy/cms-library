<?php
	require "../includes/head.php";

    // require 'vendor/autoload.php';
    // import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;

	$id = $_GET['id'];

	$sql = "SELECT * FROM `books` WHERE id = $id";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$book = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$originalImage = $book['image_name'];

		$originalID = $book['author_id'];

		$sql = "SELECT * FROM `authors` WHERE id = $originalID";

		$result = mysqli_query($dbc, $sql);

		if($result && mysqli_affected_rows($dbc) > 0){
			$author = mysqli_fetch_array($result, MYSQLI_ASSOC);
		} else {
			die("ERROR: Database SELECT failed");
		}
	} elseif($result && mysqli_affected_rows($dbc) == 0){
		// die("Error 404");

		header("Location: ../errors/404.php");
	} else {
		die("ERROR: Database SELECT failed");
	}

	if($_POST){
        extract($_POST);

        $errors = array();

        if(!$title){
            array_push($errors, "Title is required, please enter a value");
        } elseif(strlen($title) < 2){
            array_push($errors, "Please enter at least 2 characters for your Title");
        } elseif(strlen($title) > 100){
            array_push($errors, "The title can't be more than 100 characters");
        }

        if(!$author){
            array_push($errors, "An author is required, please enter a value");
        } elseif(strlen($author) < 2){
            array_push($errors, "Please enter at least 2 characters for the author");
        } elseif(strlen($author) > 100){
            array_push($errors, "The Author Name can't be more than 100 characters");
        }

        if(!$description){
            array_push($errors, "A description is required, please enter a value");
        } elseif(strlen($description) < 10){
            array_push($errors, "The description must be at least 10 characters long");
        } elseif(strlen($description) > 1000){
            array_push($errors, "The description needs to be less than 1000 characters");
        }

		if(file_exists($_FILES['image']['tmp_name'])){
            $fileSize = $_FILES['image']['size'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];

			if($fileSize > 5000000){
                array_push($errors, "The file is to large, must be under 5MB");
            } else {
                $validExtensions = array(
					"jpeg",
					"jpg",
					"png"
				);

                $fileNameArray = explode(".", $_FILES['image']['name']);

                $fileExt = strtolower(end($fileNameArray));

                if(in_array($fileExt, $validExtensions) === false){
                    array_push($errors, "File type not allowed, can only be a jpg or png");
                }
            }
		}

        if(empty($errors)){
			$title = mysqli_real_escape_string($dbc, $title);
			$author = mysqli_real_escape_string($dbc, $author);
			$description = mysqli_real_escape_string($dbc, $description);

			$authorID = $_POST['authorID'];

			$sql = "UPDATE `books` SET `book_name`='$title',`author_id`='$authorID',`description`='$description'";

			if(file_exists($_FILES['image']['tmp_name'])){
	            $newFileName = uniqid().".".$fileExt;
				$filename = mysqli_real_escape_string($dbc, $newFileName);

				$sql .= ", `image_name`='$filename'";
			}

			$sql .= " WHERE id = $id";

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				if(file_exists($_FILES['image']['tmp_name'])){
					unlink("../img/uploads/$originalImage");
					unlink("../img/uploads/thumbs/small/$originalImage");
					unlink("../img/uploads/thumbs/medium/$originalImage");

					$destination = "../img/uploads";

		            if(!is_dir($destination)){
		                mkdir($destination."/", 0777, true);
		            }

		            $manager = new ImageManager();
		            $mainImage = $manager->make($fileTmp);
		            $mainImage->save($destination."/".$newFileName, 100);


					$thumbnailImage = $manager->make($fileTmp);

		            $thumbDestination = "../img/uploads/thumbs/small";

		            if(!is_dir($thumbDestination)){
		                mkdir($thumbDestination."/", 0777, true);
		            }

	                $thumbnailImage->resize(null, 250, function($constraint){
	                    $constraint->aspectRatio();
	                    $constraint->upsize();
	                });

	                $thumbnailImage->save($thumbDestination."/".$newFileName, 100);

	                $mediumImage = $manager->make($fileTmp);

	                $mediumDestination = "../img/uploads/thumbs/medium";

	                if(!is_dir($mediumDestination)){
	                    mkdir($mediumDestination."/", 0777, true);
	                }

	                $mediumImage->resize(300, null, function($constraint){
	                    $constraint->aspectRatio();
	                    $constraint->upsize();
	                });

	                $mediumImage->save($mediumDestination."/".$newFileName, 100);
				}

				header("Location: book.php?id=$id");
			} else {
				die("ERROR: Database UPDATE failed");
			}
        }
    }
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1>Edit <?= $book['book_name']; ?></h1>
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
			<form action="./books/update.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Book Title</label>
					<input type="text" class="form-control" name="title" placeholder="Enter book title" value="<?php if($_POST){ echo $_POST['title']; } else { echo $book['book_name']; } ?>">
				</div>

				<div class="form-group">
					<label for="author">Author</label>
					<input type="text" class="form-control" name="author" placeholder="Enter books author" value="<?php if($_POST){ echo $_POST['author']; } else { echo $author['name']; } ?>" autocomplete="off">
					<input type="hidden" name="authorID" value="">
					<div id="autocompleteAuthors">

					</div>
				</div>

				<div class="form-group">
					<label for="author">Book Description</label>
					<textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description about the book"><?php if($_POST){ echo $_POST['description']; } else { echo $book['description']; } ?></textarea>
				</div>

				<div class="form-group">
					<img src="./img/uploads/thumbs/small/<?= $book['image_name']; ?>" alt="Card image cap">
					<label for="file">Upload an Image</label>
					<input type="file" name="image" class="form-control-file">
				</div>

				<button type="submit" class="btn btn-outline-info btn-block">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php require "../includes/footer.php"; ?>

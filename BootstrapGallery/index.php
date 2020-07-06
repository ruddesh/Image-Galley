<?php require_once 'init.php'; 
// Instantiation of class Image.
	$Image = new Image;
// Method called here Uploads image to database.
	$Image->uploadImage();
// Method called here to fetch images from database and stored in a variable.
	$images = $Image->getImages();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style type="text/css" media="screen">
	img{
		
		max-width:100% ;
		height: 300px !important;
		width: 400px !important;
		object-fit: contain;
	}
	body{
		background-color: #D3D3D3;
	}
	#forma{
		background-color: #C0C0C0;
	}
</style>
</head>
<body>
<div class="jumbotron" id="forma">
	<h1 class="text-center font-weight-bold">Image Gallery</h1>
	<div class="float-right">
		<form method="post" action="index.php" enctype="multipart/form-data" class="form-inline">
		  <div class="form-group">
		    <input type="file" name="image" required>
		  </div>
		  <div class="form-group">
			  <input type="submit" name="upload" value="Upload Image" class="btn btn-success btn-sms" >
		  </div>
		</form>
	</div>
</div>

<div class="container">
	<div class="row">
	 	<?php 
		foreach ($images as $image) {
			echo "<figure class='col-md-4'>";
			echo "<a href='images/".$image['name']."'>";
				echo "<img src='images/".$image['name']. "' class='img-fluid' >";
			echo "</figure>";
		}
		?>
	</div>
</div>
</body>
</html>
	
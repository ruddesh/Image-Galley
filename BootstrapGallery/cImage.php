<?php require_once 'init.php';

	class Image extends Conn
	// Conn class contains the connection to the database in a method named "connect()".
	{
		public function getImages()
		{
			$sql = 'SELECT * FROM gallery';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			$image = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $image;
		}		

		public function uploadImage(){
			if (isset($_POST['upload'])) {
				// if no file is selected 
				if ($_FILES['image']['size'] == 0) {
					echo '<script>alert("No file Selected.")</script>';
				}
				else{
					// concatenating random numbers before image name so there are no dublicates.
					$rname = rand(1000,10000)."-".$_FILES['image']['name'];
					$tmpname = $_FILES['image']['tmp_name'];
					$upload_dir = 'images';

					$sql = "INSERT INTO gallery(name) VALUES('$rname')";
					$stmt = $this->connect()->prepare($sql);
					$stmt->execute();
					if (move_uploaded_file($tmpname, $upload_dir.'/'.$rname)) {
						echo '<script>alert("Uploaded Successfully.")</script>';
					}
					else{
						echo '<script>alert("Upload Failed.")</script>';
					}
				}
			}	
		}
	}	
?>


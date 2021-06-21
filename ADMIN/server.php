<?php
  // Create database connection
  require('../assets/dbconn.php');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload']) & isset($_POST['title'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$content = mysqli_real_escape_string($db, $_POST['content']);
    $title = $_POST["title"];
	$author = $_POST["author"];
	$category = $_POST["categoryname"];


  	// image file directory
  	$target = "../Assets/images/".basename($image);

  	$sql = "INSERT INTO posts (image, content, category, title, author) VALUES ('$image', '$content', '$category',
	  '$title', '$author')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	  $res = mysqli_query($db, $sql);

	 


	  if ($res){
		$_SESSION['sent'] = "post added successfuly";
	   header ("location:index.php");
		
	}
	else {
		echo "Post Not Successfull!!";
	}




  }
  $result = mysqli_query($db, "SELECT * FROM images");
  
 






?>
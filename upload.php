<?php
require 'connection.php';
if (isset($_POST['btn_upload']))
  {
    $filetmp   = $_FILES["file_img"]["tmp_name"];
    $filename  = $_FILES["file_img"]["name"];
    $filetype  = $_FILES["file_img"]["type"];
    $filepath  = "img/" . $filename;
    $filetitle = $_POST['img_title'];
    
    move_uploaded_file($filetmp, $filepath);
    
    $stmt = $con->prepare("INSERT INTO upload_image (img_name, img_type, img_path, img_title) VALUES (:iname,:itype,:ipath,:ititle) ");
    $stmt->bindValue(':iname', $filename);
    $stmt->bindValue(':itype', $filetype);
    $stmt->bindValue(':ipath', $filepath);
    $stmt->bindValue(':ititle', $filetitle);
    if ($stmt->execute())
      {
        header('Location: profile.php?success=yes&title=' . $filetitle);
      }
    else
      {
        header('Location: profile.php?success=no');
      }
  }
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Photo</title>
</head>
<body>
	<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" data-abide>
	<div class="photo-field">
	<input type="file" name="file_img" pattern="^.+?\.(jpg|JPG|png|PNG)$" required>
	<small class="error">Upload JPG or PNG only.</small>
	</div>
	<div class="title-field">
	<input type="text" name="img_title" placeholder="Image title" required>
	<small class="error">Image title is required.</small>
	</div>
	<input type="submit" value="Upload Image" name="btn_upload" class="button">
	</form>
</body>
<a class="close-reveal-modal">&#215;</a>
</html>

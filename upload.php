<?php
if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check !== false) {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo
 
"Sorry, only JPG, JPEG, & PNG files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<img src=\"" . $target_file . "\" alt=\"Uploaded Image\">";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "An error occurred while uploading your file.";
}
?>

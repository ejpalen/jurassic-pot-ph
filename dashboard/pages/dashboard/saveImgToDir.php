<?php
    if (isset($_FILES["file"])) {
        $targetDir = __DIR__ . "/../../../media/products/";

        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "File already exists.";
            $uploadOk = 0;
        }

        // Check the file size
        if ($_FILES["file"]["size"] > 500000) {
            echo "File is too large.";
            $uploadOk = 0;
        }

        // Allow only specific file formats (you can modify this as per your requirements)
        if (
            $imageFileType !== "jpg" &&
            $imageFileType !== "jpeg" &&
            $imageFileType !== "png"
        ) {
            echo "Only JPG, JPEG, and PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "File upload failed.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo $targetFile."File uploaded successfully.";
            } else {
            echo "File upload failed.";
            }
        }
    } else {
        echo "No file received.";
    }
?>

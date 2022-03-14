<?php

$directory = "uploads/";
$file = $directory . basename($_FILES['file']['name']);
$fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));




$isImage = getimagesize($_FILES['file']['tmp_name']);


if ($isImage) {
    $size = $_FILES['file']['size'];

    if ($size < 500000) {
        if ($fileType == 'jpg' || $fileType == 'png') {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
                echo "Successfull upload";
            } else {
                echo "Unsuccessfull upload";
            }
        } else {
            echo "Only jpg or png files are admited";
        }
    } else {
        echo "The file size has to be less than 500kb";
    }
} else {
    echo "The document is't an image";
}

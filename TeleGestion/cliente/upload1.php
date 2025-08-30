<?php

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "application/pdf")) {


        if (move_uploaded_file($_FILES["file"]["tmp_name"], "docu/".$_POST['nomarchi1'] ) ) {
           
            echo "docu/".$_POST['nomarchi1'];
        } else {
            echo 0;
        }

    } else {
        echo 0;
    }
} else {
    echo 0;
}

?>
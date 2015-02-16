<?php
	include 'mysql.php';
    if ($_FILES["import"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["import"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES["import"]["name"] . "<br />";
        echo "Type: " . $_FILES["import"]["type"] . "<br />";
        echo "Size: " . ($_FILES["import"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["import"]["tmp_name"] . "<br />";

        if (file_exists("upload/" . $_FILES["import"]["name"]))
        {
            echo $_FILES["import"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["import"]["tmp_name"],
            "upload/" . $_FILES["import"]["name"]);
            echo "Stored in: " . "upload/" . $_FILES["import"]["name"];
        }
    }
	redirect('index.php');
?>


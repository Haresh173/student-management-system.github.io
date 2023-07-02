<?php

include 'config.php';

$sql = "SELECT * FROM fileupload";

$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


if(isset($_POST['save']))
{
    $filename = $_FILES['file']['name'];

    $destination = 'uploads/' . $filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['file']['tmp_name'];

    $size = $_FILES['file']['size'];

    if(!in_array($extension,['zip', 'pdf', 'png']))
    {
        echo "Your file extension must be .zip, .pdf or .png";
    }
    elseif($_FILES['file']['size'] > 1000000)
    {
        echo "Your file is too large to upload";
    }

    else {
        if(move_uploaded_file($file, $destination))
        {
            $sql = "INSERT INTO fileupload (name, size, downloads) VALUES ('$filename', '$size', 0)";

            if(mysqli_query($conn, $sql))
            {
                echo "File uploaded successfully";
            }
            else{
                echo "Failed to upload file";
            }
        }
    }
}


if(isset($_GET['file_id']))
{
    $id = $_GET['file_id'];

    $sql = "SELECT * FROM fileupload WHERE id ='$id' ";

    $result = mysqli_query($conn,$sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];

    if(file_exists($filepath))
    {
        header('Content-Type: application/octet-stream');

        header('Content-Description: File Transfer');

        header('Content-Disposition: attachment;filename=' . basename($filepath));

        header('Expires: 0');

        header('Cache-Control: must-revalidate');
        header('Pragma:public');

        header('Content-Length:' . filesize('uploads/'.$file['name']));

        readfile('uploads/' . $file['name']);

        $sqlU = "UPDATE fileupload SET downloads = downloads + 1 WHERE id = '$id'";
        mysqli_query($conn,$sqlU);

        exit;


    }
}

?>
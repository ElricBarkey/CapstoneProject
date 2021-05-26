
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- My css -->
    <link href="../css/stylesForm.css" rel="stylesheet">
    <link href="../css/FileUpload.css" rel="stylesheet">
</head>
<body>
<?php
include("../includes/header.php");
?>
<form action="" method="post" enctype="multipart/form-data" id="form" class="text-center">
    <h2 class="text-center">Upload File</h2>

    <label for id="first">Please put your name in for easier identification</label>
    <br><input type="text" id="first" name="first" placeholder="First Name">
    <input type="text" name="last" placeholder="Last Name">
    <div class="field_wrapper">
        <input type="file" name="photo[]" id="fileSelect" multiple="multiple">
    </div>
    <a href="javascript:void(0);" class="add_button" title="Add field">
        <button type="button" class="add-more btn btn-success">Add another</button>
    </a>
    <button type="submit" name="submit" id="submit" class="btn btn-success" onclick="myFunction()">Upload</button>
    <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .PNG formats allowed to a max size of 5 MB. <br>
        You can select as many files as you need</p>
</form>

<?php
include("../includes/footer.php");
?>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/navFunctions.js"></script>
<script>
    function myFunction() {
        document.body.style.cursor = "progress";
    }

    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="file" name="photo[]"/><a href="javascript:void(0);" class="remove_button"></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

</script>

</body>
</html>
<?php

// Create a new task This system works
use Ilovepdf\Ilovepdf;

require_once('../../vendor/autoload.php');

//test Zone for multiFiles
function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_key as $val) {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

//end test Zone


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $files = $_FILES['photo'];
    $filesArr = reArrayFiles($files);
    foreach ($filesArr as $position => $imagefile) {
        if (isset($imagefile)&& $_FILES["photo"]["name"][$position]!=null) {
            //var_dump($imagefile);
            // Check if file was uploaded without errors
            if ($_FILES["photo"]["error"][$position] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "PNG" => "image/png", "png" => "image/png");
                $filename = $_FILES["photo"]["name"][$position];
                $filetype = $_FILES["photo"]["type"][$position];
                $filesize = $_FILES["photo"]["size"][$position];
                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                // Verify MYME type of the file
                if (in_array($filetype, $allowed)) {
                    // Check whether file exists before uploading it
                    if (file_exists("../TempFileHolder/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        move_uploaded_file($_FILES["photo"]["tmp_name"][$position], "../TempFileHolder/" . $filename);
                        echo "Your file was uploaded successfully.";
                        rename("../TempFileHolder/" . $filename, "../TempFileHolder/" . $_POST['first'] . "." . $_POST['last'] . "." . $filename);
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
            } else {
                echo "Error: " . $_FILES["photo"]["error"];
            }

            $ilovepdf = new Ilovepdf('PROJECT_KEY', 'SECRET_KEY');
            $myTaskConvertJPG = $ilovepdf->newTask('imagepdf');
            //Pull file name in
            $filename = $_FILES["photo"]["name"][$position];
            $filename = $_POST['first'] . "." . $_POST['last'] . "." . $filename;
            // Add files to task for upload
            $file1 = $myTaskConvertJPG->addFile('../TempFileHolder/' . $filename);
            // Execute the task
            $myTaskConvertJPG->execute();
            // Download the package files
            $myTaskConvertJPG->download("../TempFileHolder/");

            $string = ($pos = strpos($filename, ". "));
            $filename2 = substr($filename, 0, -4);
            $filename2 = $filename2 . ".pdf";


            $path2 = '/home/tschloss/public_html/lawGroupGit/PDF-Conversion-NEW/FormUpdated/Form/TempFileHolder/' . $filename2;
            $path = "/upload/" . $filename2;
            $fp = fopen($path2, 'rb');
            $size = filesize($path2);

            $cheaders = array('Authorization: Bearer FD-8ajXFJ48AAAAAAAAAAQPt1c1IIlRC8l91NC3xmTF1hY7M653BI0f8HJrnUs35',
                'Content-Type: application/octet-stream',
                'Dropbox-API-Arg: {"path":"' . $path . '", "mode":"add"}');

            $ch = curl_init('https://content.dropboxapi.com/2/files/upload');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
            curl_setopt($ch, CURLOPT_PUT, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_INFILE, $fp);
            curl_setopt($ch, CURLOPT_INFILESIZE, $size);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);


            curl_close($ch);
            fclose($fp);


            //simple delete script for the pdf on server
            $file_pointer = "../TempFileHolder/" . $filename2;
            $file_pointer2 = "../TempFileHolder/" . $filename;
            echo $filename . "<br>";
            // Use unlink() function to delete a file
            if (!unlink($file_pointer)) {
                echo("$file_pointer cannot be deleted due to an error");
            } else {
                echo("$file_pointer has been deleted");
            }
            if (!unlink($file_pointer2)) {
                echo("$file_pointer2 cannot be deleted due to an error");
            } else {
                echo("$file_pointer2 has been deleted");
            }

        }
    }
    $to="tschlosser@mail.greenriver.edu";
    $subject="File Uploaded from portal";
    $message= $_POST['first'] ." ". $_POST['last'] ." Has uploaded files to your dropbox.";


    $complete = mail($to,$subject,$message);
    echo "<br> ".$complete;
    //echo '<meta http-equiv="refresh" content="0;URL=Thankyou.php" />';

}




?>

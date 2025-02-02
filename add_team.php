<?php

// Get the product data
$league_id = filter_input(INPUT_POST, 'league_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$foundingDate = filter_input(INPUT_POST, 'foundingDate');
$value = filter_input(INPUT_POST, 'value', FILTER_VALIDATE_FLOAT);
$colour = filter_input(INPUT_POST, 'colour');

// Validate inputs
if ($league_id == null || $league_id == false ||
    $name == null || $value == null || $value == false || $colour == false ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {

    /**************************** Image upload ****************************/

    error_reporting(~E_NOTICE); 

// avoid notice

    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    echo $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if (empty($imgFile)) {
        $image = "";
    } else {
        $upload_dir = 'image_uploads/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        // rename uploading image
        $image = rand(1000, 1000000) . "." . $imgExt;
        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
            if ($imgSize < 5000000) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $image)) {
                    echo "";
                } else {
                    $error =  "Sorry, there was an error uploading your file.";
                    include('error.php');
                    exit();
                }
            } else {
                $error = "Sorry, your file is too large.";
                include('error.php');
                exit();
            }
        } else {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            include('error.php');
            exit();
        }
    }

    /************************** End Image upload **************************/
    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO teams
                 (leagueID, name, foundingDate, value, colour, image)
              VALUES
                 (:league_id, :name, :foundingDate, :value, :colour, :image)";
    $statement = $db->prepare($query);
    $statement->bindValue(':league_id', $league_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':foundingDate', $foundingDate);
    $statement->bindValue(':value', $value);
    $statement->bindValue(':colour', $colour);
    $statement->bindValue(':image', $image);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
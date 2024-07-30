<?php

session_start();
require_once("../Common/dbconfig.php");
require_once("../Models/movieModel.php");
require_once("../Movie.php");

if (!isMissingArgs()) {
    $id = $_POST["id"];
    $isActive = $_POST["activate"];
    if (activateMovie($id, $isActive, $db)) {
        header("location:../../FE/pages/activateMovie.php");
        exit(); 
    } else {
        header("location:../../FE/pages/activateMovie.php?errorCode=1&errorDesc=Database error!");
        exit();
    }
}
if (isset($_POST['action']) && $_POST['action'] == "ADD_MOVIE") {
    if (!empty($_POST['tfname']) && !empty($_POST['tfdescription']) && isset($_FILES['tfimage'])) {
        $name = $_POST['tfname'];
        $description = $_POST['tfdescription'];
        $isActive = isset($_POST['tfisActive']) ? $_POST['tfisActive'] : 1;

        // File upload path
        $targetDir = "../../FE/assets/images/";
        $image = basename($_FILES["tfimage"]["name"]);
        $targetFile = $targetDir . $image;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["tfimage"]["tmp_name"], $targetFile)) {
                $movie = new stdClass();
                $movie->name = $name;
                $movie->description = $description;
                $movie->isActive = $isActive;
                $movie->image = $image;

                if (AddMovie($movie, $db)) {
                    header("location:../../FE/pages/addMovie.php?success=1");
                } else {
                    header("location:../../FE/pages/addMovie.php?error=1");
                }
            } else {
                header("location:../../FE/pages/addMovie.php?error=2");
            }
        } else {
            header("location:../../FE/pages/addMovie.php?error=3");
        }
    } else {
        header("location:../../FE/pages/addMovie.php?error=4");
    }
} else {
    header("location:../../index.php?errorCode=2&errorDesc=Server Error!");
}

$movies = GetMovies();
require_once("../../FE/pages/movies.php");
function isMissingArgs()
{
    return !isset($_POST["id"]) || !isset($_POST["activate"]);
}

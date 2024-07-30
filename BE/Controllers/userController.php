<?php 
session_start();
require_once("../Common/dbconfig.php");
require_once("../Models/userModel.php");
require_once("../User.php");
function isMissingArgsLogin(){
    return !isset($_POST["tfun"]) || !isset($_POST["tfpass"]);
}

function isMissingArgsSignUp($isNotEmpty=false){
    return !isset($_POST["tfun"]) || ($_POST["tfun"]=="" && $isNotEmpty) ||
           !isset($_POST["tfpass"]) || ($_POST["tfpass"]=="" && $isNotEmpty) ||
           !isset($_POST["tffn"]) || ($_POST["tffn"]=="" && $isNotEmpty) ||
           !isset($_POST["tfln"]) || ($_POST["tfln"]=="" && $isNotEmpty);
}

if (isset($_POST["action"])){
    switch ($_POST["action"]){
        case "LOGIN":
            if (!isMissingArgsLogin()){
                $un=$_POST["tfun"];
                $pass=$_POST["tfpass"];
                if ($name=Login($un, $pass, $db)){
                    $_SESSION["name"]=$name;
                    header("location:../../FE/pages/activateMovie.php");
                }else{
                    header("location:../../index.php?errorCode=1&errorDesc=Wrong Username or Password!");
                }    
            }else{
                header("location:../../index.php?errorCode=2&errorDesc=Missing Args!");
            }
        break;
        case "SIGNUP":
            if (!isMissingArgsSignUp(true)){
                $user=new User();
                $user->username=$_POST["tfun"];
                $user->firstname=$_POST["tffn"];
                $user->lastname=$_POST["tfln"];
                $user->password=$_POST["tfpass"];
                $user->email=$_POST["tfemail"];
                $user->sex=$_POST["sex"];
            
                if (Signup($user, $db)){
                    $_SESSION["name"]=$user->firstname." ".$user->lastname;
                    header("location:../../FE/pages/activateMovie.php");
                }else{
                    header("location:../../Fe/pages/signup.php?errorCode=3&errorDesc=Username already exists!");
                }    
            }else{
                header("location:../../Fe/pages/signup.php?errorCode=2&errorDesc=Missing Args!");
            }
        break;
    }
 }else{
    header("location:../../index.php?errorCode=2&errorDesc=Server Error!");
 }
?>

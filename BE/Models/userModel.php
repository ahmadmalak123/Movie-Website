<?php

/**
 * adds a user to array users
 * @param $user is a dictionary with user attributes
 * returns bool
 */
/*
This method inserts the admin info into the table
*/
function Signup($user, $db)
{
    $hashed_password = password_hash($user->password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `tbl_users` (`USERNAME`,`EMAIL`,`FN`,`LN`,`PASSWORD`,`SEX`) 
              VALUES (:username, :email, :firstname, :lastname, :password, :sex)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $user->username);
    $stmt->bindParam(':email', $user->email);
    $stmt->bindParam(':firstname', $user->firstname);
    $stmt->bindParam(':lastname', $user->lastname);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':sex', $user->sex);
    
    if ($stmt->execute())
        return true;
    else
        return false;
}


/*
This method is for checking the credentials
*/

function Login($un, $pass, $db)
{
    $query = "SELECT ID,FN,LN,PASSWORD FROM tbl_users WHERE USERNAME=:un";
    $stmt = $db->prepare($query);
    $stmt->execute(['un' => $un]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        if (password_verify($pass, $row['PASSWORD'])) {
            $name = $row["FN"] . " " . $row["LN"];
            return $name;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


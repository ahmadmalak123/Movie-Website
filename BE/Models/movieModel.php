<?php

/**
 * adds a movie to the database
 * @param $movie is a dictionary with movie attributes
 * @param $db is the database connection
 * @return bool
 */
function AddMovie($movie, $db)
{
    // Insert query
    $query = "INSERT INTO `tbl_movies` (`MOVIE`,`DESCRIPTION`,`IS_ACTIVE`,`IMAGE`) VALUES ('$movie->name','$movie->description',$movie->isActive,'$movie->image')";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0)
        return true;
    else
        return false;
}

/**
 * Activates or deactivates a movie
 * @param $id is the ID of the movie
 * @param $isActive is a boolean indicating whether the movie should be activated or deactivated
 * @param $db is the database connection
 * @return bool
 */
function ActivateMovie($id, $isActive, $db)
{
    // Update query
    $query = "UPDATE tbl_movies SET IS_ACTIVE=$isActive WHERE ID=$id";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
function GetMovies(){
    global $db;
    $Movies=array();
    $query="SELECT ID, MOVIE, DESCRIPTION, IS_ACTIVE, IMAGE FROM tbl_movies WHERE IS_ACTIVE=1";
    $stmt=$db->query($query);
    if ($stmt->rowCount()>0){
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $Movie=new Movie();
            $Movie->id=$row['ID'];
            $Movie->movie=$row['MOVIE'];
            $Movie->description=$row['DESCRIPTION'];
            $Movie->isActive=$row['IS_ACTIVE'];
            $Movie->img = $row['IMAGE'];
            $Movies[]=$Movie;
        }
        return $Movies;
    }else{
        return 0;
    }
}
function GetMoviesAdmin(){
    global $db;
    $Movies=array();
    $query="SELECT ID, MOVIE, DESCRIPTION, IS_ACTIVE FROM tbl_movies";
    $stmt=$db->query($query);
    if ($stmt->rowCount()>0){
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $Movie=new stdClass();
            $Movie->id=$row['ID'];
            $Movie->movie=$row['MOVIE'];
            $Movie->description=$row['DESCRIPTION'];
            $Movie->isActive=$row['IS_ACTIVE'];
            $Movies[]=$Movie;
        }
        return $Movies;
    }else{
        return 0;
    }
}

<?php 

session_start();

if( array_key_exists('movies', $_POST)){
    
    include('connection.php');

    // $query = "UPDATE `users` SET `movies` = '".mysqli_real_escape_string($link, $_POST['movies'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id']).";
    $query = 'INSERT INTO `movies6` (`id`, `movie`) VALUES ( "'.mysqli_real_escape_string($link, $_SESSION['id']).'", "'.mysqli_real_escape_string($link, $_POST['movies']).'")';
    
    if(mysqli_query($link, $query)) {
        echo "success";
    }

}

?>
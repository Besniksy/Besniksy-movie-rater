<?php
$SERVERNAME = "localhost";
  $USERNAME = "root";
  $PASSWORD = "";
  $DB = "movie-rater";

  $error = "";

  $link = mysqli_connect($PASSWORD, $USERNAME, $PASSWORD, $DB);

  //check connection 
  if(!$link){
      die("connection failed: " . mysqli_connect_error());
  }

  // echo 'connected'

  ?>
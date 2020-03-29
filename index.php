<?php include("header.php");

include("connection.php");
?>


<?php

  session_start();
  
  $error = "";
  $success = "";

  if(array_key_exists("logout", $_GET)) {

    // unset($_SESSION);
    setcookie("id", "", time() - 60*60);
    $_COOKIE["id"] = "";
    session_destroy();
    header("Location: index.php");
    

  }else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) AND (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
    header("Location: loggedIn.php");
  }

  if (array_key_exists("submit", $_POST)) {


    if (!$_POST["email"]) {
      $error = "An email adress is required!<br>";
    }

    if (!$_POST["password"]) {
      $error .= "A password is required!<br>";
    }

    // if ($error != "") {
    //   $error= "<p>There were error(s) in yout form</p>".$error;
    // } 
    
    else {

      if ($_POST['signUp'] == '1') {

        $query = 'SELECT id FROM `users` WHERE email = "' . mysqli_real_escape_string($link, $_POST["email"]) . '" LIMIT 1' ;
      
        $result = mysqli_query($link, $query);
  
        if (mysqli_num_rows($result) > 0) {
          $error = "That email address is taken.";
  
        } else {
          $query = 'INSERT INTO `users` (`email`, `password`) VALUES ("'.mysqli_real_escape_string($link, $_POST['email']).'", "'.mysqli_real_escape_string($link, $_POST['password']).'")' ;
          
          
          if (!mysqli_query($link, $query)) {
            $error = "<p>Could not sign you up - please try again later.</p>";
  
          } else {
  
            $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1" ; 
  
            mysqli_query($link, $query);
  
            $_SESSION['id'] = mysqli_insert_id($link);
  
            if ($_POST['stayLoggedIn'] == '1') {
  
              setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);
            }
            
            $success = "You have signed up! Log in now.";
          }
        }

        
      }else {
        
        $query ="SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        if(isset($row)){

          $hashedPassword = md5(md5($row['id']).$_POST['password']);

          if($hashedPassword == $row['password']){
            $_SESSION['id'] = $row['id'];

            if($_POST['stayLoggedIn'] == '1') {

              setcookie("id", $row['id'], time() + 60*60*24*365);

            } 

            header("Location: loggedIn.php");


            } else {
            $error = "That email/password combination could not be found";
          }
        }else {
          $error = "That email/password combination could not be found";
        }
      }


    }
  }
  
  

?>



<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #020200; margin-bottom: 60px;">
    <a class="navbar-brand">Movie Tracker</a>
    <ul class="navbar-nav mr-auto" style="visibility:hidden">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rated.php">Rated Movies</a>
          </li>
        </ul>

<form class="form-inline" method = "post">
  <div class="form-group mx-sm-3 mb-2">
  <input type="email" name = "email" class="form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
  </div>
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" name = "password" class="form-control-sm" id="inputPassword2" placeholder="Password">
    <input type="hidden" name="signUp" value = "0">
    <input type="hidden" name="stayLoggedIn" value='1'>
  </div>
  <button type="submit" name="submit" class="btn btn-primary mb-2">Log in!</button>
</form>

</nav>
    <div class="container">
      <div style="width:100%; text-align: center" id="error"><?php if ($error != ""){
        echo '<div  class="alert alert-danger" role="alert">'.$error.'</div>';
        } else if ($success != ""){
          echo '<div  class="alert alert-success" role="alert">'.$success.'</div>';
        }
        ?>
      </div>

        <!-- <div class="movieContainer"></div> -->
        <div class="jumbotron" style = "margin-top: 60px;">
          <h1 class="display-4">Hello, movie freak!</h1>
          <p class="lead">Sign up to create your movie database.</p>
          <hr class="my-4">
          
          <form method = "post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name = "email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <input type="hidden" name="signUp" value = "1">
              </div>
              <div class="form-group form-check">
              <input type="hidden" name="stayLoggedIn" value='1'>
              </div>
              <!-- <a class="btn btn-primary btn-lg" type="submit" name="submit" value="Sign Up!" role="button">Sign Up</a> -->
              <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Sign Up!">
            </form>
          </div>
    </div>

    <?php include("footer.php"); ?>
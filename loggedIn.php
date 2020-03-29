<?php include('header.php'); ?>

<?php 

session_start();

if(array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
}

if(array_key_exists("id", $_SESSION) && $_SESSION['id']) {
    // echo "<a href='index.php?logout=1'>Log out</a></p>";

    include("connection.php");
} else {
    header("Location: index.php");
}


?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #020200;">
  <a class="navbar-brand">Movie Tracker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rated.php">Rated Movies</a>
          </li>
          <form  class="form-inline" style="visibility:hidden">
            <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>          <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>          <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>          <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>          <li class="nav-item">
              <button type="button" class="btn btn-outline-danger">Danger</button>
            </li>
            <li>as</li>
          </form>            
          
          <li class="nav-item">
            <a href='index.php?logout=1'><button type="button" class="btn btn-outline-danger">Log out</button></a>
          </li>

          
            
        </ul>

      </div>
    </nav>
    <div class="container">
        <div class="movieContainer"></div>
        <div class="jumbotron" style = "background-image: url(jumbo.jpg)">
            
          <h1 class="display-4" >Welcome to movie rater </h1>
          <p class="lead" style="font-size:30px;">Rate your favourite movies</p>
          <form class="form-inline">
            <input class="form-control mr-sm-2" id="movieInput" type="search"  placeholder="Search movie" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" id="submit" type="submit">Search</button>
          
          </form>
          <hr class="my-4">
          


     <!-- jQuery first, then Popper.js, then Bootstrap JS  -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->
    <script src="testing.js"></script>

    
  </body>
</html>

<?php include('header.php'); 

session_start();

if(array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
}




?>



    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #020200;">
      <a class="navbar-brand" href="index.php">Movie Tracker</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="rated.html">Rated Movies </a>
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
        <!-- <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search movie" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
    <div class="container">
      <div class="ratedMoviesContainer"><?php if(array_key_exists("id", $_SESSION) && $_SESSION['id']) {
    // echo "<a href='index.php?logout=1'>Log out</a></p>";

    include("connection.php");

    $query = "SELECT * FROM `movies6` WHERE `id` =".mysqli_real_escape_string($link, $_SESSION['id']);

    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result)) {
      echo "{$row['movie']}";
    }

    

    $movies = $row['movie'];
} else {
    header("Location: index.php");
}?></div>
    </div>
    


      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->
    <!-- <script src="testing.js"></script> -->
    <script>
      
      let ratedContainer = document.querySelector(".ratedMoviesContainer")
      // let storagedItem = localStorage.getItem("clickedMovie")
      // let storagedItem = sessionStorage.getItem("storagedArray")
      // let withoutComma = storagedItem.replace(/,/g, "")
      // ratedContainer.innerHTML = withoutComma
      // console.log(withoutComma)



      </script>
</body>
</html>
let input = document.querySelector(".form-control")
let submit = document.querySelector(".btn")
let jumbotron = document.querySelector(".jumbotron")
let home = document.querySelector(".navbar-brand")
let starContainer;






let movieContainer = document.querySelector(".movieContainer")

let movies = []


async function getApi(){
    let inputValue = input.value
    try {
        const result = await fetch(`http://www.omdbapi.com/?s=${inputValue}&apikey=7eea19a4`);
        const data = await result.json()
        let searchedMovie = data.Search
        if(searchedMovie !== undefined) {
            movieContainer.innerHTML = ""
            searchedMovie.forEach(item => {
                movies.push(item)
            })
            
            showResultsOnScreen()
            movies = []
        }
        
        
    }
    catch(error){
        alert(error)
    };
    console.log(movies)

}

function rateMovieClicked() {
  countClicks++;
}

var countClicks = 0;
console.log(countClicks)




function showResultsOnScreen() {

  if (movies.length !== 0) {
    movies.forEach(item => {



      let createdElement = document.createElement('div')
      createdElement.innerHTML =

        `
            <div class="card" style="width: 18rem;">
            <img src="${item.Poster}" class="card-img-top" alt="${item.Title}">
            <div class="card-body">
              <h5 class="card-title">${item.Title.length > 17 ? item.Title.slice(0, 16) + "..." : item.Title} <span id="movieYear">(${item.Year})</span></h5>
              <a href="https://www.imdb.com/title/${item.imdbID}/" class="btn btn-primary">IMDb</a>
              <span class="rateMovie" onclick = "rateMovieClicked();" >Rate movie</span>
            </div>
            </div>
            `
      createdElement.classList.add('movieName')
      movieContainer.appendChild(createdElement)
    })
    
    // let cardBody = document.querySelectorAll('.card-body')
    let spanBody;
    let createdSpan;
    
    let rateMovie = document.querySelectorAll(".rateMovie")
    for (i = 0; i < rateMovie.length; i++) {
      
      rateMovie[i].addEventListener('click', function () {
        if( countClicks === 0){

          for (i = 0; i < spanBody.length; i++){
            starContainer = document.querySelector('.starContainer')
            if(spanBody[i].hasChildNodes()){
              spanBody.forEach(item => {item.innerHTML = ""})
              
              rateMovie.forEach(item => {item.classList.remove('hide')})


              this.parentNode.appendChild(createdSpan)
              // countClicks = 1

              console.log(countClicks)


            }

          }

          
        }
        else if ( countClicks === 1){

          this.classList.add('hide')
          createdSpan = document.createElement('span')
          createdSpan.classList.add('spani')
          createdSpan.innerHTML = stars
          this.parentNode.appendChild(createdSpan)
          spanBody = document.querySelectorAll('.spani')

          countClicks = -1

          console.log(countClicks)
          


        }


        


        // let createdSpan = document.createElement('span')
        // createdSpan.innerHTML = stars
        // this.parentNode.appendChild(createdSpan)
        
        // starContainer.addEventListener('click', function(){
        //   console.log(number)
        // })
      })
    }
  }

    
    // let movieTitle = movies.Title

    // console.log(movieTitle)


    // let createdElement = document.createElement('div')
    // createdElement.innerHTML =

    //     `
    //         <div class="card" style="width: 18rem;">
    //         <img src="${movies.Poster}" class="card-img-top" alt="${movies.Title}">
    //         <div class="card-body">
    //           <h5 class="card-title">${movies.Title.length > 17 ? movies.Title.slice(0, 16) + "..." : movies.Title} <span id="movieYear">(${item.Year})</span></h5>
    //           <a href="https://www.imdb.com/title/${movies.imdbID}/" class="btn btn-primary">IMDb</a>
    //           <span class="rateMovie">Rate movie</span>
    //         </div>
    //         </div>
    //         `
    // createdElement.classList.add('movieName')
    // movieContainer.appendChild(createdElement)

    // rateMovie.addEventListener('click', function () {
    //     console.log('clicked')
    // })

}






home.addEventListener("click", function(){

    movieContainer.innerHTML = ""
    jumbotron.classList.remove('hide')
    
})

let stars =                 `    <span class="starContainer">

<span  onmouseover="starmark(this)" onclick="starmark(this)" id="1 one" style="font-size:10px;cursor:pointer;"  class="fa fa-star checked" ></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="2 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="3 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="4 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="5 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star"></span>
<span  onmouseover="starmark(this)" onclick="starmark(this)" id="6 one" style="font-size:10px;cursor:pointer;"  class="fa fa-star" ></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="7 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="8 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="9 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="10 one"  style="font-size:10px;cursor:pointer;" class="fa fa-star"></span>

</span>`

submit.addEventListener("click", function(event){
    event.preventDefault();
    getApi()
    jumbotron.classList.add('hide')

})



var count;
var number;

function starmark(item) {
  count = item.id
  var splitId = count.split(' ')
  number = splitId[0]
  var numberOne = splitId[1]
  // console.log(number)
  // console.log(numberOne)

  sessionStorage.starRating = count;
  // var subid = item.id.substring(1);
  // console.log(subid)
  for (var i = 0; i < 10; i++) {
    if (i < number) {
      document.getElementById((i + 1) + " " + numberOne).style.color = "orange";
    }
    else {
      document.getElementById((i + 1) + " " + numberOne).style.color = "black";
    }


  }


}



// function result() {
//   //Rating : Count
//   //Review : Comment(id)
//   alert("Rating : " + count + "\nReview : " + document.getElementById("comment").value);
// }


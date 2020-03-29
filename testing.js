let input = document.getElementById('movieInput')
// let input = $(".form-control")
let submit = document.getElementById('submit')
let jumbotron = document.querySelector(".jumbotron")
let home = document.querySelector(".navbar-brand")
let starContainer;
let movieContainer = document.querySelector(".movieContainer")  


// let button = document.createElement('button')
// button.innerHTML = "click"

// movieContainer.appendChild(button)

// button.addEventListener('click', function(){
//     let paragrafi = document.createElement('p')
//     paragrafi.innerHTML = "diqka"
//     paragrafi.classList.add('diqka')
    
//     $.get("rated.html", function (data) {
//         $(".diqka").append(data);
//     });
// })






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
    // console.log(movies)

}

function rateMovieClicked() {
  countClicks++;
}

var countClicks = 0;
// console.log(countClicks)


let createdNumber;

let ratedMovies = []
let ratedMovies2 = []

let createdElement;

let filmi;

let movieImdb



function showResultsOnScreen() {

    if (movies.length !== 0) {
        movies.forEach(item => {



            createdElement = document.createElement('div')
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

            movieImdb = item.imdbID

            // console.log(movieImdb)

            createdElement.classList.add('movieName')
            movieContainer.appendChild(createdElement)
        })


        let spanBody;
        let createdSpan;
        




        let rateMovie = document.querySelectorAll(".rateMovie")
        for (i = 0; i < rateMovie.length; i++) {

            rateMovie[i].addEventListener('click', function () {

                if (countClicks === 1) {
                    spanBody = document.querySelectorAll('.spani')
                    for (i = 0; i < spanBody.length; i++) {
                        starContainer = document.querySelector('.starContainer')
                        if (spanBody[i].hasChildNodes()) {
                            spanBody.forEach(item => { item.innerHTML = "" })
                        }
                    }
                    createdSpan = document.createElement('span')
                    createdSpan.classList.add('spani')
                    createdSpan.innerHTML = stars
                    this.parentNode.appendChild(createdSpan)
                    rateMovie.forEach(item => { item.classList.remove('hide') })
                    this.classList.toggle('hide')
                    countClicks = 0

                    createdNumber = document.querySelector('.rateNumber')
                    createdSpan.addEventListener('click', function(){
                        // createdNumber = document.createElement('p')
                        
                        createdNumber.classList.add('redNumber')
                        // createdNumber.classList.remove('hide')
                        createdNumber.innerHTML = number + "/10"
                        // this.parentNode.appendChild(createdNumber)

                        let emriFilmit = this.parentNode.parentNode.parentNode.innerHTML
                        // console.log(emriFilmit)

                        ratedMovies.push(emriFilmit)

                        // let moviesHTML = ratedMovies.innerHTML

                        console.log(ratedMovies)

                        filmi = document.createElement('div')

                        filmi.innerHTML = emriFilmit

                        // movieContainer.appendChild(filmi)

                        // sessionStorage.setItem('clickedMovie', ratedMovies)

                        // let storagedArray = sessionStorage.getItem("clickedMovie")

                        // ratedMovies2.push(storagedArray)

                        // sessionStorage.setItem('storagedArray', ratedMovies2)

                        // let storagedItem = sessionStorage.getItem("storagedArray")

                        

                        $.ajax({
                            method: "POST",
                            url: "updatedatabase.php",
                            data: { movies: emriFilmit }
                          })
  

                        
                        
                        
                    })
                }
            })
        }
    }

}





// function movieSelected(id) {
//     sessionStorage.setItem('ratedMovie', id)
//     // window.location = 'rated.html';
//     return false;
// }
async function getMovie() {
    let movieGet = sessionStorage.getItem('ratedMovie');
    // console.log(movieGet)

    try {

        const movieResult = await fetch(`http://www.omdbapi.com/?i=${movieGet}&apikey=7eea19a4`)
        const movieData = await movieResult.json()

        // console.log(movieData)

    }
    catch(error){
        alert(error)
    };
    
}







home.addEventListener("click", function(){

    movieContainer.innerHTML = ""
    jumbotron.classList.remove('hide')
    
})

let stars =                 `    <span class="starContainer"  >

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

</span>
<span class='rateNumber'></span> `

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
  createdNumber.innerHTML = number + "/10"
  createdNumber.classList.remove('redNumber')
//   console.log(number)
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


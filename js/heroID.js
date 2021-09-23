/**
 * Practice: Pass values between functions
 *
 * - Create two functions
 * - Main function creates article element with data from object
 * - Helper function creates.
 */

const spidey = {
    full_name : "Spider-man",
    real_name : "peter parker",
    age : 21,
    movies : ["Raimi", "Web" , "mcu"],
    powers : "wallstick",
    universe : {
        comics :"marvel",
        cinema : "sonymcu",
        alien: false,
    },
}

console.log(spidey["age"]);

/* fonction standarde presentation*/
function Introduce(hero) {
    var expression = "i am " + hero.real_name + " cast in " + hero.movies[0] + " movie";
   //changer le contenu de la balise
    document.querySelector('.heroTitle').innerHTML = hero.full_name;
   // 
   const civilID = document.getElementById("realName");
   civilID.innerHTML += hero.real_name;
    //rajoute une balise
    for (i =0 ; i<hero.movies.length; i++)
    {
        var liste = document.createElement('li');
        movie=document.createTextNode(hero.movies[i]);
        objetmovie = liste.appendChild(movie);
        document.querySelector('ol').appendChild(objetmovie);
    } 
    console.log(expression);
    console.log(hero.movies.length);
}
Introduce(spidey);

/* fonction anonyme dans une variable */

const newPower = function(add_power){
    return add_power * 2;
} 
console.log(newPower(5));


/*fonction à flèche */

(a) => {
    spidey.age * a ;
}

/*principaux medias du heros*/
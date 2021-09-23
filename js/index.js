const whole_grid = document.querySelector(".top_powers");
//ne semble pas fonctionner avec ByClassName
//console.log(whole_grid);
whole_grid.addEventListener("mouseenter",
function() {
    whole_grid.style.border = "1px dotted orange";
    console.log('salut');
});
whole_grid.addEventListener("mouseleave",
 e =>{
    whole_grid.style.border = "none";
 });

 //effets sur chaque grille
 const each_cell = document.querySelectorAll(".cell");
 each_cell.forEach((cell) => {
    cell.addEventListener("click", 
    (ce) =>{
        coloriate(cell, ce.screenX,ce.screenY,getRandomInt(255));
        console.log(ce.screenX);
        
    });
});

/*--cursor hover---*/
each_cell.forEach((cell) => {
    cell.addEventListener('mouseenter',
    (evenement)=> {
        cell.style.outline = "2px solid red";
    });
});

each_cell.forEach((cell) => {
    cell.addEventListener('mouseleave',
    (evenement)=> {
        cell.style.outline = "";
    });
});

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }
function coloriate(elem,posX, posY , callback)
{
    elem.style.backgroundColor = "rgb("+ callback+"," + (posX%254) + "," + (posY%254) +")";
}
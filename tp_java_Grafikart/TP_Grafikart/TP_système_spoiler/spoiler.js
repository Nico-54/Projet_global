// TP : Système de spoiler

/**var button = document.querySelector(".spoiler button");
button.addEventListener('click', function()
{
    button.nextElementSibling.classList.add("visible");
    button.parentNode.removeChild(button);
})**/


var elements = document.querySelectorAll('.spoiler');

var createSpoilerButton = function (element) 
{
    //création du span.spoiler-content
    var span = document.createElement('span');
    span.className = "spoiler-content";
    span.innerHTML = element.innerHTML;

    //création du bouton
    var button = document.createElement("button");
    button.textContent = 'Afficher le spoiler';
    
    //Ajout des éléments au DOM
    element.innerHTML = ' ';
    element.appendChild(button);
    element.appendChild(span);

    //Placement de l'écouteur au click
    button.addEventListener('click', function()
    {
        button.parentNode.removeChild(button)
        span.classList.add('visible');
    })
}

for (var i = 0; i <elements.length; i++) 
{
    createSpoilerButton(elements[i]);
}
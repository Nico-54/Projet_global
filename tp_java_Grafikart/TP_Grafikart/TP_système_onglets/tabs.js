// TP : Système d'onglets

/**
LORSQUE  l'on clique sur un onglet 
    ON RETIRE la classe active de l'onglet actif
    J'AJOUTE la classe active à l'onglet actuel

    ON RETIRE la classe active sur le contenue actif 
    ON AJOUTE la classe active sur le contenue cliqué
 */


(function ()
{
 var afficherOnglet = function (a)
 {
    var li = a.parentNode;
    var div = a.parentNode.parentNode.parentNode;


    if (li.classList.contains('active'))
    {
        return false 
    }

    //on retire la classe active sur l'onglet actif 
    div.querySelector('.tabs .active').classList.remove('active');

    //Ajout de la classe active à l'onglet actuel
    li.classList.add('active');

    //ON RETIRE la classe active sur le contenue actif 
    div.querySelector('.tab-content.active').classList.remove('active');

    //ON AJOUTE la classe active sur le contenue cliqué
    div.querySelector(a.getAttribute('href')).classList.add('active');

}
var tabs = document.querySelectorAll('.tabs a');
for (var i = 0; i< tabs.length; i++)
{
    tabs[i].addEventListener('click', function (e)
    {
        afficherOnglet(this);
})
}

/**
 Je Récupère le hash
 Ajouter la classe active sur le lien href = "hash"
 Retirer la classe active des autres onglets
 Afficher/Masquer les contenus
*/

var h = window.location.hash
var a = dowument.querySelector('a[href="'+ hash +'"]')
if (a != null && !a.classList.contains('active')) 
{
    afficherOnglet(a);
}
})()


//variable qui cible le composant HTML ou afficher le message d'erreur
const zone = document.querySelector('#zone');
//fonction qui affiche le message d'erreur
function setMessage(msg){
    zone.innerHTML = msg;
}
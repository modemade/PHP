//Afficher la liste des catégories
//url api (route)
const url = '/evalmvc/getApi?allArticle';
const url2 = '/evalmvc/getApi';

//zone pour afficher le contenu de l'api
let zone = document.querySelector('#zone');

//fonction récupération et affichage du json dans la page
async function showArtApi(){
    const data =  await fetch(url);
    const json =  await data.json();
    const data2 =  await fetch(url2);
    const json2 =  await data2.json();
    //test si le Json n'est pas vide
    if(json != ""){
        //version foreach
        json.forEach(obj =>{
        zone.innerHTML += "<p>id : " + obj.id_article + ", Name : " + obj.nom_article + ", Prix : " + obj.prix_article +"</p>"; 
    });
    //version for
    /* for(let i in json){
        zone.innerHTML += "<p>id : " + json[i].id_article + ", Name : " + json[i].nom_article + ", Prix : " + json[i].prix_article + "</p>"; 
    } */
    }
    //test si le Json est vide
    else{
        //affichage du Json d'erreur dans zone
        zone.innerHTML += "<p>erreur : " + json2.error + "</p>"; 
    }
}
showArtApi();
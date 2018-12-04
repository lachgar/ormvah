function create() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ville = document.getElementById('ville').value;
    var h = document.getElementById('h').value;
    var f = document.getElementById('f').value;
    var sexe = '';
    if (h != 'undefined')
        sexe = h;
    else
        sexe = f;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var liste = JSON.parse(xmlhttp.responseText);
            var contenu = document.getElementById("contenu");
            contenu.innerHTML = "";
            var ligne = "";
            for(i = 0; i < liste.length; i++){
                ligne+='<tr><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td>'+liste[i].prenom+'</td><td>'+liste[i].ville+'</td><td>'+liste[i].sexe+'</td><td><button onclick="supprimer('+liste[i].id+')">Supprimer</button></td><td></td></tr>';
            }
            contenu.innerHTML = ligne;
        }
    }

    xmlhttp.open('GET', 'controller/addEtudiant.php?nom='+nom+"&prenom="+prenom+"&ville="+ville+"&sexe="+sexe, true);
    xmlhttp.send();


}


function supprimer(id){
    
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var liste = JSON.parse(xmlhttp.responseText);
            var contenu = document.getElementById("contenu");
            contenu.innerHTML = "";
            var ligne = "";
            for(i = 0; i < liste.length; i++){
                ligne+='<tr><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td>'+liste[i].prenom+'</td><td>'+liste[i].ville+'</td><td>'+liste[i].sexe+'</td><td><button onclick="supprimer('+liste[i].id+')">Supprimer</button></td><td></td></tr>';
            }
            contenu.innerHTML = ligne;
        }
    }

    xmlhttp.open('GET', 'controller/deleteEtudiant.php?id='+id, true);
    xmlhttp.send();
    
}
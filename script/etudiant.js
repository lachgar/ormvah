var id = 0;
function create() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ville = document.getElementById('ville').value;
    var h = document.getElementById('h');
    var f = document.getElementById('f');
    
    var sexe = '';
    if (h.checked)
        sexe = h.value;
    else
        sexe = f.value;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            
            var liste = JSON.parse(xmlhttp.responseText);
            var contenu = document.getElementById("contenu");
            contenu.innerHTML = "";
            var ligne = "";
            for (i = 0; i < liste.length; i++) {
                ligne += '<tr><td>' + liste[i].id + '</td><td>' + liste[i].nom + '</td><td>' + liste[i].prenom + '</td><td>' + liste[i].ville + '</td><td>' + liste[i].sexe + '</td><td><button onclick="supprimer(' + liste[i].id + ')">Supprimer</button></td><td></td></tr>';
            }
            contenu.innerHTML = ligne;
        }
    }
    xmlhttp.open('GET', 'controller/addEtudiant.php?nom=' + nom + "&prenom=" + prenom + "&ville=" + ville + "&sexe=" + sexe+"&op="+$("#valider").attr('op')+"&id="+$('#update').attr('v'), true);
    xmlhttp.send();
}


function supprimer(id) {

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
            for (i = 0; i < liste.length; i++) {
                ligne += '<tr><td>' + liste[i].id + '</td><td>' + liste[i].nom + '</td><td>' + liste[i].prenom + '</td><td>' + liste[i].ville + '</td><td>' + liste[i].sexe + '</td><td><button onclick="supprimer(' + liste[i].id + ')">Supprimer</button></td><td></td></tr>';
            }
            contenu.innerHTML = ligne;
        }
    }
    xmlhttp.open('GET', 'controller/deleteEtudiant.php?id=' + id, true);
    xmlhttp.send();

}

var f = function () {
    var u = document.getElementById("update");
    u.addEventListener('click', update);
}

window.addEventListener('load', f);


var update = function () {
    var uu = document.getElementById("update");
    id = uu.getAttribute('v');
    // document.getElementById("valider").innerHTML = "Modifier";
    $('#valider').html('Modifier');
    $('#valider').attr('op', 'update');
    
    //document.getElementById("valider").setAttribute('op', 'update');
    
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var e = JSON.parse(xmlhttp.responseText);
            $('#nom').val(e.nom);
            $('#prenom').val(e.prenom);
            $('#ville').val(e.ville);
        }
    }
    xmlhttp.open('GET', 'controller/updateEtudiant.php?id=' + uu.getAttribute('v'), true);
    xmlhttp.send();
    
}
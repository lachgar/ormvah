$(document).ready(function () {

    $("#loadNom").keypress(function () {
        var nom = $("#loadNom").val();
        $.ajax({
            url: 'controller/loadEtudiant.php',
            data: {nom: nom},
            cache: false,
            type: 'GET',
            success: function (data, textStatus, jqXHR) {
                var contenu = $("#contenu");
                contenu.html("");
                var ligne = "";
                for (i = 0; i < data.length; i++) {
                        ligne += '<tr><td>' + data[i].id + '</td><td>' + data[i].nom + '</td><td>' + data[i].prenom + '</td><td>' + data[i].ville + '</td><td>' + data[i].sexe + '</td><td><button onclick="supprimer(' + data[i].id + ')">Supprimer</button></td><td></td></tr>';          
                }
                contenu.html(ligne);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }

        });
    });

});

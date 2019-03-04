$(function () {
    $('#mail').blur(function () {
        //Mon appel AJAX
        //$.post prend en paramètre la page PHP qui va effectuer le traitement, la variable que l'on communique au PHP, et la fonction de traitement avec la réponse de PHP.
        $.post('../controllers/registerCtrl.php', {mailTest: $(this).val()}, function (data) {
            //dans data se trouve ce que le PHP a envoyé via son echo
            if (data == 0) {
                //Le .html permet d'écrire du contenu HTML dans un élément. Ici dans la div qui a la classe mailMessage
                $('.mailMessage').html('<p class="text-success">L\'adresse mail est disponible</p>');
            } else {
                $('.mailMessage').html('<p class="text-danger">L\'adresse mail est déjà utilisée</p>');
            }
        });
    });
})

//Script navbar burger menu
$(document).ready(function () {

    $('.first-button').on('click', function () {

        $('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {

        $('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {

        $('.animated-icon3').toggleClass('open');
    });
});

//rend les tableaux responsifs
document.querySelectorAll('.table-responsive').forEach(function (table) {
    let labels = Array.from(table.querySelectorAll('th')).map(function (th) {
        return th.innerText
    })
    table.querySelectorAll('td').forEach(function (td, i) {
        td.setAttribute('data-label', labels[i % labels.length])
    })
})

//appel bouton vers haut de page
jQuery(function () {
    $(function () {
        $(window).scroll(function () { //Fonction appelée quand on descend la page
            if ($(this).scrollTop() > 200) {  // Quand on est à 200pixels du haut de page,
                $('#scrollUp').css('right', '10px'); // Replace à 10pixels de la droite l'image
            } else {
                $('#scrollUp').removeAttr('style'); // Enlève les attributs CSS affectés par javascript
            }
        });
    });
});
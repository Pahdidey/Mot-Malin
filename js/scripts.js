$(document).ready(function() {


	// Modale

	$(".open-modal").click(function(e){
		e.preventDefault();
	  	dataModal = $(this).attr("data-modal");
	  	$("#" + dataModal).css({"display":"block"});
	});

	$(".modal .close, .modal .overlay").click(function(){
	  	$(".modal").css({"display":"none"});
	});




	// Recharge auto des participants

    function rechargeautoparticipants(){
        setTimeout( function(){
            var idPart = "";
            $("#participants li").each(function() {
                idPart += "-" + $(this).attr('id');
            });
            //idPart = idPart.substring(0, str.length() - 1);
            idPart = idPart.substring(1);
            $.ajax({
                url : "index.php",
                data: "page=refresh-participants&id="+ idPart,
                type : 'GET',
                success : afficherechargeparticipants
            });
            rechargeautoparticipants();
        }, 5000);
    }

    function afficherechargeparticipants(reponse) { 
        console.log(reponse);
        if ((reponse.indexOf("En cours") != -1)) {
            console.log("1");
            $("#joueur #partie #infos").load("#joueur #partie #infos div");
        } else {
            console.log("2");
            $('#participants').append(reponse);
        }
    }

    rechargeautoparticipants();







	// Recharge auto du début de la partie

    function rechargeautodebutpartie(){
        setTimeout( function(){
            $.ajax({
                url : "index.php?page=refresh-debutpartie",
                type : 'GET',
                success : affichrechargedebutpartie
            });
            rechargeautodebutpartie();
        }, 5000);
    }

    x = 1;

    function affichrechargedebutpartie(reponse) { 
        if ((reponse.indexOf("En cours") != -1) && (x != 0)) {
            x = 0;
            $("#joueur").load("#joueur #partie");
        }
    }

    rechargeautodebutpartie();










	// Recharge auto de la fin de la partie

    function rechargeautofinpartie(){
        setTimeout( function(){
            $.ajax({
                url : "index.php?page=refresh-finpartie",
                type : 'GET',
                success : affichrechargefinpartie
            });
            rechargeautofinpartie();
        }, 2000);
    }


    function affichrechargefinpartie(reponse) { 
        //console.log(reponse);
        if (reponse.indexOf("fin") != -1) {
            window.location.href = "index.php?page=fin-partie";
        }
    }

    rechargeautofinpartie();

  

});




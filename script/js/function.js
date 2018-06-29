function upvote(tabla,id_user,id){
	if(document.getElementById('votar').innerHTML=="Votar"){
		document.getElementById('votar').innerHTML="Quitar voto";
		borrar=0;
	}else{
		document.getElementById('votar').innerHTML="Votar";
		borrar=1;
	}
	if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("puntos").innerHTML = this.responseText;
        }
    };
	xmlhttp.open("GET","/script/php/juegovotar.php?user="+id_user+"&tabla="+tabla+"&id="+id+"&borrar="+borrar);
	xmlhttp.send();
}

function lista(user,campo){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lista").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","/script/php/perfiljuegos.php?user="+user+"&campo="+campo);
    xmlhttp.send();
}
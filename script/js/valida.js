function muestraErrorSpan(idSpan,textoError,mostrar){
	var spanAct=document.getElementById(idSpan)
	if(spanAct!=null){
		if(mostrar){
			spanAct.innerHTML=textoError;
			spanAct.className="error visible"
		}else{
			spanAct.innerHTML=textoError;
			spanAct.className="error oculto"
		}
	}
}
function muestraErrorInputText(idInput,mostrar){
	var inputAct=document.getElementById(idInput);
	if(inputAct!=null){
		if(mostrar){
			inputAct.className="error";
		}else{
			inputAct.className="correcto";
		}
	}
}
function vacio(nom){
	if(nom.length===0){
		return true;
	}else{
		return false;
	}
}
function mayor(nom,tam){
	if(nom.length<tam){
		return true;
	}else{
		return false;
	}
}
function caracteres(nom){
	reg=new RegExp(/(\W|\d)/);
	return reg.test(nom);
}
function mail(mail){
	reg=new RegExp(/@/);
	return reg.test(mail);
}
function passw(pass){
	reg=new RegExp(/[A-Z]/);
	reg2=new RegExp(/[a-z]/);
	reg3=new RegExp(/\d/);
	return reg.test(pass)*reg2.test(pass)*reg3.test(pass);
}
function maximo(text,max){
	if(text.length>max){
		return true
	}else{
		return false
	}
}
function validaNombre(){
	var correcto=false;
	var user=document.getElementById("user");
	if(user!=null){
		var nombre=user.value;
		if(vacio(nombre)){
			muestraErrorSpan("errorNombre","Nombre obligatorio",true);
			muestraErrorInputText("user",true);
			correcto=false;
		}else if(caracteres(nombre)){
			muestraErrorSpan("errorNombre","Solo letras sin espacios",true);
			muestraErrorInputText("user",true);
			correcto=false;
		}else{
			muestraErrorSpan("errorNombre","",false);
			muestraErrorInputText("user",false);
			correcto=true;
		}
	}
	return correcto;
}
function validaEmail(){
	var correcto=false;
	var email=document.getElementById("email");
	if(email!=null){
		var nombre=email.value;
		if(vacio(nombre)){
			muestraErrorSpan("errorEmail","Email obligatorio",true);
			muestraErrorInputText("email",true);
			correcto=false;
		}else if(!mail(nombre)){
			muestraErrorSpan("errorEmail","Email incorrecto",true);
			muestraErrorInputText("email",true);
			correcto=false;
		}else{
			muestraErrorSpan("errorEmail","",false);
			muestraErrorInputText("email",false);
			correcto=true;
		}
	}
	return correcto;
}
function validaPass(){
	var correcto=false;
	var pass=document.getElementById("pass");
	if(pass!=null){
		var nombre=pass.value;
		if(vacio(nombre)){
			muestraErrorSpan("errorPass","Contraseña obligatoria",true);
			muestraErrorInputText("pass",true);
			correcto=false;
		}else if(!passw(nombre)){
			muestraErrorSpan("errorPass","Contraseña incorrecta",true);
			muestraErrorInputText("pass",true);
			muestraErrorSpan("errorPassc","Contraseña incorrecta",true);
			muestraErrorInputText("passc",true);
			correcto=false;
		}else{
			muestraErrorSpan("errorPass","",false);
			muestraErrorInputText("pass",false);
			correcto=true;
		}
	}
return correcto;
}
function validaPassc(){
	var correcto=false;
	var pass=document.getElementById("pass");
	var passc=document.getElementById("passc");
	if(passc!=null){
		var pass=pass.value;
		var check=passc.value;
		if(vacio(check)){
			muestraErrorSpan("errorPassc","Comprobación obligatoria",true);
			muestraErrorInputText("passc",true);
			correcto=false;
		}else if(pass!=check){
			muestraErrorSpan("errorPassc","No coinciden",true);
			muestraErrorInputText("passc",true);
			correcto=false;
		}else{
			muestraErrorSpan("errorPassc","",false);
			muestraErrorInputText("passc",false);
			correcto=true;
		}
	}
	return correcto;
}
function validaText(){
	var correcto=false;
	var max=148;
	var text=document.getElementById('estado');
	var texto=text.value
	if(text!=null){
		if(texto.length>max){
			muestraErrorSpan("errorText","Demasiado largo",true);
			muestraErrorInputText("text",true);
			correcto=false;
		}else{
			muestraErrorSpan("errorText","",false);
			muestraErrorInputText("text",false);
			correcto=true;
		}
	}
	document.getElementById('caracteres').innerHTML=texto.length+1;
	return correcto;
}
function enviarR(){
	if(!(validaNombre()&&validaEmail()&&validaPass&&validaPassc())){
		return false;
	}else{
		return true;
	}
}
function enviarL(){
	if(!(validaNombre()&&validaPass())){
		return false;
	}else{
		return true;
	}
}
function post(){
	var posts=document.getElementById('posts');
	var content=document.getElementById('estado');
	var user=document.getElementById('user');
	var post=document.createElement('div');
	post.className="post";
	var php='<?php $con=mysqli_connect("localhost","root",","twotter");mysqli_set_charset($con, utf8);$add=mysqli_query($con,\"INSERT INTO "estados"("user", "content") VALUES ("'+user.innerHTML+'","'+content.value+'");"); ?>';
	post.innerHTML=content.value+php;
	if(content.value.length<=148 && content.value.length!=0)
		setTimeout(function(){posts.appendChild(post);},3000)
}
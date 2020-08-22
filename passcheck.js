window.addEventListener("load", start, false);

function start(){
document.getElementById('password2').addEventListener('input',verEgalitate,false);
document.getElementById('password').addEventListener('input',verEgalitate,false);
}

function verEgalitate() {
	if(document.getElementById("password").value == document.getElementById("password2").value) {
	document.getElementById("chkForm1").style.backgroundColor = "green";
	document.getElementById("message").innerHTML = 'Matching';
	}
else {
	document.getElementById("chkForm1").style.backgroundColor = "red";
	document.getElementById("message").innerHTML = 'Not Matching';
}
}
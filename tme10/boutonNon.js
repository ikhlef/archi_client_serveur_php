function init(){
	divnon=document.getElementById("mobile");
	topdivnon=divnon.style.top;
	leftdivnon=divnon.style.left;
}

window.onload=function(){
	init();
};


function bravo(chaine){
	alert("Merci de votre réponse : "+ chaine);
}

function bouger(){
	var width=window.innerWidth;
	var height=window.innerHeight;
	console.log(width, height);
	var left=Math.max(0,Math.floor(Math.random()*width)-80);
	var top=Math.max(0,Math.floor(Math.random()*height)-20);
	divnon.setAttribute("style", "width:auto; height:auto; position:absolute; z-index: 1; top:"+top+"px; left:"+left+"px;");
	console.log(left, top);
}

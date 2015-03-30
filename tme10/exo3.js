var tabimages=["rouge.jpg","vert.jpg","jaune.jpg","bleu.jpg"];
var current=0;
function changeImage(){
	current=(current+1)%4;
	var node=document.getElementById("pic");
	node.setAttribute("src", tabimages[current]);
	timer=window.setTimeout("changeImage()", 300);
}

verifNombreEntier = function(val){
	return /^\d+$/.test(val);
}

table=document.createElement("table");

inject_table = function(){
	document.body.appendChild(table);
}

construction = function(debut, fin, pas){
	var begin = Number(debut);
	var end = Number(fin);
	var step = Number(pas);
	var root = document.createElement("tr");
	while(begin < end){
		var td=document.createElement("td");
		td.appendChild(document.createTextNode(begin));
		td.setAttribute("style","border:1px solid black");
		root.appendChild(td);
		begin+=step;
	}
	return root;
}

build_table = function (){
	var debut_node=document.getElementById("debut");
	var fin_node=document.getElementById("fin");
	var pas_node=document.getElementById("pas");

	nodes=construction(debut_node.value, fin_node.value, pas_node.value)
	if(table.hasChildNodes()){
		table.replaceChild(nodes,table.firstChild);
	}else{
		table.appendChild(nodes);
	}
}	
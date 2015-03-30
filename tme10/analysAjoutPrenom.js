var DEBUG=0;

function extraireListe1(){
	tabprenoms=[];
	var ul=document.getElementById("liste1");
	strprenoms=ul.outerHTML;
	var hd=ul.firstChild;
	while(hd!==null){
		tabprenoms.push(hd.firstChild);
		hd=hd.nextSibling;
	}
	if(DEBUG) console.log(tabprenoms);
}

function construireListe1(){
	if(tabprenoms && tabprenoms.length>0){
		var ul=document.createElement("ul");
		ul.setAttribute("style", "color:green");
		ul.setAttribute("id", "liste1");

		for (var i = 0; i < tabprenoms.length; i++) {
			var li=document.createElement("li");
			li.appendChild(document.createTextNode(tabprenoms[i].data));
			ul.appendChild(li);
		}
		document.body.appendChild(ul);
	}
}

function ajouterListe1(){
	var data=document.getElementById("nouvPrenom").value;
	var ul=document.getElementById("liste1");
	if(data!==null&&data.length>0){
		var li=document.createElement("li");
		li.appendChild(document.createTextNode(data));
		ul.appendChild(li);
	}
}

function lambdaRecursive(nodes, mem){
	if(nodes.length===0){
		return mem;
	}
	var hd=nodes[0];
	var ar_nodes = [].slice.call(nodes, 1);
	if(hd.nodeName=="LI"){
		mem.push(hd.firstChild.data);
		return lambdaRecursive(ar_nodes, mem);
	}
	if(hd.nodeName=="OL"||hd.nodeName=="UL"){
		var ol_childs=hd.childNodes;
		for (var i = ol_childs.length - 1; i >= 0; i--) {
			ar_nodes.unshift(ol_childs[i]);
		}
		return lambdaRecursive(ar_nodes, mem);
	}
}

function extraireListe2(){
	var ol=document.getElementById("liste2");
	nodes=ol.childNodes;
	var res=lambdaRecursive(nodes, []);
	if (DEBUG) console.log(res);
	var ul=document.createElement("ul");

	for (var i = 0; i < res.length; i++) {
		var li=document.createElement("li");
		li.appendChild(document.createTextNode(res[i]));
		ul.appendChild(li);
	}
	document.body.appendChild(ul);
}

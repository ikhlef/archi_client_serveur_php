init = function (){
	nbadeviner=Math.floor(Math.random()*10+1);
	// timeout of 10 sec
	d= setTimeout("timeout_game()", 10000);
	cleared=false;
}

/* courtesy of jQuery */
isNumeric = function( obj ) {
	return !isNaN( parseFloat(obj) ) && isFinite( obj );
}

controle = function (input){
	var saisie=input.value;

	if(cleared){
		alert('too late');
		return;
	}
	if(!isNumeric(saisie)){
		alert('farceur');
		return;
	}
	if(Number(saisie)==nbadeviner){
		alert('gagné');
		clearTimeout(d);
		cleared=true;
		return;
	}
	if(Number(saisie) < nbadeviner){
		alert('c+');
	}else{
		alert('c-');
	}
}

timeout_game = function(){
	cleared=true;
	if(window.confirm('loser, try again?')){
		init();
	}

}
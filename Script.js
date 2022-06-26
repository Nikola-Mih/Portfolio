var brojac = 1;
function prvafunkcija(){
	
	brojac = brojac + 1;
	drugafunkcija(brojac);		

	

}
function drugafunkcija(x){

	if(x % 2 == 0){
		document.body.style.backgroundColor = "#27251F";	
	}
	else{
		document.body.style.backgroundColor = "#FFFFFF";
	}

}

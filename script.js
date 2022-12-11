var flechesDroites = document.getElementsByClassName("flecheDroite");
var flechesGauches = document.getElementsByClassName("flecheGauche");
var nbPage = 1;
var nbTotalPage = document.getElementsByClassName("flecheGauche").length;


for (let i = 0; i < flechesDroites.length; i++) {
	flechesDroites[i].addEventListener ("click", function (){
	    if(nbPage<nbTotalPage) {
	        nbPage++;
	        afficherTexte = document.getElementsByClassName("livreVedette" + nbPage);
	        afficherTexte[0].style.display = "flex";
	        afficherTexte = document.getElementsByClassName("livreVedette" + (nbPage - 1));
	        afficherTexte[0].style.display = "none";
	    }
	});
}
for (let i = 0; i < flechesGauches.length; i++) {
	flechesGauches[i].addEventListener ("click", function (){
	    if(nbPage>1) {
	        nbPage--;
	        afficherTexte = document.getElementsByClassName("livreVedette" + nbPage);
	        afficherTexte[0].style.display = "flex";
	        afficherTexte = document.getElementsByClassName("livreVedette" + (nbPage + 1));
	        afficherTexte[0].style.display = "none";
	    }
});
}



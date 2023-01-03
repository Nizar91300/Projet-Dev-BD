package controleur;

import vue.VueApplication;

public class ControleurApplication {
	//ATTRIBUTS
	VueApplication vueApp;
	
	ControleurApplication(){
		this.vueApp = new VueApplication(this);
		vueApp.setVisible(true);
	}
	
	public void affichePageEmprunt() {
		vueApp.affichePage("emprunt");
	}
	
	
	public static void main(String[] args) {
		new ControleurApplication();
	}
}

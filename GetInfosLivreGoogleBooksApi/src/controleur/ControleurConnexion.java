package controleur;

import modele.Utilisateur;
import vue.VueConnexion;

public class ControleurConnexion {
	//ATTRIBUTS
	// La vue qui afficher lors de la saisie de l'id et du psw
	private VueConnexion vueConnexion;
	
	/**
	 * Constructeur
	 */
	ControleurConnexion(){
		vueConnexion = new VueConnexion(this);
		vueConnexion.setVisible(true);
	}
	
	/**
	 * Permet de se connecter selon les informations en paramètres
	 * @param identifiant l'identifiant de connexion
	 * @param password le mot de passe de connexion
	 */
	public void demandeConnexion(String identifiant, String password) {
		vueConnexion.resetMsgErreur();													// On enleve l'ancien message d'erreur s'il y en avait
		if(identifiant.equals("")|| password.equals("")) {								// Si un des champs est nuls
			vueConnexion.afficherErreur("Identifiant ou mot de passe non renseigné.");
			return;
		}
		String[] statuts =  Utilisateur.getStatutByUtiIdPsw(identifiant, password);		// On récupére tt les statuts de l'utilisateur
		if(statuts == null || statuts[0] == null) {										// null  ou status[0] == null sgnifie que l'user n'est pas présent dans la BD
			vueConnexion.afficherErreur("Identifiant ou mot de passe incorrect.");
			return;
		}
		
		if(statuts[0].equals("-1")) {													// -1 sgnifie une impossibilité de connexion à la BD
			vueConnexion.afficherErreur("Connexion impossible à la base de données.");
			return;
		}
		
		boolean access = false;															// L'acces est a faux par defaut							
		for(int i = 0; i < statuts.length; i++) {
			System.out.println(statuts[i]);
			if(statuts[i].equals("bibliothecaire")) {									// Si un des statuts de l'user est bibliothecaire
				access = true; break;													// il a l'acces à l'application
			}
		}
		if(!access) {																	// L'user est présent dans la BD mais n'est pas un bibliothécaire
			vueConnexion.afficherErreur("Privilèges insuffisants.");
			return;
		}
		// Si on arrive jusqu'ici c'est que l'utilisateur a bien accés à l'appli
		vueConnexion.dispose();
		new ControleurApplication();
	}
	
	
	// Quitte l'application
	public void quitter() {
		vueConnexion.dispose();
		System.exit(0);
	}
	
	public static void main(String[] args) {
		new ControleurConnexion();
	}
}

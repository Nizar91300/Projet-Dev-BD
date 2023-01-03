package modele;

import java.sql.Connection;
import java.sql.ResultSet;

import config.OutilsJDBC;

public class Utilisateur {
	String login;
	String nom;
	String prenom;
	String email;
	String password;
	boolean empruntAutorise;
	int nbEmpruntActuel;
	
	/**
	 * Permet de récupérer les statuts d'un utilisateur
	 * @param id 
	 * @param psw
	 * @return Retourne {-1} si impossibilité de connexion a la BD
	 * Retourne null si l'id ou le mdp est faux
	 * Retourne un tableau de string avec les statuts de l'user si les identifiants sont correctes 
	 */
	public static String[] getStatutByUtiIdPsw(String id, String psw) {
		Connection co = OutilsJDBC.openConnection();							// Connexion a la base
		if(co == null) {
			String[] r = {"-1"};
			return r;															// on returne -1 pour signifié une connexion impossible a la BD
		}
		// Recuperer le status de l'utilisateur
		String reqPrep = "SELECT libelleStatut FROM Utilisateur NATURAL JOIN UtiStatut NATURAL JOIN Statut WHERE loginUti = ? AND pwdUti = ?";
		Object[] args = {id, psw};
		String[] types = {"String", "String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);	// Execution de la requete prepare
		String[] r = new String[10];											// Un user ne peut pas avoir plus de 10 statuts en général
		int i = 0;
		try {
			// On parcours chaque resultat
			while(res.next()) {													
				r[i] = res.getString(1);
				i++;	
			}
			return r;															// On retourne les statuts
		} catch (Exception e) {
			System.out.println(e);
			return null;														// Signifie que l'user n'a pas de statuts et donc n'est pas présent dans la BD
		}finally {
			OutilsJDBC.closeConnection(co);										// On ferme la connexion
		}
	}
}

package config;
import java.sql.*;
public class OutilsJDBC {
	private static String url = "jdbc:oracle:thin:nabdou1/20011001@oracle.iut-orsay.fr:1521:etudom";
	//private static String url = "jdbc:mysql://projets.iut-orsay.fr:6022/sae-s3-nabdou1";
	
	/**
	 * Se connecter à la base
	 * @return null si la onnexion a la BD est impossible
	 * Un objet Connection si la conenxion est établie
	 */
	public static Connection openConnection () {
		Connection co=null;
		try {
			Class.forName("oracle.jdbc.driver.OracleDriver");
			co = DriverManager.getConnection(url);
		}
		catch (ClassNotFoundException e){
			System.out.println("il manque le driver oracle");
		}
		catch (SQLException e) {
			System.out.println(e + " impossible de se connecter à l'url : "+url);
		}
		return co;
	}
	
	/**
	 * Executer une requete
	 * @param requete Requete à éxécuté
	 * @param co Connection qui represente la connexion a la BD
	 * @param type Si le resultat est naviguable ou non
	 * @return null si il y a un probleme lors de l'execution de la requete
	 * Retourne un ResultSet si la requete s'est bien éxécuté
	 */
	public static ResultSet exec1Requete (String requete, Connection co, int type){
		ResultSet res=null;
		try {
			Statement st;
			if (type==0){
				st=co.createStatement();}
			else {
				st=co.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
						ResultSet.CONCUR_READ_ONLY);
			};
			res= st.executeQuery(requete);
			System.out.println("Requete " + requete + " executée :");
		}
		catch (SQLException e){
			System.out.println("Problème lors de l'exécution de la requete : "+requete);
		};
		return res;
	}
	
	/**
	 * Exécute une requete préparé
	 * @param preparedReq La requete préparé
	 * @param args Les arguments de la requte préparé
	 * @param types Les types de chaque arguments de la requete préparé
	 * @param co Représente la connexion pour pouvoir éxécuté une requete
	 * @return null si il y a un probleme lors de l'execution de la requete ou si la reequete n'atted pas de reponse
	 * Retourne un ResultSet si la requete s'est bien éxécuté et qu'elle renvoie un résultat
	 */
	public static ResultSet execPreparedReq(String preparedReq,Object[] args, String[] types, Connection co) {
		PreparedStatement psm = consPS(preparedReq, co);			// Préparation de la requete
		if(psm!=null) {
			try {
				// On parcours chaque parametre
				for(int i = 0; i < args.length; i++) {
					// Selon le type de données renseigné on fait appel a la bonne fonction
					switch(types[i]){
				       case "String": 
				    	   psm.setString(i+1, (String)args[i]);
				           break;
				       case "int":
				    	   psm.setInt(i+1, (int)args[i]);
				           break;
				       case "byte":
				    	   psm.setByte(i+1, (byte)args[i]);
				           break;
				       case "boolean":
				    	   psm.setBoolean(i+1, (boolean)args[i]);
				           break;
				       case "short":
				    	   psm.setShort(i+1, (short)args[i]);
				           break;    
				       case "float":
				    	   psm.setDouble(i+1, (double)args[i]);
				           break;
				       case "Timestamp":
				    	   psm.setTimestamp(i+1, (Timestamp)args[i]);
				           break;
				       case "Date":
				    	   psm.setDate(i+1, (Date)args[i]);
				           break;
				   }
				}
				// On récupére quelle est l'action a exécuté pour appeler la méthode correspondante
				String action = preparedReq.substring(0, preparedReq.indexOf(" ")).toUpperCase();
				if(action.equals("SELECT"))
					return psm.executeQuery();					// On exécute la requete préparé en retourne le résultat
				if(action.equals("UPDATE") || action.equals("INSERT") || action.equals("DELETE")) {
					psm.executeUpdate();						// On execute la requete concernant une modification de la base, on retourne null
					return null;
				}
				psm.execute();									// On execute la requete qui ne retourne pas de réponse, on retourne null
				return null;
				
			}
			catch(SQLException e) {
				System.out.println(e + " probleme pour traiter le resultat d'une requete.");
			}
		}
		return null;		// En cas d'erreur
	}
	
	/**
	 * Prepare la requete donné en parametre et retourne un PreapredStatement
	 * @param req Requete a préparé
	 * @param co Représente la connexion pour pouvoir éxécuter la requete
	 * @return null si erreur
	 * Retourne PreparedStatement si la requete a bien ete prepare
	 */
	private static PreparedStatement consPS(String req, Connection co) {
		PreparedStatement res=null;
		try {
			res=co.prepareStatement(req);
		}catch(SQLException e) {
			System.out.println(e+" Probleme construisant le prepared statement avec la requete "+req);
		}
		return res;
	}
	
	/**
	 * Fermer la connexion
	 * @param co Représente la connexion pour pouvoir éxécuter la requete
	 */
	public static void closeConnection(Connection co){
		try {
			co.close();
			co=null; System.gc();
			System.out.println("Connexion fermée!");
		}
		catch (SQLException e) {
			System.out.println("Impossible de fermer la connexion");
		}
	}
}

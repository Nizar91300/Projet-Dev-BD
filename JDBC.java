package testJDBC;
import java.sql.*;

public class OutilsJDBC {
	static String url ;
	public static Connection openConnection() throws SQLException
	{
		Connection co = null;
		try
		{
			Class.forName("Oracle.jdbc.driver.OracleDriver");
			co = DriverManager.getConnection(url);		
		}
		catch(ClassNotFoundException e)
		{
			System.out.println("il manque le driver oracle");
		}
		catch(SQLException e)
		{
			System.out.println("impossible de se connecter à l'url " + url);
		}
		return co;
	}
	
	public static void closeConnection(Connection co)
	{
		try
		{
			co.close();
			co =null;
			System.gc();
			System.out.println("La connexion est bien fermée");
		}
		catch(SQLException e)
		{
			System.out.println("Imposible de fermée la connexion");
		}
	}
	
	private static PreparedStatement consPS(String req, Connection co)
	{
		PreparedStatement res = null;
		try 
		{
			res = co.prepareStatement(req);
		}
		catch(SQLException e)
		{
			System.out.println(e + " Probleme construisant le prepared Statement avec la requete " + req);
		}
		return res;
	}
	
	public static ResultSet execPreparedReq(String preparedReq, Object[] args, String[] types, Connection co)
	{
		PreparedStatement psm = consPS(preparedReq, co);
		if(psm!=null)
		{
			try {
				// On parcours chaque parametre
				for(int i = 0; i < args.length; i++) 
				{
				// Selon le type de données renseigné on fait appel a la bonne fonction
				switch( types[i])
				{
				case "String" :
				psm.setString( i+1, (String)args[i]);
				break;
				case "int":
				psm.setInt( i+1, (int)args[i]) ;
				break;
				case " byte" :
				psm.setByte( i+1, (byte)args[i] );
				break;
				case "boolean" :
				psm.setBoolean( i+1, (boolean)args[i]);
				break;
				case "short" :
				psm.setShort( i+1, (short)args[i]);
				break;
				case "float ":
				psm.setDouble( i+1, (float)args[1]) ;
				break ;
				case "Timestamp" :
				psm.setTimestamp( i+1, (Timestamp)args[i]) ;
				break;
				case "Date" :
				psm.setDate( i+1, (Date)args[i]);
				break ;
		}
	}
				String action = preparedReq.substring(0, preparedReq.indexOf("")).toUpperCase();
				if(action.equals("SELECT"))
					return psm.executeQuery();
				if(action.equals("UPDATE") || action.equals("INSERT") || action.equals("DELETE")) 
				{
					psm.executeUpdate();
					return null;
				}
				psm.execute();
				return null;
			}
			catch(SQLException e)
			{
				System.out.println(e + "probleme pour traiter le resultat d'une requete.");
			}
			
			}
		return null;
	}
				
	
	public static int nbEmpruntOuvrage(String isbn)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "Select Count(*) INTO nbEmprunt FROM Emprunt NATURAL JOIN Exemplaire NATURAL JOIN Ouvrage where isbnOuvr = ?";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
			return res.getInt(1);	
		}
		catch(Exception e)
		{
			System.out.println(e);
			return 0;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		
	}
	
	public static int nbEmpruntOuvrageMasculin(String isbn) throws SQLException
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "Select Count(*) FROM Emprunt NATURAL JOIN Exemplaire NATURAL JOIN Ouvrage NATURAL JOIN  Utilisateur Where isbnOuvr = ? AND sexeUtil = 'M'";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		try {
			if(res.next())
				return res.getInt(1);
		}
		catch(SQLException e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		
	}
	
	public static int ageMoyenEmpruntOuvrage(String isbn)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep ="SELECT AVG( DATEDIFF(CURRENT_DATE, dateNaissUti)) FROM Emprunt NATURAL JOIN Exemplaire NATURAL JOIN Ouvrage NATURAL JOIN Utilisateur WHERE isbnOuvr=?";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
				return res.getInt(1);
		}
		catch (Exception e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		
	}
	
	public static int nbEmpruntOuvrageParStatut(String isbn, String statut)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "SELECT COUNT(*) FROM Emprunt NATURAL JOIN Utilisateur NATRUAL JOIN Statut WHERE isbnOuvr = ? and libelleStatut=?";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
				return res.getInt(1);
		}
		catch(Exception e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
	}
	
	public static int nbDemandeOuvr(String isbn)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "SELECT nbDemandeOuvr FROM Ouvrage WHERE isbnOuvr = ?";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
			{
				return res.getInt(1);
			}
		}
		catch(Exception e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
	}
	
	public static int nbRetourRetardUti(String login)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "SELECT COUNT(*) FROM Emprunt E NATURAL JOIN Utilisateur WHERE dateRetour > (SELECT DATE_ADD(dateEmprunt, INTERVAL dureeEmprunt DAY FROM Emprunt NATURAL JOIN Utilisateur NATURAL JOIN Statut WHERE numEmprunt = E.numEmprunt) AND login = ?";
		Object[] args = {login};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
				return res.getInt(1);
		}
		catch(Exception e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
	}
	
	public static int nbRetourATempsUti(String login)
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return -1;
		String reqPrep = "SELECT COUNT(*) FROM Emprunt E NATURAL JOIN Utilisateur Where dateRetour <= (SELECT DATE_ADD(dateEmprunt, INTERVAL dureeEmprunt DAY) FROM Emprunt NATURAL JOIN Utilisateur NATURAL JOIN Statut WHERE numEmprunt = E.numEmprunt) AND login = ?";
		Object[] args = {login};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		
		try
		{
			if(res.next())
				return res.getInt(1);
		}
		catch(Exception e)
		{
			System.out.println(e);
			return -2;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
	}

	// Tous les ouvrages 
	public static String[] topOuvrage()
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return null;
		String req = "SELECT isbnOuvr FROM Ouvrage ORDER BY nbEmpruntOuvr";
		ResultSet res = OutilsJDBC.execReq(req, co);
		String[] tab = new String[10];
		int i = 0;
		try
		{
			while(res.next() && i < 10)
			{
				tab[i] = res.getString(1);
				i++;
			}
		}
		catch(Exception e)
		{
			System.out.println(e);
			return null;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		return tab;
	}

	//  les 5 ouvrages les plus empruntés

	public static String[] top5Ouvrage()
	{
		String[] tab = topOuvrage();
		String[] tab2 = new String[5];
		for(int i = 0; i < 5; i++)
		{
			tab2[i] = tab[i];
		}
		return tab2;
	}

	// les 5 ouvrages les moins empruntés

	public static String[] last5Ouvrage()
	{
		String[] tab = topOuvrage();
		String[] tab2 = new String[5];
		for(int i = 0; i < 5; i++)
		{
			tab2[i] = tab[tab.length - i - 1];
		}
		return tab2;
	}

	// les 5 utilisateurs qui ont emprunté le plus d'ouvrages

	public static String[] top5Uti()
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return null;
		String req = "SELECT login FROM Utilisateur ORDER BY nbEmpruntUti";
		ResultSet res = OutilsJDBC.execReq(req, co);
		String[] tab = new String[10];
		int i = 0;
		try
		{
			while(res.next() && i < 10)
			{
				tab[i] = res.getString(1);
				i++;
			}
		}
		catch(Exception e)
		{
			System.out.println(e);
			return null;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		String[] tab2 = new String[5];
		for(int j = 0; j < 5; j++)
		{
			tab2[j] = tab[j];
		}
		return tab2;
	}

	// listé l'age moyen des emprunteurs pour chaque ouvrage

	public static int[] ageMoyenEmpruntOuvrage()
	{
		String[] tab = top5Ouvrage();
		int[] tab2 = new int[5];
		for(int i = 0; i < 5; i++)
		{
			tab2[i] = ageMoyenEmpruntOuvrage(tab[i]);
		}
		return tab2;
	}

	// retourne le nombre d'emprunt totale par statut pour tout les ouvrages

	public static int[] nbEmpruntOuvrageParStatut()
	{
		Connection co = OutilsJDBC.openConnection();
		if(co == null)
			return null;
		String req = "SELECT COUNT(*) FROM Emprunt NATURAL JOIN Statut WHERE libelleStatut = ?";
		Object[] args = {"En cours"};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(req, args, types, co);
		int[] tab = new int[3];
		int i = 0;
		try
		{
			while(res.next() && i < 3)
			{
				tab[i] = res.getInt(1);
				i++;
			}
		}
		catch(Exception e)
		{
			System.out.println(e);
			return null;
		}
		finally
		{
			OutilsJDBC.closeConnection(co);
		}
		return tab;
	}



	public static void main(String[] args) {
		// TODO Auto-generated method stub
	}


}

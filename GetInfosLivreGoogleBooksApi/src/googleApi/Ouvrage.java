package googleApi;

import java.sql.Connection;
import java.sql.Date;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Scanner;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URL;
import java.nio.charset.Charset;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import config.OutilsJDBC;

public class Ouvrage {
	private String isbn;
	private String langue;
	private String titre;
	private Date datePubli;
	private String resume;
	private int nbPages;
	private Date dateArriv;
	private int stock;
	private String urlImg;
	
	Ouvrage(String isbn, int stock, Connection co) throws Exception{
		if(isbn==null || stock<=0)
			System.exit(-1);
		this.isbn = isbn;
		this.stock = stock;
		int present = ouvrPresentBase(isbn, co);
		if(present == -1) {
			throw new Exception("Erreur impossible de vérifie si l'isbn est déja présenet dans la base");
		}
		if(present==1) {
			String req = "UPDATE Ouvrage SET stockOuvr = stockOuvr + ? WHERE isbnOuvr = ?";
			Object[] args = {stock, isbn};
			String[] types = {"int", "String"};
			OutilsJDBC.execPreparedReq(req, args, types, co);
			
			req = "INSERT INTO Exemplaire(empruntableExemp, positionExemp, etatExemp) VALUES( ?, ?, ?) ";
			Object[] args2 = {"Oui", "Réserve", "neuf", isbn};
			String[] types2 = {"String", "String", "String", "String"};
			OutilsJDBC.execPreparedReq(req, args2, types2, co);
		}
		else {
			GoogleApiJson gj = new GoogleApiJson(isbn);
			if(gj.json != null) {
				this.langue = gj.getLangue();
				this.titre = gj.getTitre();
				this.datePubli = gj.getDatePubli();
				this.resume = gj.getResume();
				this.nbPages = gj.getNbPages();
				this.dateArriv = new Date(System.currentTimeMillis());
				this.urlImg = gj.getUrlImg();
				gj=null; System.gc();			//On supprime la classe pour ne pas encombrer la mémoire car on en a plus besoin
				
				insertNewOuvrage(co);
			}
			else {
				Scanner sc = new Scanner(System.in);
				System.out.println("Impossible de récupérer automatiquement les informations sur l'ouvrage veuillez les rentrer : ");
				
				System.out.println("Langue : ");
				this.langue = sc.nextLine();;
				
				System.out.println("Titre : ");
				this.titre = sc.nextLine();;
				
				System.out.println("Date de publication (AAAA-MM-DD) : ");
				String dateText = sc.nextLine();
				SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
				this.datePubli = new Date(sdf.parse(dateText).getTime());
				
				System.out.println("Résumé : ");
				this.resume = sc.nextLine();
				
				System.out.println("Nombre de pages : ");
				this.nbPages = Integer.parseInt(sc.nextLine());
				
				this.dateArriv = new Date(System.currentTimeMillis());
				this.stock = stock;
				
				System.out.println("Url de l'image de la couverture : ");
				this.urlImg = gj.getUrlImg();
				
				
				insertNewOuvrage(co);
			}
		}
			
	}
	
	// Verifie la présence d'un isbn dans la base retourne 1 si present, 0 si non present et -1 si erreur
	private int ouvrPresentBase(String isbn, Connection co){
		// On execute la méthode qui s'occupe d'éxécuter la requête pour chercher si l'isbn est présent
		String reqPrep = "SELECT COUNT(*) FROM Ouvrage WHERE isbnOuvr = ?";
		Object[] args = {isbn};
		String[] types = {"String"};
		ResultSet res = OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
		int size = -1;
		try {
		    //on récupère le chiffredu COUNT(*)
			if(res.next()) {
				size = res.getInt(1);
			}
		}catch(Exception e) {
		    System.out.println(e);
		    return -1;
		}
		if(size == -1) {
			System.out.println("Impossible de récupérer la taille du résultat");
		}
		return size;
	}
	
	private void insertNewOuvrage(Connection co) {
		String reqPrep = "INSERT INTO Ouvrage(isbnOuvr, langueOuvr, titreOuvr, datePubliOuvr, resumeOuvr,"
				+ " nbPagesOuvr, dateArrivOuvr, stockOuvr, urlImgOuvr) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		Object[] args = {isbn, langue, titre, datePubli, resume, nbPages, dateArriv, stock, urlImg};
		String[] types = {"String", "String", "String", "Date", "String", "int", "Date", "int", "String"};
		OutilsJDBC.execPreparedReq(reqPrep, args, types, co);
	}
	

	public static void main(String[] args) throws IOException, JSONException, Exception {
		String url="jdbc:oracle:thin:nabdou1/20011001@oracle.iut-orsay.fr:1521:etudom";
		//jdbc:mysql:thin:sae-s3-nabdou1/8ZB8zSKsUFxbhAd7@projets.iut-orsay.fr/phpmyadmin:6022/sae-s3-nabdou1:etudom";
		//jdbc:mysql://127.0.0.1:3306/test
		//Connexion à la base
		Connection co = OutilsJDBC.openConnection();
		/*Ouvrage o = new Ouvrage("");
		
		JSONObject json = readJsonFromUrl("https://www.googleapis.com/books/v1/volumes?q=isbn:9781698078489");
		JSONArray lineItems = json.getJSONArray("items");
		JSONObject arr = lineItems.getJSONObject(0);
		System.out.println(arr);
		System.out.println(arr.get("id"));
		System.out.println(lineItems);*/
		
		Ouvrage o = new Ouvrage("123", 23, co);
		
		
		//o= null;
		System.gc();
		
		OutilsJDBC.closeConnection(co);
	}
}

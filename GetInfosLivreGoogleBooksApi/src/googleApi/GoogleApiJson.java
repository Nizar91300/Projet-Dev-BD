package googleApi;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URL;
import java.nio.charset.Charset;
import java.sql.Connection;
import java.sql.Date;
import java.text.SimpleDateFormat;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class GoogleApiJson {
	static String urlBegin = "https://www.googleapis.com/books/v1/volumes?q=isbn:";
	JSONObject json;
	
	GoogleApiJson(String isbn){
		try {
			json = readJsonFromUrl(urlBegin+isbn).getJSONArray("items").getJSONObject(0).getJSONObject("volumeInfo");
		} catch (JSONException | IOException e) {
			json = null;
			System.out.println(e);
		}
	}
	
	// Récupérer les infos du json du lien par un objet JSONObject
	public static JSONObject readJsonFromUrl(String url) throws IOException, JSONException {
		InputStream is = new URL(url).openStream();
	    try {
			BufferedReader br = new BufferedReader(new InputStreamReader(is, Charset.forName("UTF-8")));
			StringBuilder sb = new StringBuilder();
			int c;
			while ((c = br.read()) != -1)
				sb.append((char) c);
			return new JSONObject(sb.toString());
	    }catch(Exception e) {
	    	System.out.println("Impossible de lire le JSON");
	    	return null;
	    }finally {
	    	is.close();
	    }
	}
	
	JSONObject getJson() {
		return json;
	}
	
	String getLangue(){
		return json.getString("language");
	}
	String getTitre(){
		return json.getString("title");
	}
	Date getDatePubli()throws Exception{
		String dateText = json.getString("publishedDate");  
		SimpleDateFormat sdf;
		if(dateText.length() == 4) 
			sdf = new SimpleDateFormat("yyyy");
		else 
			sdf = new SimpleDateFormat("yyyy-MM-dd");
	    Date date = new Date(sdf.parse(dateText).getTime());  
		return date;
	}
	String getResume(){
		return json.getString("description");
	}
	int getNbPages(){
		return json.getInt("pageCount");
	}
	String getUrlImg(){
		try{
			JSONObject imgLinks = json.getJSONObject("imageLinks");
			return imgLinks.getString("smallThumbnail");
		}catch(Exception e) {
			return null;
		}
	}
	String getEditeur() {
		try {
			return json.getString("publisher");
		}catch(Exception e) {
			return null;
		}
	}
	
}

package vue.app;

import java.awt.Component;
import java.awt.Container;
import java.awt.EventQueue;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.ComponentAdapter;
import java.awt.event.ComponentEvent;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import controleur.ControleurApplication;

public class PanelMenu extends JPanel {
	//ATTRIBUTS
	private ControleurApplication controleurApp;
	
	/**
	 * Create the frame.
	 */
	public PanelMenu(ControleurApplication controleurApp) {
		this.controleurApp = controleurApp;
		// Lorsque le panel est redimensionné on redimensionne les espaces entre les composants
		addComponentListener(new ComponentAdapter() {
		    public void componentResized(ComponentEvent componentEvent) {
		    	int w = (int)((int)getSize().width*0.05);
		    	int h = (int)((int)getSize().height*0.05);
		    	setBorder(new EmptyBorder(h, w, h, w));
		    	setLayout(new GridLayout(0, 3, w, h*3));
		    	for ( Component child : getComponents () )
		    		child.setFont(new Font("Segoe UI", Font.PLAIN, (h+w)/4));
		    	System.out.println(getSize().width + " " + w);
		    	System.out.println((h+w)/4);
		    }
		});
		
		JButton btnEmprunt = new JButton("Emprunt");
		btnEmprunt.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				click_btnEmprunt();
			}
		});
		add(btnEmprunt);
		
		JButton btnRetour = new JButton("Retour");
		add(btnRetour);
		
		JButton btnAjoutExemplaire = new JButton("Ajouter exemplaire");
		add(btnAjoutExemplaire);
		
		JButton btnModifierExemplaire = new JButton("Modifier exemplaire");
		add(btnModifierExemplaire);
		
		JButton btnSupprimerExemplaire = new JButton("Supprimer exemplaire");
		add(btnSupprimerExemplaire);
		
		JButton btnVoirOuvrage = new JButton("Voir ouvrage");
		add(btnVoirOuvrage);
		
		JButton btnVoirExemplaire = new JButton("Voir exemplaire");
		add(btnVoirExemplaire);
		
		JButton btnSanction = new JButton("Sanctions");
		add(btnSanction);
		
		JButton btnRelance = new JButton("Relance");
		add(btnRelance);
	}
	/**
	 * Clic sur le bouton emprunt
	 */
	private void click_btnEmprunt() {
		controleurApp.affichePageEmprunt();
	}

}

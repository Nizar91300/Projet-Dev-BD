package vue;

import java.awt.Component;
import java.awt.Container;
import java.awt.EventQueue;
import java.awt.Font;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import javax.swing.border.EmptyBorder;

import controleur.ControleurApplication;
import controleur.ControleurConnexion;
import vue.app.PanelEmprunt;
import vue.app.PanelMenu;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JLabel;
import java.awt.GridLayout;
import java.awt.event.ComponentAdapter;
import java.awt.event.ComponentEvent;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class VueApplication extends JFrame {
	
	//ATTRIBUTS
	private ControleurApplication controleurApp;
	
	private JPanel contentPane;
	
	/**
	 * Create the frame.
	 */
	public VueApplication(ControleurApplication controleApp) {
		this.controleurApp = controleApp;
		
		setTitle("HomeBook Admin");
		ImageIcon logo = new ImageIcon("img/logo.png");
		setIconImage(logo.getImage());
		// Affichage dla fenetre avec un theme, si celui-ci n'est pas supporté le theme par efaut est utilisé
		try {
			UIManager.setLookAndFeel(new javax.swing.plaf.nimbus.NimbusLookAndFeel());
		} catch (UnsupportedLookAndFeelException e) {
		}
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1210, 700);
		setLocationRelativeTo(null);						// Centrer la fenetre
		contentPane = new PanelMenu(controleurApp);
		setContentPane(contentPane);
	}
	
	public void affichePage(String page) {
		remove(contentPane);
		
		switch(page) {
			case "menu":
				contentPane = new PanelMenu(controleurApp);
				break;
			case "emprunt":
				contentPane = new PanelEmprunt(controleurApp);
				break;
			/*case "retour":
				contentPane = new PanelRetour(controleurApp);
				break;	
			case "ajoutEx":
				contentPane = new PanelAjoutEx(controleurApp);
				break;	
			case "ModifEx":
				contentPane = new PanelModifEx(controleurApp);
				break;
			case "SupprEx":
				contentPane = new PanelSupprEx(controleurApp);
				break;
			case "voirOuvr":
				contentPane = new PanelVoirOuvr(controleurApp);
				break;
			case "voirEx":
				contentPane = new PanelVoirEx(controleurApp);
				break;
			case "sanction":
				contentPane = new PanelSanction(controleurApp);
				break;
			case "relance":
				contentPane = new PanelRelance(controleurApp);
				break;*/
		}
		setContentPane(contentPane);
		repaint();
		revalidate();
	}
	
	
}

package vue.app;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import controleur.ControleurApplication;

import javax.swing.JLabel;
import java.awt.Component;
import javax.swing.Box;

public class PanelEmprunt extends JPanel {
	//ATTRIBUTS
	private ControleurApplication controleurApp;


	/**
	 * Create the frame.
	 */
	public PanelEmprunt(ControleurApplication controleurApp) {
		this.controleurApp = controleurApp;
		setLayout(null);
		setSize(1210, 700);
		
		JLabel lblNewLabel = new JLabel("Emprunt");
		lblNewLabel.setBounds(421, 22, 40, 14);
		add(lblNewLabel);
		
		JLabel lblNewLabel_1 = new JLabel("Num\u00E9ro d'exemplaire :");
		lblNewLabel_1.setBounds(31, 132, 107, 14);
		add(lblNewLabel_1);
		
		JLabel lblNewLabel_2 = new JLabel("Login :");
		lblNewLabel_2.setBounds(31, 174, 32, 14);
		add(lblNewLabel_2);
		
		JLabel lblNewLabel_1_1 = new JLabel("Num\u00E9ro d'exemplaire :");
		lblNewLabel_1_1.setBounds(31, 409, 107, 14);
		add(lblNewLabel_1_1);
		
		JLabel lblNewLabel_3 = new JLabel("Nom :");
		lblNewLabel_3.setBounds(31, 450, 28, 14);
		add(lblNewLabel_3);
		
		JLabel lblNewLabel_4 = new JLabel("Pr\u00E9nom :");
		lblNewLabel_4.setBounds(31, 495, 43, 14);
		add(lblNewLabel_4);
		
		JLabel lblNewLabel_5 = new JLabel("Adresse :");
		lblNewLabel_5.setBounds(31, 532, 46, 14);
		add(lblNewLabel_5);
		
		JLabel lblNewLabel_6 = new JLabel("Mail :");
		lblNewLabel_6.setBounds(31, 573, 25, 14);
		add(lblNewLabel_6);
		
		JLabel lblNewLabel_7 = new JLabel("Code Postal :");
		lblNewLabel_7.setBounds(31, 624, 64, 14);
		add(lblNewLabel_7);

	}
}

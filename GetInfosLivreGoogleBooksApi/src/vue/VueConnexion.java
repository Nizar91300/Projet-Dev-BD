package vue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import controleur.ControleurConnexion;

import java.awt.GridLayout;
import javax.swing.JLabel;
import javax.swing.SwingConstants;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;

import javax.swing.JTextField;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;

import javax.swing.JButton;
import javax.swing.ImageIcon;

import javax.swing.JPasswordField;
import java.awt.Font;
import java.awt.Color;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.ActionEvent;

public class VueConnexion extends JFrame{
	// ATTRIBUTS
	// Controleur pour la vue connexion qui communiquera avec le modele (la base)
	private ControleurConnexion controleur;
	
	// Composants qui seront changés selon l'action de l'user
	private JPanel contentPane;
	JTextField txfId;
	JPasswordField psfPwd;
	JLabel lblErreur;
	

	/**
	 * Constructeur
	 * @param controleur reference vers le controleur qui communiquera avec le modele
	 */
	public VueConnexion(ControleurConnexion controleur) {
		this.controleur = controleur;
		setTitle("HomeBook Connexion");
		ImageIcon logo = new ImageIcon("img/logo.png");
		setIconImage(logo.getImage());
		// Affichage dla fenetre avec un theme, si celui-ci n'est pas supporté le theme par efaut est utilisé
		try {
			UIManager.setLookAndFeel(new javax.swing.plaf.nimbus.NimbusLookAndFeel());
		} catch (UnsupportedLookAndFeelException e) {
		}
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(450, 300);
		setLocationRelativeTo(null);						// Centrer la fenetre
		setResizable(false);
		
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(0, 10, 0, 10));

		setContentPane(contentPane);
		// Layout du panel principal
		GridBagLayout gbl_contentPane = new GridBagLayout();
		gbl_contentPane.columnWidths = new int[]{0, 0};
		gbl_contentPane.rowHeights = new int[]{0, 0, 0, 0, 0, 0};
		gbl_contentPane.columnWeights = new double[]{1.0, Double.MIN_VALUE};
		gbl_contentPane.rowWeights = new double[]{1.0, 0.0, 1.0, 1.0, 1.0, Double.MIN_VALUE};
		contentPane.setLayout(gbl_contentPane);
		
		// Ajout du panel contenant le label titre connexion
		JPanel panTitreConnexion = new JPanel();
		GridBagConstraints gbc_panTitreConnexion = new GridBagConstraints();
		gbc_panTitreConnexion.insets = new Insets(0, 0, 5, 0);
		gbc_panTitreConnexion.gridx = 0;
		gbc_panTitreConnexion.gridy = 0;
		contentPane.add(panTitreConnexion, gbc_panTitreConnexion);
		
		// Ajout du label titre connexion
		JLabel lblConnexion = new JLabel("Connexion");
		lblConnexion.setHorizontalAlignment(SwingConstants.CENTER);
		lblConnexion.setFont(new Font("Segoe UI", Font.BOLD, 30));
		panTitreConnexion.add(lblConnexion);
		
		// Ajout du panel contenant les labels d'id et de psw ainsi que les champs de saisie
		JPanel panLabelsFields = new JPanel();
		GridBagConstraints gbc_panLabelsFields = new GridBagConstraints();
		gbc_panLabelsFields.fill = GridBagConstraints.BOTH;
		gbc_panLabelsFields.insets = new Insets(0, 0, 5, 0);
		gbc_panLabelsFields.gridx = 0;
		gbc_panLabelsFields.gridy = 2;
		contentPane.add(panLabelsFields, gbc_panLabelsFields);
		
		// Ajout du panel contenant les labels d'id et de psw
		JPanel panLabels = new JPanel();
		panLabelsFields.add(panLabels);
		panLabels.setLayout(new GridLayout(0, 1, 0, 20));
		
		// AJout du label id
		JLabel lblId = new JLabel("Identifiant :");
		lblId.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		panLabels.add(lblId);
		
		// Ajout du label psw
		JLabel lblPwd = new JLabel("Mot de passe :");
		lblPwd.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		panLabels.add(lblPwd);
		
		// Ajout du panel contenant les champs de saisie
		JPanel panFields = new JPanel();
		panLabelsFields.add(panFields);
		panFields.setLayout(new GridLayout(0, 1, 0, 10));
		
		// Champs de saisie de l'id
		txfId = new JTextField();
		txfId.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		panFields.add(txfId);
		txfId.setColumns(15);
		
		// Champs de saisie du mot de passe
		psfPwd = new JPasswordField();
		psfPwd.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		psfPwd.setColumns(15);
		panFields.add(psfPwd);
		
		// Panel contenant le message d'erreur
		JPanel panErreur = new JPanel();
		GridBagConstraints gbc_panErreur = new GridBagConstraints();
		gbc_panErreur.insets = new Insets(0, 0, 5, 0);
		gbc_panErreur.fill = GridBagConstraints.BOTH;
		gbc_panErreur.gridx = 0;
		gbc_panErreur.gridy = 3;
		contentPane.add(panErreur, gbc_panErreur);
		
		// Label de message d'erreur
		lblErreur = new JLabel("");
		lblErreur.setForeground(new Color(255, 0, 0));
		lblErreur.setFont(new Font("Segoe UI", Font.PLAIN, 20));
		panErreur.add(lblErreur);
		
		// Panel contenant les boutons annuler et valder
		JPanel panBoutons = new JPanel();
		GridBagConstraints gbc_panBoutons = new GridBagConstraints();
		gbc_panBoutons.fill = GridBagConstraints.BOTH;
		gbc_panBoutons.gridx = 0;
		gbc_panBoutons.gridy = 4;
		contentPane.add(panBoutons, gbc_panBoutons);
		
		// Bouton annuler avec sa procédure évènementiel au clic
		JButton btnAnnuler = new JButton("Annuler");
		btnAnnuler.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				click_btnAnnuler();
			}
		});
		btnAnnuler.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		panBoutons.add(btnAnnuler);
		
		// Bouton valider avec sa procédure évènementiel au clic
		JButton btnValider = new JButton("Valider");
		btnValider.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				click_btnValider();
			}
		});
		btnValider.setFont(new Font("Segoe UI", Font.PLAIN, 17));
		panBoutons.add(btnValider);
		
		// Recupérer l'action du clic sur entrée pour appuer sur le bouton valider
		KeyListener enterPressed = new KeyListener(){
            @Override
            public void keyTyped(KeyEvent e) {
                if(e.getKeyChar()==KeyEvent.VK_ENTER)
                    btnValider.doClick();					// Action de clic sur le bouton valider
            }
            @Override
            public void keyPressed(KeyEvent e) {}
            @Override
            public void keyReleased(KeyEvent e) {}
		};
		txfId.addKeyListener(enterPressed);
		psfPwd.addKeyListener(enterPressed);
	}
	
	/**
	 * Clic sur le bouton annuler
	 */
	private void click_btnAnnuler() {
		controleur.quitter();
	}
	/**
	 * Clic sur le bouton valider
	 */
	private void click_btnValider() {
		controleur.demandeConnexion(txfId.getText(), String.valueOf(psfPwd.getPassword()));
	}
	
	/**
	 * Afficher un message d'erreur à l'utilisateur
	 * @param msgErreur String à afficher
	 */
	public void afficherErreur(String msgErreur) {
		lblErreur.setText(msgErreur);
	}
	
	/**
	 * Enlever l'ancien message d'erreur affiché à l'utilisateur
	 */
	public void resetMsgErreur() {
		lblErreur.setText("");
	}
}

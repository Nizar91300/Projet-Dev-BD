package vue;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTabbedPane;
import javax.swing.JLabel;
import javax.swing.SwingConstants;

public class VueOnglet extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VueOnglet frame = new VueOnglet();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public VueOnglet() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 651, 468);
		JTabbedPane tabbedPane = new JTabbedPane(JTabbedPane.TOP);
		getContentPane().add(tabbedPane);
		
		JPanel panel = new JPanel();
		tabbedPane.addTab("Emprunt", null, panel, null);
		panel.setLayout(null);
		
		JPanel panel_4 = new JPanel();
		tabbedPane.addTab("Retour", null, panel_4, null);
		
		JPanel panel_1 = new JPanel();
		tabbedPane.addTab("Ajouter exemplaire", null, panel_1, null);
		
		JPanel panel_5 = new JPanel();
		tabbedPane.addTab("Modifier exemplaire", null, panel_5, null);
		
		JPanel panel_6 = new JPanel();
		tabbedPane.addTab("Supprimer exemplaire", null, panel_6, null);
		
		JPanel panel_3 = new JPanel();
		tabbedPane.addTab("Voir infos exemplaire", null, panel_3, null);
		
		JPanel panel_8 = new JPanel();
		tabbedPane.addTab("Relance", null, panel_8, null);
		
		JPanel panel_2 = new JPanel();
		tabbedPane.addTab("Sanction", null, panel_2, null);
	}
}

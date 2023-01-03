
import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
 
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTabbedPane;
 
public class AjoutOngletTabPane {
 
  private JFrame frame = new JFrame();
 
  private JTabbedPane tabbedPane = new JTabbedPane();
 
  private JButton boutonAjtOng = new JButton("Ajouter une onglet");
 
  private Dimension closeButtonSize;
 
  private int tabCounter = 0;
 
  public AjoutOngletTabPane() {
 
    boutonAjtOng.addActionListener(new ActionListener(){
      public void actionPerformed(ActionEvent e){
        ajouter();
 
      }
 
    });
 
    frame.add(tabbedPane, BorderLayout.CENTER);
    frame.add(boutonAjtOng, BorderLayout.SOUTH);
 
    frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
 
    frame.pack();
    frame.setMinimumSize(new Dimension(300, 300));
    frame.setVisible(true);
 
  }
 
  public void ajouter() {
    final JPanel content = new JPanel();
    JPanel tab = new JPanel();
    tab.setOpaque(false);
 
    JLabel labelOnglet = new JLabel("Onglet " + (++tabCounter));
 
    JButton boutonFermer = new JButton("Fermer");
    boutonFermer.setPreferredSize(closeButtonSize);
    boutonFermer.addActionListener(new ActionListener() {
 
      public void actionPerformed(ActionEvent e) {
        int closeTabNumber = tabbedPane.indexOfComponent(content);
        tabbedPane.removeTabAt(closeTabNumber);
      }
    });
 
    tab.add(labelOnglet, BorderLayout.WEST);
    tab.add(boutonFermer, BorderLayout.EAST);
 
    tabbedPane.addTab(null, content);
    tabbedPane.setTabComponentAt(tabbedPane.getTabCount() - 1, tab);
  }
 
  public static void main(String[] args) {
    AjoutOngletTabPane onglet = new AjoutOngletTabPane();
  }
 
}
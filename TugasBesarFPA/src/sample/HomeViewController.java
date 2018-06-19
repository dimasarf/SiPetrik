package sample;

import javafx.animation.Animation;
import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.util.Duration;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.ResourceBundle;
import java.util.Set;

public class HomeViewController implements Initializable
{
    @FXML
    private Label totalProduksi;
    @FXML
    private Label totalOuputOk;
    @FXML
    private Label totalOuputReject;
    @FXML
    private Label lblJam;
    @FXML
    private Label lblTgl;
    @FXML
    private void TotalProduksiMouseClicked(ActionEvent event)
    {
        try {
            System.out.println("Eh Diklik");
        }
        catch (IllegalArgumentException e)
        {
            System.out.println(e.getMessage());
        }
    }

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        SetJam();
        SetTanggal();
        try {
            totalProduksi.setText(String.valueOf(Pencatatan.getTotalProduksi()));
            totalOuputOk.setText(String.valueOf(Pencatatan.getDetailOuput("OK")));
            totalOuputReject.setText(String.valueOf(Pencatatan.getDetailOuput("Rejected")));
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        }
    }

    public void SetJam()
    {
        Timeline clock = new Timeline(new KeyFrame(Duration.ZERO, e->
        {
            Calendar cal = Calendar.getInstance();
            int second = cal.get(Calendar.SECOND);
            int minute = cal.get(Calendar.MINUTE);
            int hour = cal.get(Calendar.HOUR);
            lblJam.setText(hour+" : "+minute+" : "+second);
        }),
                new KeyFrame(Duration.seconds(1))
        );
        clock.setCycleCount(Animation.INDEFINITE);
        clock.play();
    }

    public void SetTanggal()
    {
        Date date = new Date();
        SimpleDateFormat sdf = new SimpleDateFormat("dd/mm/yyyy");
        lblTgl.setText(sdf.format(date));
    }
}

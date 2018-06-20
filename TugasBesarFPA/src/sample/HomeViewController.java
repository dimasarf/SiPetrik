package sample;

import com.jfoenix.controls.JFXButton;
import javafx.animation.Animation;
import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.stage.Stage;
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
    private JFXButton btnTotalOuputOk;
    @FXML
    private JFXButton btnTotalOuputRejected ;
    @FXML
    private JFXButton btnTotalProduksi;
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXButton btnHome;

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

    @FXML
    public void inputDataOnAction(ActionEvent e)
    {
        NavMenu.TambahData();
        Stage stageToClose = (Stage) inputData.getScene().getWindow();
        stageToClose.close();
    }

    @FXML
    public void btnHomeOnAction(ActionEvent e)
    {
        NavMenu.Home();
        Stage stageToClose = (Stage) btnHome.getScene().getWindow();
        stageToClose.close();
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
        SimpleDateFormat sdf = new SimpleDateFormat("MMMM dd, yyyy");
        lblTgl.setText(sdf.format(date));
    }

    @FXML
    public void btnOutputRejectedOnActionEvent(ActionEvent event)
    {
        Parent root;
        ViewDataController.dataToDisplay = "Rejected";
        try
        {
            root = FXMLLoader.load(getClass().getResource("ViewData.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
            Stage stageToClose = (Stage) btnTotalOuputRejected.getScene().getWindow();
            stageToClose.close();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    @FXML
    public void btnTotalOuputOkOnActionEvent(ActionEvent event)
    {
        Parent root;
        ViewDataController.dataToDisplay = "OK";
        try
        {
            root = FXMLLoader.load(getClass().getResource("ViewData.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
            Stage stageToClose = (Stage) btnTotalOuputOk.getScene().getWindow();
            stageToClose.close();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    @FXML
    public void btnTototalProduksiOnActionEvent(ActionEvent event)
    {
        Parent root;
        ViewDataController.dataToDisplay = "Semua";
        try
        {
            root = FXMLLoader.load(getClass().getResource("ViewData.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
            Stage stageToClose = (Stage) btnTotalProduksi.getScene().getWindow();
            stageToClose.close();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }
}

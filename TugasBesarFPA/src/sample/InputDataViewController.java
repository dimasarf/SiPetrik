package sample;

import com.jfoenix.controls.*;
import javafx.concurrent.Task;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.fxml.LoadException;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleGroup;
import javafx.stage.Stage;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.TransformerException;
import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.net.URL;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.*;

public class InputDataViewController implements Initializable
{
    Task progress;
    @FXML
    private JFXTextField txtTarget;

    @FXML
    private JFXComboBox namaMesin;
    @FXML
    private JFXComboBox jam, menit, detik;
    @FXML
    private JFXDatePicker tglProduksi;
    @FXML
    private JFXTextField txtHasilOK;
    @FXML
    private JFXTextField txtHasilReject;
    @FXML
    private JFXProgressBar progressBar;
    @FXML
    private Button btnSubmit;
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXButton btnHome;
    @FXML
    private JFXButton btnStat;
    @FXML
    private JFXButton btnOutput;
    @FXML
    private JFXButton btnDataProduksi;
    BackGroundWorker worker;

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        btnSubmit.setDisable(true);
        progressBar.setProgress(0.0);
        worker = new BackGroundWorker();
        new Thread(worker).start();
        NodeList nama2Mesin = XMLReader.getNode("dataMesin.xml");
        for(int i = 0; i < nama2Mesin.getLength(); i++)
        {
            Node node = nama2Mesin.item(i);
            if(node.getNodeType() == Node.ELEMENT_NODE)
            {
                Element elemen = (Element) node;
                namaMesin.getItems().add(elemen.getElementsByTagName("namaMesin").item(0).getTextContent());
            }

        }
        for (int h =1; h<=24; h++)
        {
            jam.getItems().add(h);
        }

    }

    @FXML
    public void btnSubmitOnaction(ActionEvent e) throws IOException, SAXException {
        try {
            Calendar cal = new GregorianCalendar();
            int tgl = tglProduksi.getValue().getDayOfMonth();
            int bulan = tglProduksi.getValue().getMonthValue()-1;
            int tahun = tglProduksi.getValue().getYear();
            cal.set(tahun, bulan, tgl);
            DataHasilProduksi dhp = new DataHasilProduksi(namaMesin.getValue().toString(), Integer.parseInt(txtTarget.getText()), Integer.parseInt(jam.getValue().toString()), Integer.parseInt(txtHasilReject.getText()),Integer.parseInt(txtHasilOK.getText()), cal.getTime());
            Pencatatan.CatatHasilProduksi(dhp);
            AlertBox.display("Data berhasil disimpan!");
        } catch (NumberFormatException ex) {
            AlertBox.display("Data gagal disimpan");
        } catch (ParserConfigurationException e1) {
            e1.printStackTrace();
        }
    }

    @FXML
    public void namaMesinOnAction(ActionEvent e)
    {
        double progress = progressBar.progressProperty().doubleValue();
        double n = progress + 0.2;
        worker.updateProgress(n, 0.9);
        progressBar.progressProperty().bind(worker.progressProperty());
        System.out.println(progress);
        if(progressBar.getProgress() >= 1)
        {
            btnSubmit.setDisable(false);
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

    @FXML
    private void btnStatOnAction(ActionEvent event)
    {
        NavMenu.Statistik();
        Stage stageToClose = (Stage) btnStat.getScene().getWindow();
        stageToClose.close();
    }

    @FXML
    private void btnOutputOnAction(ActionEvent event)
    {
        NavMenu.OutputMesin();
        Stage stageToClose = (Stage) btnOutput.getScene().getWindow();
        stageToClose.close();
    }

    @FXML
    public void btnDataProduksiOnAction(ActionEvent e)
    {
        NavMenu.DataProduksi();
        Stage stageToClose = (Stage) btnDataProduksi.getScene().getWindow();
        stageToClose.close();
    }

}

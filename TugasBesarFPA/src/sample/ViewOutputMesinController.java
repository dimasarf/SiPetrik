package sample;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXDatePicker;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.swing.text.TableView;
import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.Instant;
import java.time.LocalDate;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
import java.util.*;

public class ViewOutputMesinController implements Initializable
{
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXButton btnHome;
    @FXML
    private javafx.scene.control.TableView tblData;
    @FXML
    private JFXComboBox pilihan;
    @FXML
    private JFXDatePicker tgl;
    @FXML
    private JFXButton btnSemua;
    @FXML
    private JFXButton btnHari;
    @FXML
    private Label lblRata2OK;
    @FXML
    private Label lblModusOk;
    @FXML
    private Label lblMedianOK;
    @FXML
    private Label lblRata2Rj;
    @FXML
    private Label lblMedianRj;
    @FXML
    private Label lblModusRj;
    @FXML
    private JFXButton btnStat;
    @FXML
    private JFXButton btnOutput;
    @FXML
    private Label lblWaktuOK;
    @FXML
    private Label lblWaktuReject;
    @FXML
    private JFXButton btnDataProduksi;

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        initTable();
        populateItemToTable();

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

    public void initTable()
    {
        TableColumn<OutputMesin, String> kolomMesin = new TableColumn<>("Mesin");
        kolomMesin.setMinWidth(200);
        kolomMesin.setCellValueFactory(new PropertyValueFactory<>("Mesin"));

        TableColumn<OutputMesin, Integer> kolomOk = new TableColumn<>("Ouput_OK");
        kolomOk.setMinWidth(200);
        kolomOk.setCellValueFactory(new PropertyValueFactory<>("JumlahBarangOK"));

        TableColumn<OutputMesin, Integer> kolomReject = new TableColumn<>("Output_Rejected");
        kolomReject.setMinWidth(200);
        kolomReject.setCellValueFactory(new PropertyValueFactory<>("JumlahBarangReject"));

        tblData.getColumns().addAll(kolomMesin, kolomOk, kolomReject);
    }

    public void populateItemToTable()
    {

        try {
            ObservableList<OutputMesin> om = FXCollections.observableArrayList();
            NodeList nama2Mesin = XMLReader.getNode("dataMesin.xml");
            for(int i = 0; i < nama2Mesin.getLength(); i++)
            {
                Node node = nama2Mesin.item(i);
                if(node.getNodeType() == Node.ELEMENT_NODE)
                {
                    Element elemen = (Element) node;
                    OutputMesin mes2 = new OutputMesin(elemen.getElementsByTagName("namaMesin").item(0).getTextContent());
                    om.add(mes2);
                }

            }

            for (OutputMesin om2 : om)
            {
                try {
                    for (DataHasilProduksi dp2 : Pencatatan.getHasilProduksi())
                    {
                        if (dp2.getNamaMesin().equals(om2.getMesin()))
                        {
                           om2.setJumlahBarangReject(dp2.getHasilReject());
                           om2.setJumlahBarangOK(dp2.getHasilOK());

                        }
                    }
                } catch (ParseException e) {
                    e.printStackTrace();
                }
            }
            System.out.println(om);
            tblData.setItems(om);
            lblWaktuOK.setText("Semua");
            lblRata2OK.setText(String.valueOf(Statistik.HitungRata2OK(om)));
            lblMedianOK.setText(String.valueOf(Statistik.medianOuputOk(om)));
            lblModusOk.setText(String.valueOf(Statistik.getModusOk(om).getMesin()));
            lblWaktuReject.setText("Semua");
            lblRata2Rj.setText(String.valueOf(Statistik.HitungRata2Reject(om)));
            lblMedianRj.setText(String.valueOf(Statistik.medianOuputReject(om)));
            lblModusRj.setText(String.valueOf(Statistik.getModusReject(om).getMesin()));
        } catch (IOException | ParserConfigurationException | SAXException e) {
            e.printStackTrace();
        }
    }

    public void populateItemToTable(String date) {

        try {
            ObservableList<OutputMesin> om = FXCollections.observableArrayList();
            NodeList nama2Mesin = XMLReader.getNode("dataMesin.xml");
            for(int i = 0; i < nama2Mesin.getLength(); i++)
            {
                Node node = nama2Mesin.item(i);
                if(node.getNodeType() == Node.ELEMENT_NODE)
                {
                    Element elemen = (Element) node;
                    OutputMesin mes2 = new OutputMesin(elemen.getElementsByTagName("namaMesin").item(0).getTextContent());
                    om.add(mes2);
                }

            }

            for (OutputMesin om2 : om)
            {
                for (DataHasilProduksi dp2 : Pencatatan.getHasilProduksi())
                {
                    Date tgl = null;
                    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                    String tgl2 = sdf.format(dp2.getTanggalProduksi());
                    if (dp2.getNamaMesin().equals(om2.getMesin()) && tgl2.equals(date))
                    {
                        om2.setJumlahBarangReject(dp2.getHasilReject());
                        om2.setJumlahBarangOK(dp2.getHasilOK());
                    }
                }
            }
            System.out.println(om);
            tblData.setItems(om);
            lblWaktuOK.setText(String.valueOf(tgl.getValue()));
            lblRata2OK.setText(String.valueOf(Statistik.HitungRata2OK(om)));
            lblMedianOK.setText(String.valueOf(Statistik.medianOuputOk(om)));
            lblModusOk.setText(String.valueOf(Statistik.getModusOk(om).getMesin()));
            lblWaktuReject.setText(String.valueOf(tgl.getValue()));
            lblRata2Rj.setText(String.valueOf(Statistik.HitungRata2Reject(om)));
            lblMedianRj.setText(String.valueOf(Statistik.medianOuputReject(om)));
            lblModusRj.setText(String.valueOf(Statistik.getModusReject(om).getMesin()));
        } catch (IOException | ParserConfigurationException | SAXException | ParseException e) {
            e.printStackTrace();
        }
    }

    public void tglOnAction(ActionEvent event)
    {
        String tanggal = tgl.getValue().format(DateTimeFormatter.ofPattern("yyyy-MM-dd"));
        this.populateItemToTable(tanggal);
    }

    public void btnHariOnAction(ActionEvent event)
    {
        tgl.setVisible(true);
    }

    public void btnSemuaOnAction(ActionEvent event)
    {
        tgl.setVisible(false);
        populateItemToTable();
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

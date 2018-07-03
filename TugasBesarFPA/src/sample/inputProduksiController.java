package sample;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXDatePicker;
import com.jfoenix.controls.JFXTextField;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.xml.sax.SAXException;

import javax.swing.text.TableView;
import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.util.Date;
import java.util.ResourceBundle;

public class inputProduksiController implements Initializable
{
    @FXML
    private JFXComboBox namaMesin;
    @FXML
    private JFXTextField txtTarget;
    @FXML
    private JFXDatePicker dpTanggal;
    @FXML
    private JFXComboBox cbShift;
    @FXML
    private JFXTextField txtOK;
    @FXML
    private JFXTextField txtReject;
    @FXML
    private javafx.scene.control.TableView tblData;
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
    public void btnSubmitOnaction(ActionEvent e)
    {

    }

    @FXML
    public void btnDataProduksiOnAction(ActionEvent e)
    {

    }

    public void initTable()
    {
        TableColumn<DataHasilProduksi, String> kolomMesin = new TableColumn<>("Mesin");
        kolomMesin.setMinWidth(200);
        kolomMesin.setCellValueFactory(new PropertyValueFactory<>("namaMesin"));

        TableColumn<DataHasilProduksi, Integer> kolomTarget = new TableColumn<>("Target Produksi");
        kolomTarget.setMinWidth(200);
        kolomTarget.setCellValueFactory(new PropertyValueFactory<>("targetProduksi"));

        TableColumn<DataHasilProduksi, Integer> kolomShift = new TableColumn<>("Shift");
        kolomShift.setMinWidth(200);
        kolomShift.setCellValueFactory(new PropertyValueFactory<>("shift"));

        TableColumn<DataHasilProduksi, Integer> kolomReject = new TableColumn<>("Hasil Reject");
        kolomReject.setMinWidth(200);
        kolomReject.setCellValueFactory(new PropertyValueFactory<>("hasilReject"));

        TableColumn<DataHasilProduksi, Integer> kolomOk = new TableColumn<>("Hasil OK");
        kolomOk.setMinWidth(200);
        kolomOk.setCellValueFactory(new PropertyValueFactory<>("hasilOK"));

        TableColumn<DataHasilProduksi, Date> kolomTgl = new TableColumn<>("Tanggal Produksi");
        kolomTgl.setMinWidth(200);
        kolomTgl.setCellValueFactory(new PropertyValueFactory<>("tanggalProduksi"));

        tblData.getColumns().addAll(kolomMesin, kolomTarget, kolomShift, kolomReject, kolomOk, kolomTgl);
    }

    public void GetAllProduksi()
    {
        initTable();
        try {
            tblData.getItems().addAll(Pencatatan.getHasilProduksi());
        } catch (IOException | ParserConfigurationException | ParseException | SAXException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        GetAllProduksi();
    }
}

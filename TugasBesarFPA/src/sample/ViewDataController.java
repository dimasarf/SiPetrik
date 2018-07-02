package sample;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXListView;
import com.jfoenix.controls.JFXTextField;
import com.jfoenix.controls.JFXTreeTableView;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.w3c.dom.Element;
import org.xml.sax.SAXException;

import javax.xml.crypto.Data;
import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.util.Date;
import java.util.ResourceBundle;


public class ViewDataController implements Initializable
{
    @FXML
    private TableView tblData;
    @FXML
    private Label lblTanggal;
    @FXML
    private Label lblMesin;
    @FXML
    private Label lblStatus;
    private DataProduksi data;
    public static String dataToDisplay;
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXButton btnHome;
    @FXML
    private JFXButton btnCari;
    @FXML
    private JFXTextField txtCari;
    @FXML
    private JFXButton btnStat;
    @FXML
    private JFXButton btnOutput;
    @FXML
    private JFXButton btnDataProduksi;

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        if(dataToDisplay.equals("Semua"))
            GetAllProduksi();
        else
            getSpesificCondition();

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

    public void getSpesificCondition()
    {
        initTable();
        try {
            for (DataProduksi dp : Pencatatan.getAllProduksi())
            {
                if(dp.getKondisi_Barang().equals(ViewDataController.dataToDisplay))
                    tblData.getItems().add(dp);
            }

        } catch (IOException | SAXException | ParserConfigurationException e) {
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

    @FXML
    public void btnCariOnAction(ActionEvent event) throws ParserConfigurationException, SAXException, IOException
    {
        boolean found = false;
        tblData.getItems().clear();
        try {
            for (DataHasilProduksi dp : Pencatatan.getHasilProduksi() )
            {
                if(dp.getNamaMesin().contains(txtCari.getText()))
                {
                    tblData.getItems().add(dp);
                    found = true;
                }
            }
        } catch (ParseException e) {
            e.printStackTrace();
        }
        if(!found)
        {
            AlertBox.display("Data Tidak Ditemukan");
            if(dataToDisplay.equals("Semua"))
                GetAllProduksi();
            else
                getSpesificCondition();
        }
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

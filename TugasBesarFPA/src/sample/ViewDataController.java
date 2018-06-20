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
import java.util.ResourceBundle;


public class ViewDataController implements Initializable
{
    @FXML
    private JFXListView<DataProduksi> tblData;
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

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        tblData.setStyle("-fx-background-insets: 0 ;");
        tblData.getSelectionModel().selectedItemProperty().addListener((observable, oldValue, newValue) -> {
            data = newValue;
            lblMesin.setText(data.getMesin());
            lblStatus.setText(data.getKondisi_Barang());
            lblTanggal.setText(data.getTglProduksi());
        });
        if(dataToDisplay.equals("Semua"))
            GetAllProduksi();
        else
            getSpesificCOndition();

    }

    public void GetAllProduksi()
    {
        try {
            tblData.getItems().addAll(Pencatatan.getAllProduksi());

        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        }
    }

    public void getSpesificCOndition()
    {
        try {
            for (DataProduksi dp : Pencatatan.getAllProduksi())
            {
                if(dp.getKondisi_Barang().equals(ViewDataController.dataToDisplay))
                    tblData.getItems().add(dp);
            }

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

    @FXML
    public void btnCariOnAction(ActionEvent event) throws ParserConfigurationException, SAXException, IOException
    {
        boolean found = false;
        tblData.getItems().clear();
        for (DataProduksi dp : Pencatatan.getAllProduksi() )
        {
            if(dp.getIdBarang().contains(txtCari.getText()))
            {
                tblData.getItems().add(dp);
                found = true;
            }
        }
        if(!found)
        {
            AlertBox.display("Data Tidak Ditemukan");
            if(dataToDisplay.equals("Semua"))
                GetAllProduksi();
            else
                getSpesificCOndition();
        }
    }
}

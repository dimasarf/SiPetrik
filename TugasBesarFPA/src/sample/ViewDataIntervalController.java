package sample;

import com.jfoenix.controls.JFXButton;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.ResourceBundle;

public class ViewDataIntervalController implements Initializable
{
    @FXML
    private TableView tblData;
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXButton btnHome;
    @FXML
    private Label lblRata2OK;
    @FXML
    private Label lblModusOk;
    @FXML
    private Label lblMedianOK;
    @FXML
    private JFXButton btnStat;
    @FXML
    private JFXButton btnOutput;
    @FXML
    private JFXButton btnOuputOK;
    @FXML
    private JFXButton btnOutputReject;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        initTable();
        PopulateItemToTable("OK");
    }

    public void initTable()
    {
        TableColumn<DataInterval, String> batasBawah = new TableColumn<>("Batas Bawah");
        batasBawah.setMinWidth(200);
        batasBawah.setCellValueFactory(new PropertyValueFactory<>("batasBawah"));

        TableColumn<DataInterval, Integer> batasAtas = new TableColumn<>("Batas Atas");
        batasAtas.setMinWidth(200);
        batasAtas.setCellValueFactory(new PropertyValueFactory<>("batasAtas"));

        TableColumn<DataInterval, Integer> frekuensi = new TableColumn<>("Frekuensi");
        frekuensi.setMinWidth(200);
        frekuensi.setCellValueFactory(new PropertyValueFactory<>("frekuensi"));

        tblData.getColumns().addAll(batasBawah, batasAtas, frekuensi);
    }

    public void PopulateItemToTable(String Kondisi)
    {
        List<Integer> dummy = new ArrayList<>();
        try {
            for (DataHasilProduksi dhp: Pencatatan.getHasilProduksi())
            {
                if(Kondisi.equals("OK"))
                    dummy.add(dhp.getHasilOK());
                else
                    dummy.add(dhp.getHasilReject());
            }

            Collections.sort(dummy);
            int rentang = dummy.get(dummy.size()-1) - dummy.get(0);
            System.out.println(rentang);
            double nKelas = 1 + (3.3*Math.log10(dummy.size()));
            int banyakKelas = nKelas %1 == 0? (int)nKelas : (int)Math.floor(nKelas) +1;
            System.out.println(banyakKelas);
            double x = rentang / banyakKelas;
            int interval = x % 1 == 0? (int) x : (int) Math.floor(x) + 1;
            System.out.println(interval);
            ObservableList<DataInterval> listDi = FXCollections.observableArrayList();

            for(int i =0; i< banyakKelas; i++)
            {
                int batasBawah;
                DataInterval di = new DataInterval();
                if(listDi.size() == 0)
                {
                    batasBawah = dummy.get(0);
                    di.setBatasBawah(batasBawah);
                    di.setBatasAtas(batasBawah + interval);
                }
                else
                {
                    batasBawah = listDi.get(listDi.size()-1).getBatasAtas() + 1;
                    di.setBatasBawah(batasBawah);
                    di.setBatasAtas(batasBawah + interval);
                }
                listDi.add(di);
            }

            for (DataInterval di :listDi)
            {
                for (Integer angka: dummy)
                {
                    if(angka >= di.getBatasBawah() && angka <= di.getBatasAtas())
                        di.setFrekuensi(1);
                }
            }

            tblData.setItems(listDi);

        } catch (ParserConfigurationException | IOException | ParseException | SAXException e) {
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
    public void btnOuputOkOnAction(ActionEvent ev)
    {
        PopulateItemToTable("OK");
    }

    @FXML
    public void btnOuputRejectOnActionAc(ActionEvent ev)
    {
        PopulateItemToTable("Reject");
    }
}

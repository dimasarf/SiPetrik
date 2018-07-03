package sample;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXDatePicker;
import com.jfoenix.controls.JFXTextField;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.swing.text.TableView;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.TransformerException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.time.LocalDate;
import java.time.ZoneId;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
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
    private Button btnDataProduksi;
    @FXML
    private Button btnEdit;
    @FXML
    private Button btnHapus;
    @FXML
    private Button btnTambah;
    int index;
    boolean editClicked;
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
    public void btnSubmitOnaction(ActionEvent e) throws IOException {
        try {
            if(editClicked)
            {
                DataHasilProduksi dhp = Pencatatan.getHasilProduksi().get(index);
                Calendar cal = new GregorianCalendar();
                int tgl = dpTanggal.getValue().getDayOfMonth();
                int bulan = dpTanggal.getValue().getMonthValue()-1;
                int tahun = dpTanggal.getValue().getYear();
                cal.set(tahun, bulan, tgl);
                dhp.setNamaMesin(String.valueOf(namaMesin.getValue()));
                dhp.setTargetProduksi(Integer.parseInt(txtTarget.getText()));
                dhp.setTanggalProduksi(cal.getTime());
                dhp.setShift(Integer.parseInt(String.valueOf(cbShift.getValue())));
                dhp.setHasilOK(Integer.parseInt(txtOK.getText()));
                dhp.setHasilReject(Integer.parseInt(txtReject.getText()));
                Pencatatan.updateData(dhp, index);
                GetAllProduksi();
                clear();
            }
            else
            {
                Calendar cal = new GregorianCalendar();
                int tgl = dpTanggal.getValue().getDayOfMonth();
                int bulan = dpTanggal.getValue().getMonthValue()-1;
                int tahun = dpTanggal.getValue().getYear();
                cal.set(tahun, bulan, tgl);
                DataHasilProduksi dhp = new DataHasilProduksi(namaMesin.getValue().toString(), Integer.parseInt(txtTarget.getText()), Integer.parseInt(cbShift.getValue().toString()), Integer.parseInt(txtReject.getText()),Integer.parseInt(txtOK.getText()), cal.getTime());
                Pencatatan.CatatHasilProduksi(dhp);
                AlertBox.display("Data berhasil disimpan!");
                GetAllProduksi();
                clear();
            }

        } catch (NumberFormatException ex) {
            AlertBox.display("Data gagal disimpan");
        } catch (ParserConfigurationException | SAXException | ParseException e1) {
            e1.printStackTrace();
        }
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
        tblData.getItems().clear();
        initTable();
        try {
            tblData.getItems().addAll(Pencatatan.getHasilProduksi());
        } catch (IOException | ParserConfigurationException | ParseException | SAXException e) {
            e.printStackTrace();
        }
       // tblData.getItems().clear();
    }

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        GetAllProduksi();
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
        for (int h =1; h<=3; h++)
        {
            cbShift.getItems().add(h);
        }
    }

    public void setField(DataHasilProduksi dhp)
    {
        namaMesin.setPromptText(dhp.getNamaMesin());
        namaMesin.setValue(dhp.getNamaMesin());
        txtTarget.setText(String.valueOf(dhp.getTargetProduksi()));
        LocalDate tgl = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
        dpTanggal.setPromptText(String.valueOf(dhp.getTanggalProduksi()));
        dpTanggal.setValue(tgl);
        cbShift.setValue(String.valueOf(dhp.getShift()));
        txtOK.setText(String.valueOf(dhp.getHasilOK()));
        txtReject.setText(String.valueOf(dhp.getHasilReject()));
    }

    public void clear()
    {
        namaMesin.setPromptText("");
        txtTarget.setText("");
        dpTanggal.setPromptText("");
        cbShift.setPromptText(String.valueOf(""));
        txtOK.setText(String.valueOf(""));
        txtReject.setText("");
    }

    @FXML
    public void btnEditOnAction(ActionEvent e)
    {
        editClicked = true;
        DataHasilProduksi dhp = (DataHasilProduksi) tblData.getSelectionModel().getSelectedItem();
        index = tblData.getSelectionModel().getSelectedIndex();
        setField(dhp);
    }

    @FXML
    public void btnHapusOnAction(ActionEvent e)
    {
        int index = tblData.getSelectionModel().getSelectedIndex();
        Pencatatan.deleteData(index);
        GetAllProduksi();

    }
}

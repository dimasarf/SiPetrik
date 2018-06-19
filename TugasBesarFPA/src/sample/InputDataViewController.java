package sample;

import com.jfoenix.controls.*;
import javafx.concurrent.Task;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.fxml.LoadException;
import javafx.scene.control.Button;
import javafx.scene.control.ToggleGroup;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.net.URL;
import java.util.Date;
import java.util.ResourceBundle;

public class InputDataViewController implements Initializable
{
    Task progress;
    @FXML
    private JFXComboBox namaMesin;
    @FXML
    private JFXComboBox jam, menit, detik;
    @FXML
    private JFXDatePicker tglProduksi;
    @FXML
    private JFXRadioButton ok;
    @FXML
    private JFXRadioButton rejected;
    @FXML
    private JFXTextField txtIdBarang;
    @FXML
    private JFXProgressBar progressBar;
    @FXML
    private Button btnSubmit;


    BackGroundWorker worker;
    private  ToggleGroup group;
    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        btnSubmit.setDisable(true);
        progressBar.setProgress(0.0);
        worker = new BackGroundWorker();
        new Thread(worker).start();
        group = new ToggleGroup();
        ok.setToggleGroup(group);
        rejected.setToggleGroup(group);
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
        for (int m = 0; m<=59; m++)
        {
            String minutes;
            if(m <10)
                minutes = "0"+String.valueOf(m);
            else
                minutes = String.valueOf(m);
            menit.getItems().add(minutes);
        }
        for (int s = 0; s<=59; s++)
        {
            String seconds;
            if(s <10)
                seconds = "0"+String.valueOf(s);
            else
                seconds = String.valueOf(s);
            detik.getItems().add(seconds);
        }

    }

    @FXML
    public void btnSubmitOnaction(ActionEvent e) throws IOException, SAXException {
        try {
            String statusBarang = group.getSelectedToggle().toString();
            System.out.println(statusBarang);
            boolean status = statusBarang.equals("JFXRadioButton[id=ok, styleClass=radio-button jfx-radio-button]'OK'");
            String namaMesin = this.namaMesin.getValue().toString();
            int jam = Integer.parseInt(this.jam.getValue().toString());
            int menit = Integer.parseInt(this.menit.getValue().toString());
            int detik = Integer.parseInt(this.detik.getValue().toString());
            int tgl = tglProduksi.getValue().getDayOfMonth();
            int bulan = tglProduksi.getValue().getMonthValue();
            int tahun = tglProduksi.getValue().getYear();
            String idBarang = txtIdBarang.getText();
            Date tanggal = new Date(tahun, bulan, tgl, jam, menit, detik);

            Mesin mesin = new Mesin(namaMesin);
            mesin.produksiBarang(status, idBarang, tanggal);
            AlertBox.display("Data berhasil disimpan!");
        } catch (IOException xe) {
            AlertBox.display("Data gagal disimpan");
        } catch (NumberFormatException ex) {
            AlertBox.display("Data gagal disimpan");
        } catch (SAXException xex) {
            AlertBox.display("Data gagal disimpan");
        }
    }

    @FXML
    public void namaMesinOnAction(ActionEvent e)
    {
        double progress = progressBar.progressProperty().doubleValue();
        double n = progress + 0.1;
        worker.updateProgress(n, 0.9);
        progressBar.progressProperty().bind(worker.progressProperty());
        System.out.println(progress);
        if(progressBar.getProgress() >= 1)
        {
            btnSubmit.setDisable(false);
        }
    }
}

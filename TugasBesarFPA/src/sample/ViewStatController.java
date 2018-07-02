package sample;

import com.jfoenix.controls.JFXButton;
import com.jfoenix.controls.JFXComboBox;
import com.jfoenix.controls.JFXProgressBar;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.chart.*;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.ParseException;
import java.time.LocalDate;
import java.time.ZoneId;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.ResourceBundle;

public class ViewStatController implements Initializable
{
    @FXML
    public PieChart pieChart;
    @FXML
    private LineChart<?,?> okChart;
    @FXML
    private CategoryAxis X;
    @FXML
    private NumberAxis Y;
    @FXML
    private JFXButton btnStat;
    @FXML
    private JFXButton btnOutput;
    @FXML
    private JFXButton btnHome;
    @FXML
    private JFXButton inputData;
    @FXML
    private JFXProgressBar progressMesin1;
    @FXML
    private JFXProgressBar progressMesin2;
    @FXML
    private Label persenOK;
    @FXML
    private Label persenMesin2;
    @FXML
    private JFXProgressBar progressMesin3;
    @FXML
    private Label persenMesin3;
    @FXML
    private JFXButton btnFilter;
    @FXML
    private Label lblBulan;
    @FXML
    private Label lblTahun;
    @FXML
    private JFXComboBox<Integer> cbBulan;
    @FXML
    private JFXComboBox cbTahun;
    @FXML
    private JFXButton btnOK;
    @FXML
    private JFXButton btnSemua;
    @FXML
    private JFXButton btnDataProduksi;
    private ObservableList<PieChart.Data> listPiechart = FXCollections.observableArrayList();

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        getPeformaMesin();
        showPieChartData();
        showOkLinechart();
    }

    public void showPieChartData()
    {
        try {
            listPiechart.addAll(new PieChart.Data("Ouput Reject", Pencatatan.getTotalDetailHasilProduksi("Rejected")), new PieChart.Data("Output OK", Pencatatan.getTotalDetailHasilProduksi("OK")));
            pieChart.setData(listPiechart);
        } catch (ParseException e) {
            e.printStackTrace();
        }
    }

    public void showOkLinechart()
    {
        XYChart.Series series = new XYChart.Series();
        series.setName("Output OK");
        XYChart.Series series2 = new XYChart.Series();
        series2.setName("Ouput Rejected");
        try {
            List<DataHasilProduksi> list = new ArrayList<>(Pencatatan.getHasilProduksi());
            BeanComparator bc = new BeanComparator(DataHasilProduksi.class, "getTanggalProduksi");
            Collections.sort(list, bc);
            for (DataHasilProduksi dp : list)
            {
                series.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "OK")));
                series2.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "Rejected")));
            }
            okChart.getData().addAll(series, series2);
        } catch (IOException | ParserConfigurationException | SAXException | ParseException e) {
            e.printStackTrace();
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
    public void btnHomeOnAction(ActionEvent e)
    {
        NavMenu.Home();
        Stage stageToClose = (Stage) btnHome.getScene().getWindow();
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
    public void btnFilterOnAction(ActionEvent ex)
    {
        populateItemToCombo();
        lblBulan.setVisible(true);
        cbBulan.setVisible(true);

        lblTahun.setVisible(true);
        cbTahun.setVisible(true);
        btnOK.setVisible(true);

    }

    public void showPieChartData(int bulan, int tahun)
    {
        listPiechart.addAll(new PieChart.Data("Ouput Reject", Pencatatan.getTotalDetailHasilProduksi(bulan,tahun,"Rejected")), new PieChart.Data("Output OK", Pencatatan.getTotalDetailHasilProduksi(bulan,tahun,"OK")));
        pieChart.setData(listPiechart);
    }

    public void showPieChartData(int tahun)
    {
        listPiechart.addAll(new PieChart.Data("Ouput Reject", Pencatatan.getTotalDetailHasilProduksi(tahun,"Rejected")), new PieChart.Data("Output OK", Pencatatan.getTotalDetailHasilProduksi(tahun,"OK")));
        pieChart.setData(listPiechart);
    }

    public void showLineChartData(int bulan, int tahun)
    {
        XYChart.Series series = new XYChart.Series();
        series.setName("Output OK");
        XYChart.Series series2 = new XYChart.Series();
        series2.setName("Ouput Rejected");
        try {
            List<DataHasilProduksi> list = new ArrayList<>(Pencatatan.getHasilProduksi());
            BeanComparator bc = new BeanComparator(DataHasilProduksi.class, "getTanggalProduksi");
            Collections.sort(list, bc);
            for (DataHasilProduksi dp : list)
            {
                LocalDate locale = dp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getYear() == tahun && locale.getMonthValue() == bulan)
                {
                    series.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "OK")));
                    series2.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "Rejected")));
                }
            }
            okChart.getData().addAll(series, series2);
        } catch (IOException | ParserConfigurationException | SAXException | ParseException e) {
            e.printStackTrace();
        }
    }

    public void showLineChartData(int tahun)
    {
        XYChart.Series series = new XYChart.Series();
        series.setName("Output OK");
        XYChart.Series series2 = new XYChart.Series();
        series2.setName("Ouput Rejected");
        try {
            List<DataHasilProduksi> list = new ArrayList<>(Pencatatan.getHasilProduksi());
            BeanComparator bc = new BeanComparator(DataHasilProduksi.class, "getTanggalProduksi");
            Collections.sort(list, bc);
            for (DataHasilProduksi dp : list)
            {
                LocalDate locale = dp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getYear() == tahun)
                {
                    series.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "OK")));
                    series2.getData().add(new XYChart.Data(dp.getTanggalProduksi().toString(), Pencatatan.getTotalDetailHasilProduksi(dp.getTanggalProduksi(), "Rejected")));
                }
            }
            okChart.getData().addAll(series, series2);
        } catch (IOException | ParserConfigurationException | SAXException | ParseException e) {
            e.printStackTrace();
        }
    }

    public void populateItemToCombo()
    {
        for (int i =0; i<=12;i++)
        {
            cbBulan.getItems().add(i);
        }
        for (int i =2000 ; i<=2020; i++)
        {
            cbTahun.getItems().add(i);
        }

    }

    @FXML
    public void btnOKOnAction(ActionEvent e)
    {
        if(Integer.parseInt(cbBulan.getValue().toString()) != 0)
        {
            pieChart.getData().clear();
            okChart.getData().clear();
            progressMesin1.setProgress(0);
            progressMesin2.setProgress(0);
            progressMesin3.setProgress(0);
            showPieChartData(Integer.parseInt(cbBulan.getValue().toString()), Integer.parseInt(cbTahun.getValue().toString()));
            showLineChartData(Integer.parseInt(cbBulan.getValue().toString()), Integer.parseInt(cbTahun.getValue().toString()));
            getPeformaMesin(Integer.parseInt(cbBulan.getValue().toString()), Integer.parseInt(cbTahun.getValue().toString()));
        }
        else
        {
            okChart.getData().clear();
            progressMesin1.setProgress(0);
            progressMesin2.setProgress(0);
            progressMesin3.setProgress(0);
            pieChart.getData().clear();
            showPieChartData(Integer.parseInt(cbTahun.getValue().toString()));
            showLineChartData(Integer.parseInt(cbTahun.getValue().toString()));
            getPeformaMesin(Integer.parseInt(cbTahun.getValue().toString()));
        }
    }

    @FXML
    public void btnSemuaOnAction(ActionEvent ev)
    {
        okChart.getData().clear();
        pieChart.getData().clear();
        showPieChartData();
        showOkLinechart();
        lblBulan.setVisible(false);
        cbBulan.setVisible(false);

        lblTahun.setVisible(false);
        cbTahun.setVisible(false);
        btnOK.setVisible(false);
    }

    public void getPeformaMesin()
    {
        progressMesin1.setProgress((Statistik.getPeformaMesin("fxPa2") / 100));
        persenOK.setText(Math.round((Statistik.getPeformaMesin("fxPa2")))+" %");

        persenMesin2.setText(Math.round((Statistik.getPeformaMesin("fxPa3")))+" %");
        progressMesin2.setProgress((Statistik.getPeformaMesin("fxPa3") / 100));

        persenMesin3.setText(Math.round((Statistik.getPeformaMesin("fxPa4")))+" %");
        progressMesin3.setProgress((Statistik.getPeformaMesin("fxPa4") / 100));
    }

    public void getPeformaMesin(int bulan, int tahun)
    {
        progressMesin1.setProgress((Statistik.getPeformaMesin(bulan,tahun,"fxPa2") / 100));
        persenOK.setText(Math.round((Statistik.getPeformaMesin(bulan,tahun,"fxPa2")))+" %");

        persenMesin2.setText(Math.round((Statistik.getPeformaMesin(bulan,tahun,"fxPa3")))+" %");
        progressMesin2.setProgress((Statistik.getPeformaMesin(bulan,tahun,"fxPa3") / 100));

        persenMesin3.setText(Math.round((Statistik.getPeformaMesin(bulan,tahun,"fxPa4")))+" %");
        progressMesin3.setProgress((Statistik.getPeformaMesin(bulan,tahun,"fxPa4") / 100));
    }

    public void getPeformaMesin(int tahun)
    {
        progressMesin1.setProgress((Statistik.getPeformaMesin(tahun,"fxPa2") / 100));
        persenOK.setText(Math.round((Statistik.getPeformaMesin(tahun,"fxPa2")))+" %");

        persenMesin2.setText(Math.round((Statistik.getPeformaMesin(tahun,"fxPa3")))+" %");
        progressMesin2.setProgress((Statistik.getPeformaMesin(tahun,"fxPa3") / 100));

        persenMesin3.setText(Math.round((Statistik.getPeformaMesin(tahun,"fxPa4")))+" %");
        progressMesin3.setProgress((Statistik.getPeformaMesin(tahun,"fxPa4") / 100));
    }

    @FXML
    public void btnDataProduksiOnAction(ActionEvent e)
    {
        NavMenu.DataProduksi();
        Stage stageToClose = (Stage) btnDataProduksi.getScene().getWindow();
        stageToClose.close();
    }
}

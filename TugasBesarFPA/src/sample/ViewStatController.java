package sample;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.chart.*;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.ResourceBundle;

public class ViewStatController implements Initializable
{
    @FXML
    private PieChart pieChart;
    @FXML
    private LineChart<?,?> okChart;
    @FXML
    private CategoryAxis X;
    @FXML
    private NumberAxis Y;
    private ObservableList<PieChart.Data> listPiechart = FXCollections.observableArrayList();

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        showPieChartData();
        showOkLinechart();
    }

    public void showPieChartData()
    {
        try {
            listPiechart.addAll(new PieChart.Data("Ouput Reject", Pencatatan.getDetailOuput("Rejected")), new PieChart.Data("Output OK", Pencatatan.getDetailOuput("OK")));
            pieChart.setData(listPiechart);
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        }
    }

    public void showOkLinechart()
    {
        XYChart.Series series = new XYChart.Series();
        XYChart.Series series2 = new XYChart.Series();
        try {
            List<DataProduksi> list = new ArrayList<>(Pencatatan.getAllProduksi());
            BeanComparator bc = new BeanComparator(DataProduksi.class, "getTanggal_Produksi");
            Collections.sort(list, bc);
            for (DataProduksi dp : list)
            {

                if(dp.getKondisi_Barang().equals("OK"))
                {
                    series.getData().add(new XYChart.Data(dp.getShorterDate(dp.getTanggal_Produksi()), Pencatatan.getTotalOuputOKbyDate(dp.getShorterDate(dp.getTanggal_Produksi()))));
                }
                else
                {
                    series2.getData().add(new XYChart.Data(dp.getShorterDate(dp.getTanggal_Produksi()), Pencatatan.getTotalOuputRejectbyDate(dp.getShorterDate(dp.getTanggal_Produksi()))));
                }

            }
            okChart.getData().addAll(series, series2);
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        }
    }

}

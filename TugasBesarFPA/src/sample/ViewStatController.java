package sample;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.chart.PieChart;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;

public class ViewStatController implements Initializable
{
    @FXML
    private PieChart pieChart;
    private ObservableList<PieChart.Data> listPiechart = FXCollections.observableArrayList();

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
        showPieChartData();
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
}

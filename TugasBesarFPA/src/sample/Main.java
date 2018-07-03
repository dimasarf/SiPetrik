package sample;

import com.thoughtworks.xstream.XStream;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.TransformerException;
import java.beans.XMLEncoder;
import java.io.BufferedOutputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Date;
import java.util.List;


public class Main extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception{
        Parent root = FXMLLoader.load(getClass().getResource("inputProduksi.fxml"));
        primaryStage.setTitle("Hello World");
        primaryStage.setScene(new Scene(root));
        primaryStage.show();

    }


    public static void main(String[] args) throws ParserConfigurationException, SAXException, IOException, TransformerException {
        launch(args);
        /*List<Integer> dummy = new ArrayList<>();
        for (int i=1; i<40; i++)
        {
            dummy.add(i);
        }
        for (int i=40; i>0; i--)
        {
            dummy.add(i);
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
        List<DataInterval> listDi = new ArrayList<>();
        System.out.println(listDi.size());
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

        System.out.println(dummy);
        for (DataInterval di: listDi)
        {
            System.out.println(di.getBatasBawah() + "    "+ di.getBatasAtas()+"         "+di.getFrekuensi());
        }*/
    }
}

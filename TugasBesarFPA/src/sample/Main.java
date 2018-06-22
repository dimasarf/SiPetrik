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
import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.List;


public class Main extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception{
        Parent root = FXMLLoader.load(getClass().getResource("ViewOutputMesin.fxml"));
        primaryStage.setTitle("Hello World");
        primaryStage.setScene(new Scene(root));
        primaryStage.show();
    }


    public static void main(String[] args) throws ParserConfigurationException, SAXException, IOException, TransformerException {
        //Mesin mesin1 = new Mesin("fxPa3");
        //Pencatatan.CatatMesinBaru(mesin1);
       // Mesin mesin2 = new Mesin("fxpa2");
        //Pencatatan.CatatMesinBaru(mesin2);
        //Mesin mesin3 = new Mesin("fxpa3");
        //Pencatatan.CatatMesinBaru(mesin3);
        //System.out.println(5/2);
        launch(args);

    }
}

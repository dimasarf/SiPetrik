package sample;

import com.thoughtworks.xstream.XStream;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.List;


public class Main extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception{
        Parent root = FXMLLoader.load(getClass().getResource("sample.fxml"));
        primaryStage.setTitle("Hello World");
        primaryStage.setScene(new Scene(root, 300, 275));
        primaryStage.show();
    }


    public static void main(String[] args)
    {
        /*Mesin mesin1 = new Mesin("fxPa1");
        mesin1.produksiBarang(true);
        Mesin mesin2 = new Mesin("fxpa2");
        mesin2.produksiBarang(false);
        Mesin mesin3 = new Mesin("fxpa3");
        mesin3.produksiBarang(true);
        System.out.println("tes");*/
        launch(args);

    }
}

package sample;

import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class NavMenu
{
    public static void Home()
    {
        Parent root;
        ViewDataController.dataToDisplay = "Rejected";
        try
        {
            root = FXMLLoader.load(NavMenu.class.getResource("HomeView.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    public static void TambahData()
    {
        Parent root;
        ViewDataController.dataToDisplay = "Rejected";
        try
        {
            root = FXMLLoader.load(NavMenu.class.getResource("inputProduksi.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    public static void OutputMesin()
    {
        Parent root;
        ViewDataController.dataToDisplay = "Rejected";
        try
        {
            root = FXMLLoader.load(NavMenu.class.getResource("ViewOutputMesin.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    public static void Statistik()
    {
        Parent root;
        ViewDataController.dataToDisplay = "Rejected";
        try
        {
            root = FXMLLoader.load(NavMenu.class.getResource("ViewStat.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }

    public static void DataProduksi()
    {
        Parent root;
        try
        {
            root = FXMLLoader.load(NavMenu.class.getResource("ViewDataInterval.fxml"));
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.show();
        }
        catch (IOException e)
        {
            System.out.println(e.getMessage());
        }
    }
}

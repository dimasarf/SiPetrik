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
            root = FXMLLoader.load(NavMenu.class.getResource("InputDataView.fxml"));
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

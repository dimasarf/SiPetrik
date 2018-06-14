package sample;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class Controller
{
    @FXML
    private void btnKlikAction(ActionEvent event) throws IOException
    {
        Parent root;
        try
        {
            root = FXMLLoader.load(getClass().getResource("HomeView.fxml"));
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

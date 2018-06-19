package sample;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;

public class HomeViewController
{

    @FXML
    private void TotalProduksiMouseClicked(ActionEvent event)
    {
        try {
            System.out.println("Eh Diklik");
        }
        catch (IllegalArgumentException e)
        {
            System.out.println(e.getMessage());
        }
    }
}

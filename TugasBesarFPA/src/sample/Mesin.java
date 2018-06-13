package sample;

import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;

public class Mesin {
    private String nama;

    public Mesin(String Nama)
    {
        this.nama = Nama;
    }

    public String getNama() {
        return nama;
    }

    public void produksiBarang(boolean status)
    {
        Barang barang = new Barang(this.nama +"1", status);
        Pencatatan catatan = new Pencatatan(this, barang);
        try {
            catatan.catatProduksi();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        }
    }
}

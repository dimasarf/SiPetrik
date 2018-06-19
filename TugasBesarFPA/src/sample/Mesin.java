package sample;

import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.TransformerException;
import java.io.IOException;
import java.util.Date;

public class Mesin {
    private String nama;

    public Mesin(String Nama)
    {
        this.nama = Nama;
    }

    public String getNama() {
        return nama;
    }

    public void produksiBarang(boolean status, String namaBarang, Date date) throws IOException, SAXException {
        Barang barang = new Barang(namaBarang +"1", status);
        Pencatatan catatan = new Pencatatan(this, barang, date);
        try {
            catatan.catatProduksi();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        }
    }
}

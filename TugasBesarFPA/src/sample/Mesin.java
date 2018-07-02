package sample;

import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.TransformerException;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Mesin {
    private String nama;

    public Mesin(String Nama)
    {
        this.nama = Nama;
    }

    public String getNama() {
        return nama;
    }

    public void produksiBarang(boolean status, String namaBarang, Date date, String shift) throws IOException, SAXException {
        Barang barang = new Barang(namaBarang, status);
        Pencatatan catatan = new Pencatatan(this, barang, date, shift);
        try {
            catatan.catatProduksi();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        }
    }

    public List<DataProduksi> produceItem(boolean status, String namaBarang, Date date)
    {
        List<DataProduksi> listDp = new ArrayList<>();
        Barang barang = new Barang(namaBarang , status);
        DataProduksi dp = new DataProduksi(namaBarang, date, this.nama, status);
        return listDp;
    }
}

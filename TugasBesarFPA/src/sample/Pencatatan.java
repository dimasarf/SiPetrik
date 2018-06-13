package sample;

import com.thoughtworks.xstream.XStream;
import com.thoughtworks.xstream.io.xml.StaxDriver;

import java.io.FileOutputStream;
import java.util.Date;

public class Pencatatan
{
    private Mesin mesin;
    private Barang barang;
    private Date date;

    public Pencatatan(Mesin mesin, Barang barang) {
        this.mesin = mesin;
        this.barang = barang;
        this.date = new Date();
    }

    public void catatProduksi()
    {
        XStream stream = new XStream(new StaxDriver());
        stream.alias("Mesin", Mesin.class);
        stream.alias("Barang", Barang.class);
        String xml = stream.toXML(this);
        FileOutputStream fos = null;
        try
        {
            fos = new FileOutputStream("dataMesin");
            byte[] bytes = xml.getBytes();
            fos.write(bytes);
        }
        catch (Exception e)
        {
            System.out.println("Terjadi Kesalahan");
        }
    }


}

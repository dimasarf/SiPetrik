package sample;

import java.util.Date;

public class CatatanProduksi
{
    private String idBarang, status, shif;
    private Date tgl;
    private boolean kondisi;

    public  CatatanProduksi(boolean status, String idBarang, Date tanggal, String shif)
    {
        this.status = status? "OK" : "Rejected";
        this.idBarang = idBarang;
        this.tgl = tanggal;
        this.shif = shif;
        this.kondisi = status;
    }

    public String getIdBarang() {
        return idBarang;
    }

    public Date getTgl() {
        return tgl;
    }

    public String getShif() {
        return shif;
    }

    public String getStatus() {
        return status;
    }

    public boolean getKondisi() {
        return kondisi;
    }
}

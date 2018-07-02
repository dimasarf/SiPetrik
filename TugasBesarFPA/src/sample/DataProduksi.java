package sample;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class DataProduksi
{
    private String Id_Barang, Mesin, Kondisi_Barang, Tanggal_Produksi;
    private Date tglProduksi;

    public DataProduksi()
    {

    }
    public DataProduksi(String namaBarang, Date date, String mesin, boolean status)
    {
        this.Id_Barang = namaBarang;
        this.tglProduksi = date;
        this.Mesin = mesin;
        this.Kondisi_Barang = status ? "OK" : "Rejected";
        this.Tanggal_Produksi = String.valueOf(tglProduksi);
    }

    public String getIdBarang() {
        return Id_Barang;
    }

    public void setIdBarang(String idBarang) {
        this.Id_Barang = idBarang;
    }

    public String getMesin() {
        return Mesin;
    }

    public String getKondisi_Barang() {
        return Kondisi_Barang;
    }

    public void setTglProduksi(String tglProduksi) {
        Tanggal_Produksi = tglProduksi;
        setTglProduksi();
    }

    public void setKondisi_Barang(String kondisi_Barang) {
        Kondisi_Barang = kondisi_Barang;
    }

    public String getTglProduksi()
    {
        return Tanggal_Produksi;
    }

    public void setMesin(String mesin) {
        Mesin = mesin;
    }

    @Override
    public String toString() {
        return this.getMesin()+"   "+ getTanggal_Produksi()+"   "+ getKondisi_Barang();
    }

    public void setTglProduksi()
    {
        try {
            this.tglProduksi = new SimpleDateFormat("EEE MMM dd HH:mm:ss zzz yyyy").parse(Tanggal_Produksi);
        } catch (ParseException e) {
            e.printStackTrace();
        }
    }

    public Date getTanggal_Produksi() {
        return tglProduksi;
    }

    public String getShorterDate(Date tgl)
    {
        String date;
        SimpleDateFormat simpleDateFormat = new SimpleDateFormat("dd/MM/yyyy");
        date = simpleDateFormat.format(tgl);
        return date;
    }
}

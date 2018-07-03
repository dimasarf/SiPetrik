package sample;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.format.DateTimeFormatter;
import java.util.Date;

public class DataHasilProduksi
{
    private String namaMesin;
    private int targetProduksi, shift, hasilReject, hasilOK;
    private Date tanggalProduksi;

    public DataHasilProduksi(String namaMesin, int targetProduksi, int shift, int hasilReject, int hasilOK, Date tanggalProduksi)
    {
        this.namaMesin = namaMesin;
        this.targetProduksi = targetProduksi;
        this.shift = shift;
        this.hasilReject = hasilReject;
        this.hasilOK = hasilOK;
        this.tanggalProduksi = tanggalProduksi;
    }

    public DataHasilProduksi() {

    }

    public Date getTanggalProduksi() {
      return tanggalProduksi;
    }

    public String getTglProduksi() {
        String tanggal = new SimpleDateFormat("dd-MMMM-yyyy").format(tanggalProduksi);
        return tanggal;
    }

    public int getHasilOK() {
        return hasilOK;
    }

    public int getHasilReject() {
        return hasilReject;
    }

    public String getNamaMesin() {
        return namaMesin;
    }

    public int getTargetProduksi() {
        return targetProduksi;
    }

    public int getShift() {
        return shift;
    }

    public void setHasilOK(int hasilOK) {
        this.hasilOK = hasilOK;
    }

    public void setHasilReject(int hasilReject) {
        this.hasilReject = hasilReject;
    }

    public void setNamaMesin(String namaMesin) {
        this.namaMesin = namaMesin;
    }

    public void setShift(int shift) {
        this.shift = shift;
    }

    public void setTanggalProduksi(Date tanggalProduksi) {
        this.tanggalProduksi = tanggalProduksi;
    }

    public void setTargetProduksi(int targetProduksi) {
        this.targetProduksi = targetProduksi;
    }
}

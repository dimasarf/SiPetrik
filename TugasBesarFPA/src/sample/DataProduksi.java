package sample;

public class DataProduksi
{
    private String Id_Barang, Mesin, Kondisi_Barang, Tanggal_Produksi;

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
    }

    public void setKondisi_Barang(String kondisi_Barang) {
        Kondisi_Barang = kondisi_Barang;
    }

    public String getTglProduksi() {
        return Tanggal_Produksi;
    }

    public void setMesin(String mesin) {
        Mesin = mesin;
    }

    @Override
    public String toString() {
        return this.getIdBarang();
    }
}

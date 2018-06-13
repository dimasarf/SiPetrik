package sample;

public class Mesin {
    private String nama;

    public Mesin(String Nama)
    {
        this.nama = Nama;
    }

    public void produksiBarang(boolean status)
    {
        Barang barang = new Barang(this.nama +"1", status);
        Pencatatan catat = new Pencatatan(this, barang);
        catat.catatProduksi();
    }
}

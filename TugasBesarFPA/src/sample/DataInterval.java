package sample;

public class DataInterval
{
    private int frekuensi, batasAtas, batasBawah;

    public int getBatasAtas() {
        return batasAtas;
    }

    public int getBatasBawah() {
        return batasBawah;
    }

    public int getFrekuensi() {
        return frekuensi;
    }

    public void setBatasAtas(int batasAtas) {
        this.batasAtas = batasAtas;
    }

    public void setBatasBawah(int batasBawah) {
        this.batasBawah = batasBawah;
    }

    public void setFrekuensi(int frekuensi) {
        this.frekuensi += frekuensi;
    }
}

package sample;

public class OutputMesin
{
    public String Mesin;
    public int JumlahBarangOK = 0, JumlahBarangReject =0;

    public OutputMesin(String mesin)
    {
        this.Mesin = mesin;
    }

    public void setJumlahBarangOK(int jumlahBarangOK) {
        JumlahBarangOK += jumlahBarangOK;
    }

    public void setJumlahBarangReject(int jumlahBarangReject) {
        JumlahBarangReject += jumlahBarangReject;
    }



    public String getMesin() {
        return Mesin;
    }

    public int getJumlahBarangOK() {
        return JumlahBarangOK;
    }

    public int getJumlahBarangReject() {
        return JumlahBarangReject;
    }

    @Override
    public String toString() {
        return this.Mesin +" "+this.JumlahBarangOK+" "+this.JumlahBarangReject;
    }
}

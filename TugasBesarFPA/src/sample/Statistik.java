package sample;

import java.util.Collections;
import java.util.List;

public class Statistik
{
    public static double HitungRata2OK(List<OutputMesin> list)
    {
        double n = list.size();
        double jumlah = 0;
        double rata2;
        for (OutputMesin om: list)
        {
            jumlah += om.getJumlahBarangOK();
        }
        rata2 = jumlah/ n;
        return rata2;
    }

    public static double HitungRata2Reject(List<OutputMesin> list)
    {
        double n = list.size();
        double jumlah = 0;
        double rata2;
        for (OutputMesin om: list)
        {
            jumlah += om.getJumlahBarangReject();
        }
        rata2 = jumlah/ n;
        return rata2;
    }

    public static double medianOuputOk(List<OutputMesin> list)
    {
        double median = 0;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangOK");
        Collections.sort(list, bc);
        if(list.size()%2 == 0)
        {
            median = (list.get(list.size()/2).getJumlahBarangOK() + list.get(list.size()/2 -1 ).getJumlahBarangOK())/2;
        }
        else
        {
            median = (list.get(list.size()/2).getJumlahBarangOK());
        }
        return median;
    }


    public static double medianOuputReject(List<OutputMesin> list)
    {
        double median = 0;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangReject");
        Collections.sort(list, bc);
        if(list.size()%2 == 0)
        {
            median = (list.get(list.size()/2).getJumlahBarangReject() + list.get(list.size()/2 -1 ).getJumlahBarangReject())/2;
        }
        else
        {
            median = (list.get(list.size()/2).getJumlahBarangReject())/2;
        }
        return median;
    }


}

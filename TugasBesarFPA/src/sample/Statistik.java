package sample;

import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
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
        List<OutputMesin> list2 = list;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangOK");
        Collections.sort(list2, bc);
        if(list2.size()%2 == 0)
        {
            median = (list2.get(list2.size()/2).getJumlahBarangOK() + list2.get(list2.size()/2 -1 ).getJumlahBarangOK())/2;
        }
        else
        {
            median = (list2.get(list2.size()/2).getJumlahBarangOK());
        }
        return Math.round(median);
    }


    public static double medianOuputReject(List<OutputMesin> list)
    {
        double median = 0;
        List<OutputMesin> list2 = list;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangReject");
        Collections.sort(list2, bc);
        if(list2.size()%2 == 0)
        {
            median = (list2.get(list2.size()/2).getJumlahBarangReject() + list2.get(list2.size()/2 -1 ).getJumlahBarangReject())/2;
        }
        else
        {
            median = (list2.get(list2.size()/2).getJumlahBarangReject());
        }
        return Math.round(median);
    }

    public static OutputMesin getModusReject(List<OutputMesin> list)
    {
        List<OutputMesin> list2 = list;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangReject");
        Collections.sort(list2, bc);
        return list2.get(list2.size() - 1 );
    }

    public static double getP90OK(List<OutputMesin> list)
    {
        List<OutputMesin> list2 = list;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangOK");
        Collections.sort(list2, bc);
        double letak = (90 * (list2.size()))/100;
        int a = (int) letak;
        double b = letak - a;

        return  0;
    }

    public static OutputMesin getModusOk(List<OutputMesin> list)
    {
        List<OutputMesin> list2 = list;
        BeanComparator bc = new BeanComparator(OutputMesin.class, "getJumlahBarangOK");
        Collections.sort(list2, bc);
        return list2.get(list2.size() - 1 );
    }

    public static double getPersentase(String Kondisi)
    {
        double persen = 0;
        try {
            persen = ((double) Pencatatan.getDetailOuput(Kondisi) / Pencatatan.getTotalProduksi()) * 100;

        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        }
        return  persen;
    }

}

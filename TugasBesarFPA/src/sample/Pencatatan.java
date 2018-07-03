package sample;

import com.thoughtworks.xstream.XStream;
import com.thoughtworks.xstream.io.xml.StaxDriver;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.lang.model.element.Element;
import javax.swing.text.Document;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerConfigurationException;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.ZoneId;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Locale;

public class Pencatatan
{
    private Mesin mesin;
    private Barang barang;
    private Date date;
    private String shift;

    public Pencatatan(Mesin mesin, Barang barang, Date date) {
        this.mesin = mesin;
        this.barang = barang;
        this.date = date;
        System.out.println(date);
    }
    public Pencatatan(Mesin mesin, Barang barang, Date date, String shif) {
        this.mesin = mesin;
        this.barang = barang;
        this.date = date;
        this.shift = shif;
    }



    public Barang getBarang() {
        return barang;
    }

    public Mesin getMesin() {
        return mesin;
    }

    public Date getDate() {
        return date;
    }

    public void catatProduksi() throws ParserConfigurationException, IOException, SAXException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataProduksiBaru.xml");
        org.w3c.dom.Element root = doc.getDocumentElement();

        List<Pencatatan> pencatatanList = new ArrayList<>();
        pencatatanList.add(this);
        try
        {
            for (Pencatatan catatan: pencatatanList)
            {
                org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");

                org.w3c.dom.Element produksi = doc.createElement("Produksi");
                rootElement.appendChild(produksi);

                org.w3c.dom.Element mesin = doc.createElement("Mesin");
                mesin.appendChild(doc.createTextNode(catatan.getMesin().getNama()));
                produksi.appendChild(mesin);

                org.w3c.dom.Element idBarang = doc.createElement("Id_Barang");
                idBarang.appendChild(doc.createTextNode(catatan.getBarang().getId()));
                produksi.appendChild(idBarang);

                org.w3c.dom.Element kondisiBarang = doc.createElement("Kondisi_Barang");
                kondisiBarang.appendChild(doc.createTextNode(catatan.getBarang().getCondition()));
                produksi.appendChild(kondisiBarang);

                org.w3c.dom.Element tanggal = doc.createElement("Tanggal_Produksi");
                tanggal.appendChild(doc.createTextNode(catatan.getDate().toString()));
                produksi.appendChild(tanggal);

                root.appendChild(produksi);
            }

            TransformerFactory transformerFactory = TransformerFactory.newInstance();
            Transformer transformer = transformerFactory.newTransformer();
            DOMSource source = new DOMSource(doc);
            StreamResult result = new StreamResult(new File("dataProduksiBaru.xml"));

            transformer.transform(source, result);

        } catch (TransformerConfigurationException exx) {
            System.out.println(exx.getMessage());
        } catch (TransformerException exxx) {
            System.out.println(exxx.getMessage());
        }
    }

    public static void CatatHasilProduksiBaruBanget(DataHasilProduksi catatan) throws TransformerException, ParserConfigurationException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.newDocument();
        org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");
        doc.appendChild(rootElement);

        org.w3c.dom.Element produksi = doc.createElement("Produksi");
        rootElement.appendChild(produksi);

        org.w3c.dom.Element mesin = doc.createElement("Mesin");
        mesin.appendChild(doc.createTextNode(catatan.getNamaMesin()));
        produksi.appendChild(mesin);

        org.w3c.dom.Element target = doc.createElement("Target");
        target.appendChild(doc.createTextNode(String.valueOf(catatan.getTargetProduksi())));
        produksi.appendChild(target);

        org.w3c.dom.Element shift = doc.createElement("Shift");
        shift.appendChild(doc.createTextNode(String.valueOf(catatan.getShift())));
        produksi.appendChild(shift);

        org.w3c.dom.Element hasilOK = doc.createElement("Hasil_OK");
        hasilOK.appendChild(doc.createTextNode(String.valueOf(catatan.getHasilOK())));
        produksi.appendChild(hasilOK);

        org.w3c.dom.Element hasilReject = doc.createElement("Hasil_Reject");
        hasilReject.appendChild(doc.createTextNode(String.valueOf(catatan.getHasilReject())));
        produksi.appendChild(hasilReject);

        org.w3c.dom.Element tanggal = doc.createElement("Tanggal_Produksi");
        tanggal.appendChild(doc.createTextNode(String.valueOf(catatan.getTanggalProduksi())));
        produksi.appendChild(tanggal);

        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        DOMSource source = new DOMSource(doc);
        StreamResult result = new StreamResult(new File("dataHasilProduksi.xml"));

        transformer.transform(source, result);
    }

    public static void CatatHasilProduksi(DataHasilProduksi hasil) throws IOException, SAXException, ParserConfigurationException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataHasilProduksi.xml");
        org.w3c.dom.Element root = doc.getDocumentElement();

        List<DataHasilProduksi> pencatatanList = new ArrayList<>();
        pencatatanList.add(hasil);
        try
        {
            for (DataHasilProduksi catatan: pencatatanList)
            {
                org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");

                org.w3c.dom.Element produksi = doc.createElement("Produksi");
                rootElement.appendChild(produksi);

                org.w3c.dom.Element mesin = doc.createElement("Mesin");
                mesin.appendChild(doc.createTextNode(catatan.getNamaMesin()));
                produksi.appendChild(mesin);

                org.w3c.dom.Element target = doc.createElement("Target");
                target.appendChild(doc.createTextNode(String.valueOf(catatan.getTargetProduksi())));
                produksi.appendChild(target);

                org.w3c.dom.Element shift = doc.createElement("Shift");
                shift.appendChild(doc.createTextNode(String.valueOf(catatan.getShift())));
                produksi.appendChild(shift);

                org.w3c.dom.Element hasilOK = doc.createElement("Hasil_OK");
                hasilOK.appendChild(doc.createTextNode(String.valueOf(catatan.getHasilOK())));
                produksi.appendChild(hasilOK);

                org.w3c.dom.Element hasilReject = doc.createElement("Hasil_Reject");
                hasilReject.appendChild(doc.createTextNode(String.valueOf(catatan.getHasilReject())));
                produksi.appendChild(hasilReject);

                org.w3c.dom.Element tanggal = doc.createElement("Tanggal_Produksi");
                tanggal.appendChild(doc.createTextNode(String.valueOf(catatan.getTanggalProduksi())));
                produksi.appendChild(tanggal);

                root.appendChild(produksi);
            }

            TransformerFactory transformerFactory = TransformerFactory.newInstance();
            Transformer transformer = transformerFactory.newTransformer();
            DOMSource source = new DOMSource(doc);
            StreamResult result = new StreamResult(new File("dataHasilProduksi.xml"));

            transformer.transform(source, result);

        } catch (TransformerConfigurationException exx) {
            System.out.println(exx.getMessage());
        } catch (TransformerException exxx) {
            System.out.println(exxx.getMessage());
        }
    }

    public static void CatatMesinBaru(Mesin mesin) throws IOException, SAXException, ParserConfigurationException {
        XStream stream = new XStream(new StaxDriver());
        stream.alias("Mesin", Mesin.class);
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataMesin.xml");
        org.w3c.dom.Element root = doc.getDocumentElement();

        List<Mesin> pencatatanList = new ArrayList<>();
        pencatatanList.add(mesin);
        try
        {
            for (Mesin catatan: pencatatanList)
            {
                org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");

                org.w3c.dom.Element Mesin = doc.createElement("Mesin");

                Mesin.appendChild(doc.createTextNode(catatan.getNama()));

                root.appendChild(Mesin);
            }

            TransformerFactory transformerFactory = TransformerFactory.newInstance();
            Transformer transformer = transformerFactory.newTransformer();
            DOMSource source = new DOMSource(doc);
            StreamResult result = new StreamResult(new File("dataMesin.xml"));

            transformer.transform(source, result);

        }
        catch (TransformerConfigurationException exx)
        {
            System.out.println(exx.getMessage());
        } catch (TransformerException exxx)
        {
            System.out.println(exxx.getMessage());
        }

    }

    public static void CatatMesinBaruBanget(Mesin mesin) throws IOException, SAXException, ParserConfigurationException, TransformerException {

        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.newDocument();
        org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");
        doc.appendChild(rootElement);

        org.w3c.dom.Element Mesin = doc.createElement("Mesin");
        rootElement.appendChild(Mesin);
        Mesin.appendChild(doc.createTextNode(mesin.getNama()));

        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        DOMSource source = new DOMSource(doc);
        StreamResult result = new StreamResult(new File("dataMesin.xml"));

        transformer.transform(source, result);

    }

    public void catatProduksiBaruBanget() throws ParserConfigurationException, TransformerException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.newDocument();
        org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");
        doc.appendChild(rootElement);

        org.w3c.dom.Element produksi = doc.createElement("Produksi");
        rootElement.appendChild(produksi);

        org.w3c.dom.Element mesin = doc.createElement("Mesin");
        mesin.appendChild(doc.createTextNode(this.mesin.getNama()));
        produksi.appendChild(mesin);

        org.w3c.dom.Element idBarang = doc.createElement("Id_Barang");
        idBarang.appendChild(doc.createTextNode(this.barang.getId()));
        produksi.appendChild(idBarang);

        org.w3c.dom.Element kondisiBarang = doc.createElement("Kondisi_Barang");
        kondisiBarang.appendChild(doc.createTextNode(this.barang.getCondition()));
        produksi.appendChild(kondisiBarang);

        org.w3c.dom.Element shif = doc.createElement("Shift");
        kondisiBarang.appendChild(doc.createTextNode(this.shift));
        produksi.appendChild(shif);

        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        DOMSource source = new DOMSource(doc);
        StreamResult result = new StreamResult(new File("dataProduksiBaru.xml"));

        transformer.transform(source, result);
    }

    public static int getTotalProduksi() throws IOException, SAXException, ParserConfigurationException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataProduksi.xml");
        NodeList produksi = doc.getElementsByTagName("Produksi");
        return produksi.getLength();
    }

    public static int getDetailOuput(String Kondisi) throws ParserConfigurationException, IOException, SAXException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataProduksi.xml");
        NodeList produksi = doc.getElementsByTagName("Produksi");
        int nOuputOk = 0;

        for (int i=0; i<produksi.getLength(); i++)
        {
            Node node = produksi.item(i);
            org.w3c.dom.Element elemen = (org.w3c.dom.Element) node;
            String kondisi = elemen.getElementsByTagName("Kondisi_Barang").item(0).getTextContent();
            System.out.println(kondisi);
            if(kondisi.equals(Kondisi))
                nOuputOk+=1;
        }
        return nOuputOk;
    }

    public static ObservableList<DataProduksi> getAllProduksi() throws IOException, SAXException, ParserConfigurationException {
        ObservableList<DataProduksi> listProduksi =FXCollections.observableArrayList();
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataProduksi.xml");
        NodeList produksi = doc.getElementsByTagName("Produksi");
        for (int i=0; i<produksi.getLength(); i++)
        {
            DataProduksi dp = new DataProduksi();
            Node node = produksi.item(i);
            org.w3c.dom.Element elemen = (org.w3c.dom.Element) node;
            dp.setMesin(elemen.getElementsByTagName("Mesin").item(0).getTextContent());
            dp.setIdBarang(elemen.getElementsByTagName("Id_Barang").item(0).getTextContent());
            dp.setKondisi_Barang(elemen.getElementsByTagName("Kondisi_Barang").item(0).getTextContent());
            dp.setTglProduksi(elemen.getElementsByTagName("Tanggal_Produksi").item(0).getTextContent());
            listProduksi.add(dp);
        }
        return listProduksi;
    }

    public static int getTotalOuputOKbyDate(String date)
    {
        int banyakBarangOk = 0;
        String tglProduksi;
        SimpleDateFormat simpleDateFormat = new SimpleDateFormat("dd/MM/yyyy");
        try {
            for (DataProduksi dp: Pencatatan.getAllProduksi())
            {
                Date tglProduksi2 = new SimpleDateFormat("EEE MMM dd HH:mm:ss zzz yyyy").parse(dp.getTglProduksi());
                tglProduksi = simpleDateFormat.format(tglProduksi2);
                if(tglProduksi.equals(date) && dp.getKondisi_Barang().equals("OK"))
                    banyakBarangOk++;
            }
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (ParseException e) {
            e.printStackTrace();
        }
        return banyakBarangOk;
    }

    public static int getTotalOuputRejectbyDate(String date)
    {
        int banyakBarangOk = 0;
        String tglProduksi;
        SimpleDateFormat simpleDateFormat = new SimpleDateFormat("dd/MM/yyyy");
        try {
            for (DataProduksi dp: Pencatatan.getAllProduksi())
            {
                Date tglProduksi2 = new SimpleDateFormat("EEE MMM dd HH:mm:ss zzz yyyy").parse(dp.getTglProduksi());
                tglProduksi = simpleDateFormat.format(tglProduksi2);
                System.out.println(tglProduksi);
                if(tglProduksi.equals(date) && dp.getKondisi_Barang().equals("Rejected"))
                    banyakBarangOk++;
            }
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (ParseException e) {
            e.printStackTrace();
        }
        return banyakBarangOk;
    }

    public static ObservableList<DataHasilProduksi> getHasilProduksi() throws ParserConfigurationException, IOException, SAXException, ParseException {
        ObservableList<DataHasilProduksi> listProduksi =FXCollections.observableArrayList();
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataHasilProduksi.xml");
        NodeList produksi = doc.getElementsByTagName("Produksi");
        for (int i =0; i <produksi.getLength(); i++)
        {
            DataHasilProduksi dhp = new DataHasilProduksi();
            Node node = produksi.item(i);
            org.w3c.dom.Element elemen = (org.w3c.dom.Element) node;
            dhp.setNamaMesin(elemen.getElementsByTagName("Mesin").item(0).getTextContent());
            dhp.setTargetProduksi(Integer.parseInt(elemen.getElementsByTagName("Target").item(0).getTextContent()));
            dhp.setShift(Integer.parseInt(elemen.getElementsByTagName("Shift").item(0).getTextContent()));
            dhp.setHasilOK(Integer.parseInt(elemen.getElementsByTagName("Hasil_OK").item(0).getTextContent()));
            dhp.setHasilReject(Integer.parseInt(elemen.getElementsByTagName("Hasil_Reject").item(0).getTextContent()));
            Date tglProduksi2 = new SimpleDateFormat("EEE MMM dd HH:mm:ss zzz yyyy").parse(elemen.getElementsByTagName("Tanggal_Produksi").item(0).getTextContent());
            dhp.setTanggalProduksi(tglProduksi2);
            listProduksi.add(dhp);
        }
        return listProduksi;
    }

    public static int getTotalHasilProduksi()
    {
        int total = 0;
        try {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi()) {
                total += dhp.getHasilOK() + dhp.getHasilReject();
            }
        } catch (ParserConfigurationException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (ParseException e) {
            e.printStackTrace();
        }

        return total;
    }

    public static int getTotalDetailHasilProduksi(String Kondisi) throws ParseException {
        int total =0;
        try {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi()) {
                if(Kondisi.equals("OK"))
                    total += dhp.getHasilOK();
                else
                    total += dhp.getHasilReject();
            }
        } catch (ParserConfigurationException | IOException | SAXException e) {
            e.printStackTrace();
        }
        return total;
    }

    public static int getTotalTarget(String mesin)
    {
        int totalTarget = 0;
        try {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                if(dhp.getNamaMesin().equals(mesin))
                    totalTarget += dhp.getTargetProduksi();

            }
        } catch (ParserConfigurationException | IOException | ParseException | SAXException e) {
            e.printStackTrace();
        }
        return totalTarget;
    }

    public static int getTotalDetailHasilProduksi(int bulan, int tahun, String Kondisi)
    {
        int total =0;
        try
        {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getMonthValue() == bulan && locale.getYear() == tahun)
                {
                    if (Kondisi.equals("OK"))
                        total += dhp.getHasilOK();
                    else
                        total += dhp.getHasilReject();
                }

            }
        } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
            e.printStackTrace();
        }
        return total;
    }

    public static int getTotalDetailHasilProduksi(int tahun, String Kondisi)
    {
        int total =0;
        try
        {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getYear() == tahun)
                {
                    if (Kondisi.equals("OK"))
                        total += dhp.getHasilOK();
                    else
                        total += dhp.getHasilReject();
                }

            }
        } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
            e.printStackTrace();
        }
        return total;
    }

    public static int getTotalDetailHasilProduksi(Date tgl , String Kondisi)
    {
        int total =0;
        try
        {
            SimpleDateFormat sdf = new SimpleDateFormat("dd/mm/yyyy");
            String tgl1 = sdf.format(tgl);
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                String tgl2 = sdf.format(dhp.getTanggalProduksi());
                if(tgl1.equals(tgl2))
                {
                    if (Kondisi.equals("OK"))
                        total += dhp.getHasilOK();
                    else
                        total += dhp.getHasilReject();
                }

            }
        } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
            e.printStackTrace();
        }

        return total;
    }

    public static int getTotalTarget(int bulan, int tahun, String Mesin)
    {
        int totalTarget = 0;
        try {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getMonthValue() == bulan && locale.getYear() == tahun && dhp.getNamaMesin().equals(Mesin))
                {
                    totalTarget += dhp.getTargetProduksi();
                }


            }
        } catch (ParserConfigurationException | IOException | ParseException | SAXException e) {
            e.printStackTrace();
        }
        return totalTarget;
    }

    public static int getTotalTarget(int tahun, String Mesin)
    {
        int totalTarget = 0;
        try {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(locale.getYear() == tahun && dhp.getNamaMesin().equals(Mesin))
                {
                    totalTarget += dhp.getTargetProduksi();
                }


            }
        } catch (ParserConfigurationException | IOException | ParseException | SAXException e) {
            e.printStackTrace();
        }
        return totalTarget;
    }

    public static double getTotalDetailHasilProduksi(String mesin, String Kondisi)
    {
        int total =0;
        try
        {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(dhp.getNamaMesin().equals(mesin))
                {
                    if (Kondisi.equals("OK"))
                        total += dhp.getHasilOK();
                    else
                        total += dhp.getHasilReject();
                }

            }
        } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
            e.printStackTrace();
        }
        return total;
    }

    public static double getTotalDetailHasilProduksi(int bulan, int tahun, String mesin, String Kondisi)
    {
        int total =0;
        try
        {
            for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
            {
                LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
                if(dhp.getNamaMesin().equals(mesin)&& locale.getMonthValue() == bulan && locale.getYear() == tahun)
                {
                    if (Kondisi.equals("OK"))
                        total += dhp.getHasilOK();
                    else
                        total += dhp.getHasilReject();
                }

            }
        } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
            e.printStackTrace();
        }
        return total;
    }

    public static double getTotalDetailHslProduksi(int tahun, String mesin, String Kondisi)
    {
    int total =0;
    try
    {
        for (DataHasilProduksi dhp : Pencatatan.getHasilProduksi())
        {
            LocalDate locale = dhp.getTanggalProduksi().toInstant().atZone(ZoneId.systemDefault()).toLocalDate();
            if(dhp.getNamaMesin().equals(mesin)&& locale.getYear() == tahun)
            {
                if (Kondisi.equals("OK"))
                    total += dhp.getHasilOK();
                else
                    total += dhp.getHasilReject();
            }

        }
    } catch (ParserConfigurationException | IOException | SAXException | ParseException e) {
        e.printStackTrace();
    }
        return total;
    }

    public static void updateData(DataHasilProduksi dhp, int index) throws ParserConfigurationException {
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = null;
        try {
            doc = docBuilder.parse("dataHasilProduksi.xml");
        } catch (SAXException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        NodeList listProduksi = doc.getElementsByTagName("Produksi");
        org.w3c.dom.Element el = null;
        el = (org.w3c.dom.Element) listProduksi.item(index);

        Node _nodeMesin = el.getElementsByTagName("Mesin").item(0).getFirstChild();
        _nodeMesin.setNodeValue(dhp.getNamaMesin());

        Node _nodeTarget = el.getElementsByTagName("Target").item(0).getFirstChild();
        _nodeTarget.setNodeValue(String.valueOf(dhp.getTargetProduksi()));

        Node _nodeShift = el.getElementsByTagName("Shift").item(0).getFirstChild();
        _nodeShift.setNodeValue(String.valueOf(dhp.getShift()));

        Node _nodeHasilOK = el.getElementsByTagName("Hasil_OK").item(0).getFirstChild();
        _nodeHasilOK.setNodeValue(String.valueOf(dhp.getHasilOK()));

        Node _nodeHasilReject = el.getElementsByTagName("Hasil_Reject").item(0).getFirstChild();
        _nodeHasilReject.setNodeValue(String.valueOf(dhp.getHasilReject()));

        Node _nodeTanggal = el.getElementsByTagName("Tanggal_Produksi").item(0).getFirstChild();
        _nodeTanggal.setNodeValue(String.valueOf(dhp.getTanggalProduksi()));
        // get the salary element, and update the value

        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = null;
        try {
            transformer = transformerFactory.newTransformer();
        } catch (TransformerConfigurationException e) {
            e.printStackTrace();
        }
        DOMSource source = new DOMSource(doc);
        StreamResult result = new StreamResult(new File("dataHasilProduksi.xml"));

        try {
            transformer.transform(source, result);
        } catch (TransformerException e) {
            e.printStackTrace();
        }
    }
}

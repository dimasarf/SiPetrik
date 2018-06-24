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
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Pencatatan
{
    private Mesin mesin;
    private Barang barang;
    private Date date;

    public Pencatatan(Mesin mesin, Barang barang, Date date) {
        this.mesin = mesin;
        this.barang = barang;
        this.date = date;
        System.out.println(date);
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
        XStream stream = new XStream(new StaxDriver());
        stream.alias("Mesin", Mesin.class);
        stream.alias("Barang", Barang.class);
        DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
        org.w3c.dom.Document doc = docBuilder.parse("dataProduksi.xml");
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
            StreamResult result = new StreamResult(new File("dataProduksi.xml"));

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

        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        DOMSource source = new DOMSource(doc);
        StreamResult result = new StreamResult(new File("dataProduksi.xml"));

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






}

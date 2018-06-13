package sample;

import com.thoughtworks.xstream.XStream;
import com.thoughtworks.xstream.io.xml.StaxDriver;
import org.w3c.dom.Node;
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
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Pencatatan
{
    private Mesin mesin;
    private Barang barang;
    private Date date;

    public Pencatatan(Mesin mesin, Barang barang) {
        this.mesin = mesin;
        this.barang = barang;
        this.date = new Date();
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
        org.w3c.dom.Document doc = docBuilder.parse("dataMesin.xml");
        org.w3c.dom.Element root = doc.getDocumentElement();

        List<Pencatatan> pencatatanList = new ArrayList<>();
        pencatatanList.add(this);
        try
        {
            for (Pencatatan catatan: pencatatanList)
            {
                org.w3c.dom.Element rootElement = doc.createElement("Pencatatan");

                org.w3c.dom.Element Mesin = doc.createElement("Mesin");
                rootElement.appendChild(Mesin);
                Mesin.appendChild(doc.createTextNode(catatan.getMesin().getNama()));

                org.w3c.dom.Element namaBarang = doc.createElement("Id_Barang");
                namaBarang.appendChild(doc.createTextNode(catatan.getBarang().getId()));
                rootElement.appendChild(namaBarang);


                org.w3c.dom.Element kondisiBarang = doc.createElement("Kondisi_Barang");
                kondisiBarang.appendChild(doc.createTextNode(catatan.getBarang().getCondition()));
                rootElement.appendChild(kondisiBarang);

                root.appendChild(rootElement);
            }

            TransformerFactory transformerFactory = TransformerFactory.newInstance();
            Transformer transformer = transformerFactory.newTransformer();
            DOMSource source = new DOMSource(doc);
            StreamResult result = new StreamResult(new File("dataMesin.xml"));

            transformer.transform(source, result);

        } catch (TransformerConfigurationException exx) {
            System.out.println(exx.getMessage());
        } catch (TransformerException exxx) {
            System.out.println(exxx.getMessage());
        }
    }




}

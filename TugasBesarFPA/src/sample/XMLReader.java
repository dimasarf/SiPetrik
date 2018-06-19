package sample;

import org.w3c.dom.Document;
import org.w3c.dom.NodeList;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import java.io.File;

public class XMLReader
{
    public static NodeList getNode(String fileName)
    {
        NodeList nodeList = null;
        try
        {
            File fxmlFile = new File(fileName);
            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbFactory.newDocumentBuilder();
            Document doc = db.parse(fxmlFile);

            doc.getDocumentElement().normalize();

            nodeList = doc.getElementsByTagName("Mesin");
        }
        catch (Exception e)
        {

        }
        return nodeList;
    }
}

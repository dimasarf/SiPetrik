package sample;

public class Barang {
    private String id;
    private boolean status;

    public Barang(String id, boolean status)
    {
        this.id = id;
        this.status = status;
    }

    public String getId()
    {
        return id;
    }

    public String getCondition()
    {
        if(status)
            return "OK";
        else
            return "Rejected";
    }

}

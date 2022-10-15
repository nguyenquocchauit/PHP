<?php
class LoaiSua
{
    protected $conn, $milkTypeID, $milkTypeName;

    function setConnect($conn)
    {
        $this->conn  = $conn;
    }
    function getConnect()
    {
        return $this->conn;
    }
    function setParameter($milkTypeID, $milkTypeName)
    {
        $this->milkTypeID  = $milkTypeID;
        $this->milkTypeName  = $milkTypeName;
    }
    function getParameter()
    {
        $addQuery = '';
        if ($this->milkTypeID != "NoParameter")
            $addQuery .= " AND Ma_loai_sua ='$this->milkTypeID'";
        if ($this->milkTypeName != "NoParameter")
            $addQuery .= " AND Ten_loai ='$this->milkTypeName'";
        return $addQuery;
    }
    function all()
    {
        $query = "SELECT * FROM loai_sua WHERE 1";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function queryByID()
    {
        $addQuery = $this->getParameter();
        $query = "SELECT * FROM loai_sua WHERE 1 $addQuery ";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function update($milkTypeID, $milkTypeName)
    {
        $query = "UPDATE loai_sua SET Ma_loai_sua='" . ($milkTypeID) . "',Ten_loai='" . ($milkTypeName) . "'
        WHERE Ma_loai_sua='" . $milkTypeID . "'";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
}

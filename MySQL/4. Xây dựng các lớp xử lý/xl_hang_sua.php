<?php
class HangSua
{
    protected $conn, $result;

    function setConnect($conn)
    {
        $this->conn  = $conn;
    }
    function getConnect()
    {
        return $this->conn;
    }
    function all()
    {
        $query = "SELECT * FROM hang_sua WHERE 1";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
    function queryByID($milkBrandID, $milkBrandName, $address, $phoneNumber, $email)
    {
        $addQuery = '';
        if ($milkBrandID != "NoParameter")
            $addQuery .= " AND Ma_hang_sua ='$milkBrandID'";
        if ($milkBrandName != "NoParameter")
            $addQuery .= " AND Ten_hang_sua ='$milkBrandName'";
        if ($address != "NoParameter")
            $addQuery .= " AND Dia_chi ='$address'";
        if ($phoneNumber != "NoParameter")
            $addQuery .= " AND Dien_thoai ='$phoneNumber'";
        if ($email != "NoParameter")
            $addQuery .= " AND Email ='$email'";
        $query = "SELECT * FROM hang_sua WHERE 1 $addQuery";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
}

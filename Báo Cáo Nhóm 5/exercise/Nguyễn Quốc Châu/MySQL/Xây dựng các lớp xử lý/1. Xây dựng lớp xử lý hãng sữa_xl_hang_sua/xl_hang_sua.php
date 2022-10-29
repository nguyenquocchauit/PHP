<?php
class HangSua
{
    protected $conn, $milkBrandID, $milkBrandName, $address, $phoneNumber, $email;

    function setConnect($conn)
    {
        $this->conn  = $conn;
    }
    function getConnect()
    {
        return $this->conn;
    }
    function setParameter($milkBrandID, $milkBrandName, $address, $phoneNumber, $email)
    {
        $this->milkBrandID  = $milkBrandID;
        $this->milkBrandName  = $milkBrandName;
        $this->address  = $address;
        $this->phoneNumber  = $phoneNumber;
        $this->email  = $email;
    }
    function getParameter()
    {
        $addQuery = '';
        if ($this->milkBrandID != "NoParameter")
            $addQuery .= " AND Ma_hang_sua ='$this->milkBrandID'";
        if ($this->milkBrandName != "NoParameter")
            $addQuery .= " AND Ten_hang_sua ='$this->milkBrandName'";
        if ($this->address != "NoParameter")
            $addQuery .= " AND Dia_chi ='$this->address'";
        if ($this->phoneNumber != "NoParameter")
            $addQuery .= " AND Dien_thoai ='$this->phoneNumber'";
        if ($this->email != "NoParameter")
            $addQuery .= " AND Email ='$this->email'";
        return $addQuery;
    }
    function all()
    {
        $query = "SELECT * FROM hang_sua WHERE 1";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function queryByID()
    {
        $addQuery = $this->getParameter();
        $query = "SELECT * FROM hang_sua WHERE 1 $addQuery ";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function update($milkBrandID, $milkBrandName, $address, $phoneNumber, $email)
    {
        $query = "UPDATE hang_sua SET Ma_hang_sua='" . ($milkBrandID) . "',Ten_hang_sua='" . ($milkBrandName) . "',address=" . ($address) . ", 
        Dien_thoai='" . ($phoneNumber) . "', Email='" . ($email) . "'
        WHERE Ma_hang_sua='" . $milkBrandID . "'";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
}

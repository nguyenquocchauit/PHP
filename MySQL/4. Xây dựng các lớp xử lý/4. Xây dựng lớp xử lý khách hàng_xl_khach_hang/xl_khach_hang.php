<?php
class KhachHang
{
    protected $conn, $result, $customerID, $customerName, $gender, $address, $phoneNumber, $email;

    function setConnect($conn)
    {
        $this->conn  = $conn;
    }
    function getConnect()
    {
        return $this->conn;
    }
    function setParameter($customerID, $customerName, $gender, $address, $phoneNumber, $email)
    {
        $this->customerID  = $customerID;
        $this->customerName  = $customerName;
        $this->gender  = $gender;
        $this->address  = $address;
        $this->phoneNumber  = $phoneNumber;
        $this->email  = $email;
    }
    function getParameter()
    {
        $addQuery = '';
        if ($this->customerID != "NoParameter")
            $addQuery .= " AND Ma_khach_hang ='$this->customerID'";
        if ($this->customerName != "NoParameter")
            $addQuery .= " AND Ten_khach_hang ='$this->customerName'";
        if ($this->gender != "NoParameter")
            $addQuery .= " AND Phai ='$this->gender'";
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
        $query = "SELECT * FROM khach_hang WHERE 1";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
    function queryByID()
    {
        $addQuery = $this->getParameter();
        $query = "SELECT * FROM khach_hang WHERE 1 $addQuery ";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
    function update($customerID, $customerName, $gender, $address, $phoneNumber, $email)
    {
        $query = "UPDATE khach_hang SET Ma_khach_hang='" . ($customerID) . "',Ten_khach_hang='" . ($customerName) . "',Phai='" . ($gender) . "',Dia_chi='" . ($address) . "'
        ,Dien_thoai='" . ($phoneNumber) . "',Email='" . ($email) . "' WHERE Ma_khach_hang='" . $customerID . "'";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
}

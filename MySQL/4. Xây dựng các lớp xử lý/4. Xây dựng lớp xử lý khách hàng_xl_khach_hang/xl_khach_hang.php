<?php
class KhachHang
{
    protected $conn, $customerID, $customerName, $gender, $address, $phoneNumber, $email;

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
    function getCustomerIDAuto()
    {
        $customerID = null;
        $query = "SELECT max(Ma_khach_hang) AS 'customerID' FROM khach_hang";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        // lấy 2 ký tự đầu tiên kh001 => kh
        $kh = substr($row['customerID'], 0, -3);
        // lấy 3 ký tự số cuối cùng để tăng tự động mã khách hàng
        $number = (int) substr($row['customerID'], -3);
        $number += 1;
        if ($number < 10)
            $customerID = $kh . "00" . $number;
        else if ($number < 100 && $number >= 10)
            $customerID = $kh . "0" . $number;
        else if ($number >= 100)
            $customerID = $kh . $number;
        return $customerID;
    }
    function all()
    {
        $query = "SELECT * FROM khach_hang WHERE 1";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function queryByID()
    {
        $addQuery = $this->getParameter();
        $query = "SELECT * FROM khach_hang WHERE 1 $addQuery ";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function update($customerID, $customerName, $gender, $address, $phoneNumber, $email)
    {
        $query = "UPDATE khach_hang SET Ma_khach_hang='" . ($customerID) . "',Ten_khach_hang='" . ($customerName) . "',Phai='" . ($gender) . "',Dia_chi='" . ($address) . "'
        ,Dien_thoai='" . ($phoneNumber) . "',Email='" . ($email) . "' WHERE Ma_khach_hang='" . $customerID . "'";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
    function insert($customerID, $customerName, $gender, $address, $phoneNumber, $email)
    {
        $query = "INSERT INTO khach_hang (Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email) 
        VALUES ('$customerID','$customerName','$gender','$address','$phoneNumber','$email')";
        $result = mysqli_query($this->getConnect(), $query);
        return $result;
    }
}

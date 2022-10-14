<?php
class Sua
{
    protected $conn, $result, $milkID, $milkName, $milkBrandID, $milkTypeID, $weight, $price, $contentIngredients, $contentBenefit, $pathImg;

    function setConnect($conn)
    {
        $this->conn  = $conn;
    }
    function getConnect()
    {
        return $this->conn;
    }
    function setParameter($milkID, $milkName, $milkBrandID, $milkTypeID, $weight, $price, $contentIngredients, $contentBenefit, $pathImg)
    {
        $this->milkID  = $milkID;
        $this->milkName  = $milkName;
        $this->milkBrandID  = $milkBrandID;
        $this->milkTypeID  = $milkTypeID;
        $this->weight  = $weight;
        $this->price  = $price;
        $this->contentIngredients  = $contentIngredients;
        $this->contentBenefit  = $contentBenefit;
        $this->pathImg  = $pathImg;
    }
    function getParameter()
    {
        $addQuery = '';
        if ($this->milkID != "NoParameter")
            $addQuery .= " AND Ma_sua ='$this->milkID'";
        if ($this->milkName != "NoParameter")
            $addQuery .= " AND Ten_sua ='$this->milkName'";
        if ($this->milkBrandID != "NoParameter")
            $addQuery .= " AND Ma_hang_sua ='$this->milkBrandID'";
        if ($this->milkTypeID != "NoParameter")
            $addQuery .= " AND Ma_loai_sua ='$this->milkTypeID'";
        if ($this->weight != "NoParameter")
            $addQuery .= " AND Trong_luong ='$this->weight'";
        if ($this->price != "NoParameter")
            $addQuery .= " AND Don_gia ='$this->price'";
        if ($this->contentIngredients != "NoParameter")
            $addQuery .= " AND TP_Dinh_Duong ='$this->contentIngredients'";
        if ($this->contentBenefit != "NoParameter")
            $addQuery .= " AND Loi_ich ='$this->contentBenefit'";
        if ($this->pathImg != "NoParameter")
            $addQuery .= " AND Hinh ='$this->pathImg'";
        return $addQuery;
    }
    function all()
    {
        $query = "SELECT * FROM sua WHERE 1";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
    function queryByID()
    {
        $addQuery = $this->getParameter();
        $query = "SELECT * FROM sua WHERE 1 $addQuery ";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
    function update($milkID, $milkName, $milkBrandID, $milkTypeID, $weight, $price, $contentIngredients, $contentBenefit, $pathImg)
    {
        $query = "UPDATE sua SET Ma_sua='" . ($milkID) . "',Ten_sua='" . ($milkName) . "',Ma_hang_sua='" . ($milkBrandID) . "',Ma_loai_sua='" . ($milkTypeID) . "'
        ,Trong_luong='" . ($weight) . "',Don_gia='" . ($price) . "',TP_Dinh_Duong='" . ($contentIngredients) . "',Loi_ich='" . ($contentBenefit) . "',Hinh='" . ($pathImg) . "'
        WHERE Ma_sua='" . $milkID . "'";
        $this->result = mysqli_query($this->getConnect(), $query);
        return $this->result;
    }
}

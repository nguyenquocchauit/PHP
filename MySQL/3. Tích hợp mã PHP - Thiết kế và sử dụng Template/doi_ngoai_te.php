<?php
function doi_tien($type, $money,$rateVND)
{
    $moneyVND = 0;
    switch ($type) {
        case 'USD':
            $moneyVND = $money * $rateVND;
            break;
        case 'AUD':
            $moneyVND = $money * $rateVND;
            break;
        case 'YPJ':
            $moneyVND = $money * $rateVND;
            break;
        case 'EUR':
            $moneyVND = $money * $rateVND;
            break;
    }
    return $moneyVND;
}
function doi_vang($type, $quantity,$rateGold)
{
    $goldVND = 0;
    switch ($type) {
        case 'SJC':
            $goldVND = $quantity * $rateGold;
            break;
        case 'AAA':
            $goldVND = $quantity * $rateGold;
            break;
        case 'PNJ':
            $goldVND = $quantity * $rateGold;
            break;
    }
    return $goldVND;
}

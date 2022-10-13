<?php
function doi_tien($type, $money)
{
    $moneyVND = 0;
    switch ($type) {
        case 'USD':
            $moneyVND = $money * 16177;
            break;
        case 'AUD':
            $moneyVND = $money * 14057;
            break;
        case 'YPJ':
            $moneyVND = $money * 136;
            break;
        case 'EUR':
            $moneyVND = $money * 22486;
            break;
    }
    return $moneyVND;
}
function doi_vang($type, $quantum)
{
    $goldVND = 0;
    switch ($type) {
        case 'SJC':
            $goldVND = $quantum * 1306000;
            break;
        case 'AAA':
            $goldVND = $quantum * 1305000;
            break;
        case 'PNJ':
            $goldVND = $quantum * 1302000;
            break;
    }
    return $goldVND;
}

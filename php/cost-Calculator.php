<?php
    $tourPrice = 0;
    $tour1 = 50;
    $tour2 = 60;
    $tour3 = 70;

    switch($tour){
        case "tour1":
        $tourPrice += $tour1;
        break;
        case "tour2":
        $tourPrice += $tour2;
        break;
        case "tour3":
        $tourPrice += $tour3;
        break;
        default: return "No option chosen";
    } 

    $adultPrice = 0;
    $adult = 20;
    switch($numAdult)
    {
        case "0":
        $adultPrice = $adult * 0;
        break;
        case "1":
        $adultPrice = $adult * 1;
        break;
        case "2":
        $adultPrice = $adult * 2;
        break;
        case "3":
        $adultPrice = $adult * 3;
        break;
        case "4":
        $adultPrice = $adult * 4;
        break;
        case "5":
        $adultPrice = $adult * 5;
        break;
        case "6":
        $adultPrice = $adult * 6;
        break;
        case "7":
        $adultPrice = $adult * 7;
        break;
        case "8":
        $adultPrice = $adult * 8;
        break;
        case "9":
        $adultPrice = $adult * 9;
        break;
        case "10":
        $adultPrice = $adult * 10;
        break;
        default: return "No option chosen";
    }

    $childPrice = 0;
    $children = 10;
    switch($numChild)
    {
        case "0":
        $childPrice = $children * 0;
        break;
        case "1":
        $childPrice = $children * 1;
        break;
        case "2":
        $childPrice = $children * 2;
        break;
        case "3":
        $childPrice = $children * 3;
        break;
        case "4":
        $childPrice = $children * 4;
        break;
        case "5":
        $childPrice = $children * 5;
        break;
        case "6":
        $childPrice = $children * 6;
        break;
        case "7":
        $childPrice = $children * 7;
        break;
        case "8":
        $childPrice = $children * 8;
        break;
        case "9":
        $childPrice = $children * 9;
        break;
        case "10":
        $childPrice = $children * 10;
        break;
        default: return "No option chosen";
    }

    calculateCost($tourPrice, $adultPrice, $childPrice);

    function calculateCost($tourPrice, $adultPrice, $childPrice){
        echo $calculate = $tourPrice + $adultPrice + $childPrice;
        return $calculate;
    }
?>
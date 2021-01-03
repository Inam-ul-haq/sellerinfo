<?php

function getDateFormat()
{
    // hard coded for now. in the future this will be brought from settings table
    return 'd-m-Y';
}

function getDateTimeFormat()
{
    // hard coded for now. in the future this will be brought from settings table
    return 'd-m-Y H:i:s';
}

function setDateFormat($date)
{

    if (!empty($date)) {
        $date = date(getDateFormat(), strtotime($date));
        return $date;
    } else {
        return "";
    }
}

function setDateTimeFormat($date)
{
    if (!empty($date)) {
        $date = date(getDateTimeFormat(), strtotime($date));
        return $date;
    } else {
        return "";
    }
}

?>

<?php

function logIP() {
    $heureLog = date('h:i:s');
    $today = date("Ymd");
    $fileLog = './log/' . $today . '.log';
//var_dump( is_dir('./log'));
    if (!is_dir('./log')) {
        mkdir('./log');
    }
    $h = fopen($fileLog, 'a+');
    fwrite($h, date("Y-m-d") . '-' . $heureLog . ' # ' . $_SERVER['REMOTE_ADDR'] . "\r\n");
    fclose($h);

//en 1 ligne
// file_put_contents($fileLog,'le truc à écrire,FILE_APPEND)
}

function connectDB() {
    $handle = mysql_connect('127.0.0.1', 'root');
    var_dump($handle);
    mysql_select_db('le_bon_coin', $handle);

    mysql_set_charset('UTF-8');
    mysql_query('SET NAMES "utf8"');
}

function closeDB() {
    mysql_close();
}

function connectDB_PDO() {
    $oPDO = new PDO('mysql:host=127.0.0.1;dbname=le_bon_coin;CHARSET=UTF-8', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    var_dump($oPDO);
    return $oPDO;
}

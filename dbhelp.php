<?php
require_once('config.php');
// insert, update, delete ->su dung function
function execute($sql){
    // create connection toi database
    $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($connect, 'utf8');
    mysqli_query($connect, $sql);
    mysqli_close($connect);
}
// su dung cho lenh select => tra ve ket qua
function executeResult($sql){
    $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($connect, 'utf8');
    $result = mysqli_query($connect, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }
    mysqli_close($connect);
    return $data;
}

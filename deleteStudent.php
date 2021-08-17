<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    require_once('dbhelp.php');
    $sql = 'delete from quanly where id = '.$id;
    execute($sql);
    echo 'xoa sinh vien thanh cong';
}
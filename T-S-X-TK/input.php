<?php
require_once('dbhelp.php');
$fullname = $age = $address = $id = '';
if(!empty($_POST)){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }
    if(isset($_POST['age'])){
        $age = $_POST['age'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    $fullname = str_replace("\'","\\\'",$fullname);
    $age = str_replace("\'","\\\'",$age);
    $address = str_replace("\'","\\\'",$address);
    $id = str_replace("\'","\\\'",$id);
    if($id != ''){
        $sql = "update student set fullname ='$fullname', age = '$age', address = '$address' where id =".$id;
    }else{
        $sql = "insert into student(fullname, age, address) values('$fullname','$age','$address')";
    }
    execute($sql);
    header('Location: index.php');
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'select * from student where id = '.$id;
    $studenList = executeResult($sql);
    if($studenList != null && $studenList > 0){
        $std = $studenList[0];
        $fullname = $std['fullname'];
        $age = $std['age'];
        $address = $std['address'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Thêm thông tin sinh viên
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="fullname">Họ và tên: </label>
                        <input type="number" name="id" style="display:none;" value="<?=$id?>">
                        <input type="text" required= 'true' name="fullname" id="fullname" class="form-control" value="<?=$fullname?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Tuổi: </label>
                        <input type="text" name="age" required= 'true' id="age" class="form-control"  value="<?=$age?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ: </label>
                        <input type="text" name="address" required= 'true' id="address" class="form-control"  value="<?=$address?>">
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
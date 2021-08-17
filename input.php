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

    $fullname = str_replace("\'","\\\'", $fullname);
    $age = str_replace("\'","\\\'", $age);
    $address = str_replace("\'","\\\'", $address);
    $id = str_replace("\'","\\\'", $id);

    if($id != ''){
        // update
        $sql  = "update quanly set fullname = '$fullname', age = '$age', address = '$address' where id = ".$id;
    }else{
        // insert 
        $sql = "insert into quanly(fullname, age, address)
        values('$fullname','$age','$address')";
    }
    execute($sql);
    header('Location: index.php');
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'select * from quanly where id = '.$id;
    $studentList = executeResult($sql);
    if($studentList != null && $studentList > 0){
        $std = $studentList[0];
        $fullname = $std['fullname'];
        $age = $std['age'];
        $address = $std['address'];
    }else{
        $id = '';
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
                        <label for="fullname">Full Name: </label>
                        <input type="number" name="id" value="<?=$id?>" style="display: none;">
                        <input type="text" name="fullname" id="fullname" class="form-control" required='true' value="<?=$fullname?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Age: </label>
                        <input type="text" name="age" id="age" class="form-control" required='true' value="<?=$age?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="text" name="address" id="address" class="form-control" required='true'value="<?=$address?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
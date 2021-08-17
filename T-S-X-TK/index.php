<?php
require_once('dbhelp.php');
if(isset($_GET['search']) && $_GET['search'] != ''){
    $sql = 'select * from student where fullname like "%'.$_GET['search'].'%"';
}else{
    $sql = 'select * from student';
}
$result = executeResult($sql);
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quản lý thông tin sinh viên
              <form action="" method="get">
                <input type="search" name="search" placeholder="Nhập thông tin bạn muốn tìm kiếm" class="form-control">
                <?php
                 if(isset($_GET['search']) && $_GET['search'] != ''){
                    echo 'Kết quả tìm kiếm của bạn: '.$_GET['search'];
                }
                ?>
              </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <?php
                        if(count($result) <= 0 && isset($_GET['search']) != ''){
                            echo 'Không tìm thấy kết quả';
                        }else if(count($result) <= 0 ){
                            echo 'Chưa có dữ liệu';
                        }
                        else{
                            echo '<tr>
                            <th>No</th>
                            <th>Full name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>';
                        }
                        ?>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($result as $row) {
                                echo'<tr>
                                        <td>'.$no++.'</td>
                                        <td>'.$row['fullname'].'</td>
                                        <td>'.$row['age'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td><button type="submit" class="btn btn-warning" onclick=\'window.open("input.php?id='.$row['id'].'","_self")\'>Edit</button></td>
                                        <td><button type="submit" class="btn btn-danger" onclick="deleteStudent('.$row['id'].')">Delete</button></td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success" onclick="window.open('input.php','_self')">Add</button>
            </div>
        </div>
    </div>
    <script>
        function deleteStudent(id){
            console.log(id);
            $.post('deleteStudent.php',{
                'id' : id
            },function(data){
                alert(data);
                location.reload();
            })
        }
    </script>
</body>
</html>
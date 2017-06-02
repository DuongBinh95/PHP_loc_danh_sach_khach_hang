
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    table{
        border-collapse: collapse;
        width: 100%;
    }
    th , td{
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    #from, #to{
        width: 200px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        padding: 12px 10px 12px 10px;
    }
    #submit{
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }
</style>
<body>
<?php
function searchByDate($fromdate , $todate , $customerlist){
    if(empty($fromdate) && empty($todate)){
        return $customerlist;
    }
    $filteredCustomers = [];
    foreach ($customerlist as $key => $values){
        $datevalues = $values['ngaysinh'];
        if ($datevalues >= $fromdate && $datevalues <= $todate){
            $filteredCustomers[] = $values;
        }
    }
    return $filteredCustomers;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    Từ : <input id="from" type="text" name="from" placeholder="yy/mm/dd"/>
    Đến : <input id="to" type="text" name="to" placeholder="yyyy-mm-dd">
    <input type="submit" id="submit" value="Tìm" />
</form>
<table border="0">
    <caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php
    $customerlist = array(
        "1" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1995-08-08" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/1.jpg"),
        "2" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1996-12-21" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/2.jpg"),
        "3" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1993-10-15" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/3.jpg"),
        "4" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1990-01-12" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/4.jpg"),
        "5" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1989-11-08" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/5.jpg"),
        "6" => array("ten" => "Nguyễn Bình Dương" ,
            "ngaysinh" => "1995-12-08" ,
            "diachi" => "Hà Nội" ,
            "anh" => "Anh/2.jpg"),
    );


    if ($_SERVER["REQUEST_METHOD"] == POST ){
        $fromdate = $_POST["from"];
        $todate = $_POST["to"];
    }
    $filteredCustomers = searchByDate($fromdate, $todate, $customerlist);
    foreach ($customerlist as $key => $values) {
        ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $values['ten'] ?></td>
            <td><?= $values['ngaysinh'] ?></td>
            <td><?= $values['diachi'] ?></td>
            <td><img src=<?= $values['anh'] ?> width='60px' height='60x'/></td>
        </tr>
        <?php
        }
     ?>
</table>
</body>
</html>
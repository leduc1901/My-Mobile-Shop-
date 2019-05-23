<?php
//khai báo các biến cần thiết
// địa chỉ của server hoặc tên host
$dbhost='localhost';
//Tên người dùng
$dbuser='root';
//mật khẩu
$dbpass='' ;
//tên database muốn kết nối
$dbname='project';
//chuỗi kết nối
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($conn)
{
    //cách 1
    //xuất data không bị lỗi tiếng việt
    mysqli_set_charset($conn,'utf8');

    // cách 2
    // mysqli_query($conn, "SET NAMES 'utf8'");
}
else {
    //Nếu kết nối thất bại ($conn trả về rỗng)
    //Dừng toàn bộ chương trình và hiển thị 'Kết nối thất bại!'
    die('Kết nối thất bại!');
}

// //Thực thi câu lệnh
// $result=mysqli_query($conn,"select * from thanhvien");

// //Đếm số bản ghi 
// echo mysqli_num_rows($result);
// echo '<hr>';

// //xuất dữ liệu 
// while($row=mysqli_fetch_array($result))
// {
//     echo $row['id'].'--'.$row['name'].'<hr>';
// }

// //Thực thi câu lệnh thêm
// $diachi='thường tín';
// $ten='Nguyễn văn ninh';
// mysqli_query($conn,"INSERT INTO thanhvien(address,name) VALUES ('$diachi','$ten')");



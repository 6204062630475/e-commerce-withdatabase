<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Detail</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
<table width="600" border="0" align="center" class="square">
  <tr><td colspan="3" bgcolor="#CCCCCC"><b>Product</b></td></tr>
  
<?php
//connect db
    include("connect2.php");
	$id = $_GET['id']; //สร้างตัวแปร p_id เพื่อรับค่า
	
	$sql = "select * from food where id=$id";  //รับค่าตัวแปร p_id ที่ส่งมา
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	//แสดงรายละเอียด
	echo "<tr>";
  	echo "<td width='300' valign='top'><b>Title</b></td>";
    echo "<td width='279'>" . $row["name"] . "</td>";
    echo "<td width='70' rowspan='4'><img src='img/" . $row["image"] . " ' width='300'></td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Category</b></td>";
    echo "<td>" . $row["Cate_ID"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Price</b></td>";
    echo "<td>" .number_format($row["Price"],2) . "</td>";
  	echo "</tr>"; 
  	echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<a href='cart.php?id=$row[id]&act=add'> เพิ่มลงตะกร้าสินค้า </a></td>";
    echo "</tr>";
?>
</table>
<p><center><a href="pizza.php">กลับไปหน้ารายการสินค้า</a></center>
</body>
</html>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List Clone</title>

</head>

<body>
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>Product</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("connect2.php");
  $sql = "select * from food order by id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='img/" . $row["image"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["name"] . "</td>";
    echo "<td align='center'>" .number_format($row["Price"],2). "</td>";
    echo "<td align='center'><a href='product_detail.php?id=$row[id]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>
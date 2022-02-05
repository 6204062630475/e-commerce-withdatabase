<?php
	session_start();
    include("connect2.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	$name = $_POST["name"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$total_qty = $_POST["total_qty"];
	$total = $_POST["total"];
	$dttm = Date("Y-m-d G:i:s");
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($conn, "BEGIN"); 
	$sql1	= "insert into customer values(null, '$name', '$email', '$phone', '$address')";
	$query1	= mysqli_query($conn, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(Cus_ID) as Cus_ID from customer where Cus_name='$name' and Cus_email='$email'";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$Cus_ID = $row["Cus_ID"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from food where id=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['Price']*$qty;
		
		$sql4	= "insert into orders values(null, '$qty', '$total', '$dttm', '$Cus_ID', '$p_id', null, null, null)";
		$query4	= mysqli_query($conn, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='pizza.php';
</script>

 




</body>
</html>
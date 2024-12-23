<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:login.php');
	}
	include('connect.php');
	if(empty($_POST['submit'])){
		$sql = "SELECT * FROM vandon";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row;
		}
	}
	else{
		$timkiem = $_POST['timkiem'];
		$sql = "SELECT * FROM vandon WHERE nhanvien_id LIKE '%$timkiem%'";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>Danh sách vận đơn</header>
	<content>
		<div class="container">
					<ul class="nav">
						<li class="nav-item">
							
						</li>
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Trang chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Đăng xuất</a>
						</li>
					</ul>
		</div>
		<form method="post">
						
						<input type="text" name="timkiem" placeholder="Nhập ID nhân viên">
						<input type="submit" name="submit" value="TÌM KIẾM">
					</form>
		<table class="table table-inverse">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nhân viên phụ trách</th>
								<th>Người nhận</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
								<th>Ngày giao</th>
								<th>Ghi chú</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $items):?>
							<tr>
								<td><?php echo $items['id'];?></td>
								<td><?php echo $items['nhanvien_id'];?></td>
								<td><?php echo $items['nguoinhan'];?></td>
								<td><?php echo $items['dienthoai'];?></td>
								<td><?php echo $items['diachi'];?></td>
								<td><?php echo $items['ngaygiaohang'];?></td>
								<td><?php echo $items['ghichu'];?></td>
							</tr>
						<?php endforeach?>
						</tbody>
					</table>
		
	</content>
	<footer>Bùi Khánh Nam - 92483 - CNT62ĐH</footer>
</body>
</html>

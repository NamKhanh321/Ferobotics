<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:login.php');
	}
	include('connect.php');
	if(empty($_POST['submit'])){
		$sql = "SELECT * FROM vandon inner join NhanVien on vandon.nhanvien_id = nhanvien.idNV";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row;
		}
	}
	else{
		$timkiem = $_POST['timkiem'];
		$sql = "SELECT * FROM vandon inner join NhanVien on vandon.nhanvien_id = nhanvien.idNV WHERE nhanvien.TenNV LIKE '%$timkiem%'";
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
	<title>Quản lý vận đơn</title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>Trang quản trị</header>
		<div class="container"> 
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="list.php">Danh sách vận đơn</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Đăng xuất</a>
						</li>
					</ul>
					<br>
					<form method="post">
						
						<input type="text" name="timkiem" placeholder="Nhập ID nhân viên">
						<input type="submit" name="submit" value="TÌM KIẾM">
					</form>
					<br>
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
								<td><?php echo $items['TenNV'];?></td>
								<td><?php echo $items['nguoinhan'];?></td>
								<td><?php echo $items['dienthoai'];?></td>
								<td><?php echo $items['diachi'];?></td>
								<td><?php echo $items['ngaygiaohang'];?></td>
								<td><?php echo $items['ghichu'];?></td>
								<th><a href="add_vandon.php">Thêm</a></th>
							<th><a href="edit_vandon.php?id=<?php echo $items['id'];?>">Sửa</a></th>
							<th><a href="delete_vandon.php?id=<?php echo $items['id'];?>">Xóa</a></th>
							</tr>
						<?php endforeach?>
						</tbody>
					</table>
		</div>
	<footer>Bùi Khánh Nam - 92483 - CNT62ĐH</footer>
</body>
</html>
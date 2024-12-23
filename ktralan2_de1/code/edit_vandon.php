<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:login.php');
	}
	include('connect.php');
	$sql = "SELECT idNV,TenNV FROM NhanVien";

	$stmt = $conn->prepare($sql);
	$query = $stmt->execute();


	$result = array();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$result[] = $row;
	}

	$idUpdate = $_GET['id'];
	$sqlString = "SELECT * from vandon where id = '$idUpdate'";
	$stmt2 = $conn->prepare($sqlString);
	$query2 = $stmt2->execute();
	$data = $stmt2->fetch(PDO::FETCH_ASSOC);

	
	

	if(!empty($_POST['submit'])){
		if(isset($_POST['id'])&&isset($_POST['nhanvien_id'])&&isset($_POST['nguoinhan'])&&isset($_POST['dienthoai'])&&isset($_POST['diachi'])&&isset($_POST['ngaygiaohang'])&&isset($_POST['ghichu'])){
			$idUpdate = $_GET['id'];
			$nhanvien_id = $_POST['nhanvien_id'];
			$nguoinhan = $_POST['nguoinhan'];
			$dienthoai = $_POST['dienthoai'];
			$diachi = $_POST['diachi'];
			$ngaygiaohang = $_POST['ngaygiaohang'];
			$ghichu = $_POST['ghichu'];
			$sql = "UPDATE VanDon SET nhanvien_id='$nhanvien_id', nguoinhan='$nguoinhan', dienthoai = '$dienthoai', diachi = '$diachi', ngaygiaohang = '$ngaygiaohang', ghichu = '$ghichu' WHERE id = '$idUpdate'";
			
			var_dump($sql);
			$stmt = $conn->prepare($sql);
			$query = $stmt->execute();
			if($query){
				header('location:list.php');
			}
			else{
				echo "Sửa dữ liệu thất bại";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SỬA VẬN ĐƠN</title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>QUẢN LÝ VẬN ĐƠN</header>
	<content>
		<div class="container">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Trang chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="list.php">Danh sách vận đơn</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Đăng xuất</a>
						</li>
					</ul>

					<form method="post">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">ID Vận đơn</label>
							<input type="text" class="form-control" name="id" placeholder="" value="<?php echo $data['id'] ?>">
						</fieldset>
						<fieldset class="form-group">
						<label for="formGroupExampleInput2">Nhân viên</label>
							<select class="form-control" name="nhanvien_id" placeholder="">
								<<?php foreach ($result as $items): ?>
									<option value="<?php echo $items['idNV']; ?>"><?php echo $items['idNV']; ?></option>
								<?php endforeach ?>
							</select>
						
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Người nhận</label>
							<input type="text" class="form-control" name="nguoinhan" placeholder="" value="<?php echo $data['nguoinhan'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Điện thoại</label>
							<input type="text" class="form-control" name="dienthoai" placeholder="" value="<?php echo $data['dienthoai'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Địa chỉ</label>
							<input type="text" class="form-control" name="diachi" placeholder="" value="<?php echo $data['diachi'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Ngày giao hàng</label>
							<input type="text" class="form-control" name="ngaygiaohang" placeholder="" value="<?php echo $data['ngaygiaohang'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Ghi chú</label>
							<input type="text" class="form-control" name="ghichu" placeholder="" value="<?php echo $data['ghichu'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<input type="submit" class="form-control" name="submit" value="LƯU">
						</fieldset>
					</form>
		</div>
		
	</content>
	<footer>Bùi Khánh Nam - 92483 - CNT62ĐH</footer>
</body>
</html>
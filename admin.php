<?php 

include 'koneksi.php';


if(isset($_POST['simpan'])){

// simpan foto
$gambar 					=$_FILES['file']['name'];
$file_tmp 					=$_FILES['file']['tmp_name'];



$kelasbus					=$_POST['kelasbus'];
$harga						=$_POST['harga'];

mysqli_query($koneksi,"INSERT INTO bus VALUES (

	'',
	'$kelasbus',
	'$gambar',
	'$harga'

) ");
move_uploaded_file($file_tmp,'img/'.$gambar);


header('location:admin.php');

}

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tiket Bus Akp</title>
</head>
<body>
			<center>
			<div style="border: solid black 1px; width: 550px; padding: 10px;">
				<h1>From Admin</h1>
				<form action="" method="post" enctype="multipart/form-data">
					<table>


						<tr>
							<td>Kelas Bus</td>
							<td><select name="kelasbus">
								<option value="ekonomis">Ekonomis</option>
								<option value="bisnis">Bisnis</option>
								<option value="eksekutif">Eksekutif</option>
							</select></td>
						</tr>
						<tr>
							<td>Gambar bus</td>
							<td><input type="file" name="file"></td>
						</tr>
						
						<tr>
							<td>Harga</td>
							<td><input type="number" name="harga"></td>
						</tr>
						
						
						<tr>
							<td><button name="simpan">Simpan</button></td>
						</tr>
					</table>
				</form>
			</div>
				</center>

</body>
</html>
</body>
</html>
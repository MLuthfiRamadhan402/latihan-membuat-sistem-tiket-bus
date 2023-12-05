<?php 
include 'koneksi.php';

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tiket Bus Akp</title>
</head>
<body>
			<center>
			<div style="border: solid black 1px; width: 550px; padding: 10px; hi">
				<h1>From Pemesanan</h1>
				<form action="" method="post">
					<table>

						<tr>
							<td>Nama Lengkap</td>
							<td><input type="text" name="nama"></td>
						</tr>

						<tr>
							<td>No Identitas</td>
							<td><input type="number" name="noidentitas"></td>
						</tr>
						<tr>
							<td>No HP</td>
							<td><input type="number" name="nohp"></td>
						</tr>
						<tr>
							<td>Kelas Penumpang</td>
							
							<td><select name="kelaspenumpang">
								<option>Pilih</option>
								<option value="55000">Ekonomis</option>
								<option value="80000">Bisnis</option>
								<option value="55000">Eksekutif</option>
				
							</select></td>
						
						</tr>
						<tr>
							<td>Jabwal Keberangkatan</td>
							<td><input type="date" name="jabwal"></td>
						</tr>
						<tr>
							<td>Jumlah Penumpang</td>
							<td><input type="number" name="jumlah"></td>
						</tr>
						<tr>
							<td>Jumlang Penumpang Lansia</td>
							<td><input type="number" name="jumlahlansia"></td>
						</tr>

				<?php if(isset($_POST['hitung'])){

				$jumlahpenumpang= $_POST['jumlah'];
				$kelaspenumpang= $_POST['kelaspenumpang'];

				$hitung = $jumlahpenumpang * $kelaspenumpang;

				?>		

						<tr>
						<td>Harga Tiket: <?=$kelaspenumpang; ?></td><br>
						</tr>
						<tr>
						<td>Total Harga: <?=$hitung;  ?></td>
						</tr>
						<?php } ?>
							
						
						<tr>
							<td colspan="1"><input type="checkbox" name="sarat"><article>Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan kententuan yang berlaku</article>
								<td></td>
							</td>
						</tr>
						<tr>
							<td><button name="hitung">Hitung Bayar</button></td>
							<td><button name="pesan">Pesan Tiket</button></td>
							<td><a href="index.php"><button>Cancel</button></a></td>
						</tr>
					</table>
				</form>
			</div>
				</center>
	<?php if(isset($_POST['pesan'])){

$nama= 					$_POST['nama'];
$identitas= 			$_POST['noidentitas'];
$nohp= 					$_POST['nohp'];
$kelaspenumpang=		$_POST['kelaspenumpang'];
$jabwal=				$_POST['jabwal'];
$jumlahpenumpang= 		$_POST['jumlah'];
$penumpanglansia= 		$_POST['jumlahlansia'];

$total=  $penumpanglansia + $jumlahpenumpang * $kelaspenumpang ;

$aa=mysqli_query($koneksi,"SELECT * FROM bus WHERE harga='$kelaspenumpang' ");
$aa=mysqli_fetch_assoc($aa);

 ?>
 				<br>

 				<center>
				<div style="border: solid black 1px; width:350px; padding: 10px; ">
					<p>Nama Pemesan:<?=$nama; ?></p>
					<p>No Identitas:<?=$identitas; ?></p>
					<p>No Hp:<?=$nohp; ?></p>
					<p>Kelas Penumpang:<?=$aa['kelas']; ?></p>
					<p>Jumlah Penumpang:<?=$jumlahpenumpang; ?></p>
					<p>Jumlah Penumpang Lansia:<?=$penumpanglansia; ?></p>
					<p>Jabwal:<?=$jabwal ?></p>
					<p>Harga Tiket:<?=$kelaspenumpang; ?></p>
					<p>Total Bayar:<?=$total; ?></p>
					<img src="img/<?=$aa['gambar'] ?>" width="170 ">
				</div>
				</center>
			<?php } ?>

</body>
</html>
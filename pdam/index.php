<?php
  //include atau panggil header.php yang ada folder layouts
  include('header.php');

?>
<header>
        <h1>SURYA SEMBADA PDAM SURABAYA</h1>
        <style>
            header {
                background-color : #06213F;
                padding: 10px;
                text-align: center;
                color : white;
                margin-top: auto;
                margin-bottom: auto;
            
            }
    
            header p {
                margin: 5px;
            }
        </style>
      </header> 
	  
<head>
		<div class="card mt-3">
			<div class="card-header">
				DATA MONITORING PEGAWAI <a href="tambah.php" class="btn btn-sm btn-dark float-xl-end">|Tambah|</a>
                <a href="../login.html" class="btn btn-sm btn-dark float-xl-end">|Logout|</a>
                
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="bg-primary text-light">
							<th>No</th>
							<th>TANGGAL PENGECEKAN</th>
							<th>NAMA PEGAWAI</th>
							<th>JUMLAH METER</th>
							<th>BIAYA</th>
							<th>DOKUMENTASI PENGECEKAN (Latitude & Longtitude)</th>
							<th>EDIT</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); 
							//memanggil file koneksi
							$datas = mysqli_query($koneksi, "select * from tagihan") or die(mysqli_error($koneksi));
							

							//script untuk menampilkan data tagihan

							$no = 1;//untuk pengurutan nomor

							//cek jika data tidak kosong akan menampilkan data tagihan
							if (mysqli_num_rows($datas) > 0){

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($datas)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['tgl_tagihan']; ?></td>
						<td><?= $row['no_pelanggan']; ?></td>
						<td><?= $row['jumlah_meter']; ?> Mka</td>
						<td>Rp <?= $row['biaya']; ?></td>
						<td>
							<a href="foto/<?= $row['foto']; ?>" target="_blank">
							<img src="foto/<?= $row['foto']; ?>" style="width: 100px;">
							</a>
								

							</td>
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus data ini?');">Hapus</a>
						</td>
					</tr>
						<?php $no++; } ?>

						  <?php } else { ?>

             <tr>
                <td colspan="7">Data belum tersedia,Silahkan klik tombol "tambah" untuk menginput data</td>
             </tr>

            <?php }?>

					</tbody>
				</table>
			</div>
		</div>
	
	<video controls loop autoplay width="60%" height="20%" muted>
        <track kind="subtitles" src="subtitle.en.vtt" srclang="en" label="English">
        <track kind="subtitles" src="subtitle.spain.vtt" srclang="sv" label="Spain">
        <source src="pdam.mp4" />
        <source src="video.ogg" />
        <source src="video.webm" />
    </video>
	<img src="pdam1.jpg" alt="Deskripsi Gambar" align="right" height="410" width="480">
	
	<footer>
        <p>&copy; 2023 SURYASEMBADA PDAM. All rights reserved.</p>
        <p>Contact: humas@pdam-sby.go.id | Privacy Policy | Terms of Use</p>
        <style>
        footer {
            background-color: #06213F;
            padding: 30px;
            text-align: center;
            color : white;
        }

        footer p {
            margin: 5px;
        }
    </style>
    </footer>
	<!DOCTYPE html>
<html>
<head>
<title>Scroll to Top Button</title>
    <style>
        #scrollToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 16px;
            border: none;
            outline: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
        }
    </style>

<head>
    <title>Scroll to Top Button</title>
    <style>
        #scrollToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 16px;
            border: none;
            outline: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Your webpage content -->

    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">Top</button>

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            var scrollToTopBtn = document.getElementById("scrollToTopBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        }

        // Scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        }
    </script>
</body>
</html>
<?php
//include atau panggil footer.php yang ada folder layouts
  include('footer.php');
?>

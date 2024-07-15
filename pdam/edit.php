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

	<div class="card mt-3">
			<div class="card-header">
				EDIT DATA MONITORING PEGAWAI
				<a href='index.php' class="btn btn-sm btn-dark float-xl-end">|Back|</a>
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');

				$id = $_GET['id']; //mengambil id tagihan yang ingin diubah

				//menampilkan tagihan berdasarkan id
				$data = mysqli_query($koneksi, "select * from tagihan where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form" enctype="multipart/form-data">

					<!-- ini digunakan untuk menampung id yang ingin diubah -->
					<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">

					<div class = "col  col-4"> 
						<label>TANGGAL MONITORING</label>
						<input type="date" name="tgl_tagihan" required="" class="form-control" value="<?= $row['tgl_tagihan']; ?>">
					</div>
					<div class = "mt-2 col"> 
						<label>No.PEGAWAI</label>
						<input type="text" name="no_pelanggan" required="" class="form-control" value="<?= $row['no_pelanggan']; ?>">
					</div>
					<div class = "mt-2 col"> 
						<label>JUMLAH METER</label>
						<div class="input-group mb-3">
						 	<input type="number" min="0" name="jumlah_meter" class="form-control" value="<?= $row['jumlah_meter']; ?>">
						 	<span class="input-group-text">m2</span>
						</div>
					</div>
					<div class = "mt-2 col"> 
						<label>BIAYA TAGIHAN</label>
						<div class="input-group mb-3">
						 	<span class="input-group-text">Rp</span>
								<input type="number" min="0" name="biaya" class="form-control" value="<?= $row['biaya']; ?>">
						</div>
					</div>

					<div class = "mt-2 col"> 
						<label>Foto Sebelumnya</label>
						<br>
						<img src="foto/<?= $row['foto']; ?>" class="col-3">
						 <input type="hidden" name="foto_sebelumnya" value="<?= $row['foto']; ?>" />
					</div>


					<div class = "mt-2 col"> 
						<label>Foto Baru (abaikan jika tidak ingin ganti foto)</label>
						 <input type="file" name="foto" class="form-control"/>
					</div>


					<button type="submit" class="btn btn-primary mt-3" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$tgl_tagihan = $_POST['tgl_tagihan'];
					$no_pelanggan = $_POST['no_pelanggan'];
					$jumlah_meter = $_POST['jumlah_meter'];
					$biaya = $_POST['biaya'];

					$nama_foto1   = $_FILES['foto']['name'];
			        $file_tmp1    = $_FILES['foto']['tmp_name'];   
			        $acak1      = rand(1,99999);

			        	//cek jika foto baru tidak ada
			          if($nama_foto1 != "") {
			            $nama_unik1     = $acak1.$nama_foto1;
			            move_uploaded_file($file_tmp1,'foto/'.$nama_unik1);
			          } else {
			          	//maka tetap pakai foto lama
			            $nama_unik1 = $_POST['foto_sebelumnya'];
			          }
			      
			        $foto = $nama_unik1;

					//query mengubah tagihan
					mysqli_query($koneksi, "update tagihan set tgl_tagihan='$tgl_tagihan', no_pelanggan='$no_pelanggan', jumlah_meter='$jumlah_meter', biaya='$biaya', foto='$foto' where id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}



				?>
			</div>
		</div>
	</div>
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
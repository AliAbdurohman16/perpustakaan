<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Mahasiswa</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIM</label>
                        <input type="number" class="form-control" name="nim" id="exampleFormControlInput1" value="<?php echo $_POST['nim']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="<?php echo $_POST['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L"<?php echo ($_POST['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P"<?php echo ($_POST['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">Pilih Prodi</option>
                            <option value="Teknik Informatika"<?php echo ($_POST['prodi'] == 'Teknik Informatika' || $data['prodi_mahasiswa'] == 'Teknik Informatika') ? ' selected' : ''; ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi"<?php echo ($_POST['prodi'] == 'Sistem Informasi' || $data['prodi_mahasiswa'] == 'Sistem Informasi') ? ' selected' : ''; ?>>Sistem Informasi</option>
                            <option value="Desain Komunikasi Visual"<?php echo ($_POST['prodi'] == 'Desain Komunikasi Visual' || $data['prodi_mahasiswa'] == 'Desain Komunikasi Visual') ? ' selected' : ''; ?>>Desain Komunikasi Visual</option>
                            <option value="Manajemen Informatika"<?php echo ($_POST['prodi'] == 'Manajemen Informatika' || $data['prodi_mahasiswa'] == 'Manajemen Informatika') ? ' selected' : ''; ?>>Manajemen Informatika</option>
                            <option value="Teknik Sipil"<?php echo ($_POST['prodi'] == 'Teknik Sipil' || $data['prodi_mahasiswa'] == 'Teknik Sipil') ? ' selected' : ''; ?>>Teknik Sipil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="no_telp" id="exampleFormControlInput1" value="<?php echo $_POST['no_telp']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required><?php echo $_POST['alamat']; ?></textarea>
                    </div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO mahasiswa (nim_mahasiswa, nama_mahasiswa, jk_mahasiswa, prodi_mahasiswa, no_telp_mahasiswa, alamat_mahasiswa) VALUES ('$nim', '$nama', '$jk', '$prodi', '$no_telp', '$alamat')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    if(confirm('Data berhasil ditambahkan!')) {
                        window.location.href = 'index.php?page=mahasiswa';
                    }
                </script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }
?>
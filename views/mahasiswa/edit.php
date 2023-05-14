<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Mahasiswa</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = $conn->query("SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
                            $data = mysqli_fetch_assoc($sql);
                        } else {
                            echo "ID mahasiswa tidak ditemukan!";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIM</label>
                        <input type="number" class="form-control" name="nim" id="exampleFormControlInput1" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : $data['nim_mahasiswa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $data['nama_mahasiswa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L"<?php echo ($_POST['jk'] == 'L' || $data['jk_mahasiswa'] == 'L') ? ' selected' : ''; ?>>Laki-laki</option>
                            <option value="P"<?php echo ($_POST['jk'] == 'P' || $data['jk_mahasiswa'] == 'P') ? ' selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">Pilih Prodi</option>
                            <option value="Teknik Informatika" <?php echo ($data['prodi_mahasiswa'] == 'Teknik Informatika') ? 'selected' : ((isset($_POST['prodi']) == 'Teknik Informatika') ? 'selected' : ''); ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?php echo ($data['prodi_mahasiswa'] == 'Sistem Informasi') ? 'selected' : ((isset($_POST['prodi']) == 'Sistem Informasi') ? 'selected' : ''); ?>>Sistem Informasi</option>
                            <option value="Desain Komunikasi Visual" <?php echo ($data['prodi_mahasiswa'] == 'Desain Komunikasi Visual') ? 'selected' : ((isset($_POST['prodi']) == 'Desain Komunikasi Visual') ? 'selected' : ''); ?>>Desain Komunikasi Visual</option>
                            <option value="Manajemen Informatika" <?php echo ($data['prodi_mahasiswa'] == 'Manajemen Informatika') ? 'selected' : ((isset($_POST['prodi']) == 'Manajemen Informatika') ? 'selected' : ''); ?>>Manajemen Informatika</option>
                            <option value="Teknik Sipil" <?php echo ($data['prodi_mahasiswa'] == 'Teknik Sipil') ? 'selected' : ((isset($_POST['prodi']) == 'Teknik Sipil') ? 'selected' : ''); ?>>Teknik Sipil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="no_telp" id="exampleFormControlInput1" value="<?php echo isset($_POST['no_telp']) ? $_POST['no_telp'] : $data['no_telp_mahasiswa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required><?php echo isset($_POST['nim']) ? $_POST['alamat'] : $data['alamat_mahasiswa']; ?></textarea>
                    </div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE mahasiswa SET nim_mahasiswa='$nim', nama_mahasiswa='$nama', jk_mahasiswa='$jk', prodi_mahasiswa='$prodi', no_telp_mahasiswa='$no_telp', alamat_mahasiswa='$alamat' WHERE id_mahasiswa='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    if(confirm('Data berhasil diedit!')) {
                        window.location.href = 'index.php?page=mahasiswa';
                    }
                </script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }
?>
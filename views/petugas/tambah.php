<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Petugas</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="<?php echo $_POST['nama']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="exampleFormControlInput1" value="<?php echo $_POST['jabatan']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="no_telp" id="exampleFormControlInput1" value="<?php echo $_POST['no_telp']; ?>"  required>
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
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO petugas (nama_petugas, jabatan_petugas, no_telp_petugas, alamat_petugas) VALUES ('$nama', '$jabatan', '$no_telp', '$alamat')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    if(confirm('Data berhasil ditambahkan!')) {
                        window.location.href = 'index.php?page=petugas';
                    }
                </script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }
?>
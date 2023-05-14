<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Petugas</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = $conn->query("SELECT * FROM petugas WHERE id_petugas='$id'");
                            $data = mysqli_fetch_assoc($sql);
                        } else {
                            echo "ID petugas tidak ditemukan!";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $data['nama_petugas']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="exampleFormControlInput1" value="<?php echo isset($_POST['jabatan']) ? $_POST['jabatan'] : $data['jabatan_petugas']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="no_telp" id="exampleFormControlInput1" value="<?php echo isset($_POST['no_telp']) ? $_POST['no_telp'] : $data['no_telp_petugas']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required><?php echo isset($_POST['alamat']) ? $_POST['alamat'] : $data['alamat_petugas']; ?></textarea>
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
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
    
        $sql = "UPDATE petugas SET nama_petugas='$nama', jabatan_petugas='$jabatan', no_telp_petugas='$no_telp', alamat_petugas='$alamat' WHERE id_petugas=$id";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    if(confirm('Data berhasil diedit!')) {
                        window.location.href = 'index.php?page=petugas';
                    }
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    
?>
<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Buku</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <?php 
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = $conn->query("SELECT * FROM buku WHERE id_buku='$id'");
                            $data = mysqli_fetch_assoc($sql);
                        } else {
                            echo "ID buku tidak ditemukan!";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku" id="exampleFormControlInput1" value="<?php echo isset($_POST['kode_buku']) ? $_POST['kode_buku'] : $data['kode_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" id="exampleFormControlInput1" value="<?php echo isset($_POST['judul_buku']) ? $_POST['judul_buku'] : $data['judul_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penulis Buku</label>
                        <input type="text" class="form-control" name="penulis_buku" id="exampleFormControlInput1" value="<?php echo isset($_POST['penulis_buku']) ? $_POST['penulis_buku'] : $data['penulis_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penerbit Buku</label>
                        <input type="text" class="form-control" name="penerbit_buku" id="exampleFormControlInput1" value="<?php echo isset($_POST['penerbit_buku']) ? $_POST['penerbit_buku'] : $data['penerbit_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_penerbit" id="exampleFormControlInput1" value="<?php echo isset($_POST['tahun_penerbit']) ? $_POST['tahun_penerbit'] : $data['tahun_penerbit']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" id="exampleFormControlInput1" value="<?php echo isset($_POST['stok']) ? $_POST['stok'] : $data['stok']; ?>" required>
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
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $penerbit_buku = $_POST['penerbit_buku'];
    $tahun_penerbit = $_POST['tahun_penerbit'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET kode_buku='$kode_buku', judul_buku='$judul_buku', penulis_buku='$penulis_buku', penerbit_buku='$penerbit_buku', tahun_penerbit='$tahun_penerbit', stok='$stok' WHERE id_buku='$id'";
    if ($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil diedit!')) {
                    window.location.href = 'index.php?page=buku';
                }
            </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

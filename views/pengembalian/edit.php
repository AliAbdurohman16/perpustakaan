<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Pengembalian</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = $conn->query("SELECT * FROM pengembalian WHERE id_pengembalian='$id'");
                            $data = mysqli_fetch_assoc($sql);
                        } else {
                            echo "ID pengembalian tidak ditemukan!";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <select name="buku" class="form-control" required>
                            <option value="">Pilih Judul Buku</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM buku");
                                foreach ($sql as $buku) {
                            ?>
                                <option value="<?= $buku['id_buku']?>" <?php echo $buku['id_buku'] == $data['id_buku'] || $_POST['buku'] == $buku['id_buku'] ? 'selected' : ''; ?>><?= $buku['judul_buku']?></option>
                                
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mahasiswa</label>
                        <select name="mahasiswa" class="form-control" required>
                            <option value="">Pilih Mahasiswa</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM mahasiswa");
                                foreach ($sql as $mahasiswa) {
                            ?>
                                <option value="<?= $mahasiswa['id_mahasiswa']?>" <?php echo $mahasiswa['id_mahasiswa'] == $data['id_mahasiswa'] || $_POST['mahasiswa'] == $mahasiswa['id_mahasiswa'] ? 'selected' : '' ?>>
                                    <?= $mahasiswa['nim_mahasiswa']?> - <?= $mahasiswa['nama_mahasiswa']?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_kembali" id="exampleFormControlInput1" value="<?php echo isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : $data['tanggal_pengembalian']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Denda</label>
                        <input type="number" class="form-control" name="denda" id="exampleFormControlInput1" value="<?php echo isset($_POST['denda']) ? $_POST['denda'] : $data['denda']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Petugas</label>
                        <select name="petugas" class="form-control" required>
                            <option value="">Pilih Nama Petugas</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM petugas");
                                foreach ($sql as $petugas) {
                            ?>
                                <option value="<?= $petugas['id_petugas']?>" <?php echo $petugas['id_petugas'] == $data['id_petugas'] || $_POST['petugas'] == $petugas['id_petugas'] ? 'selected' : ''; ?>><?= $petugas['nama_petugas']?></option>
                            <?php
                                }
                            ?>
                        </select>
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
    $buku = $_POST['buku'];
    $mahasiswa = $_POST['mahasiswa'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $denda = $_POST['denda'];
    $petugas = $_POST['petugas'];

    $sql = "UPDATE pengembalian SET tanggal_pengembalian='$tgl_kembali', denda='$denda', id_buku='$buku', id_mahasiswa='$mahasiswa', id_petugas='$petugas' WHERE id_pengembalian='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil diedit!')) {
                    window.location.href = 'index.php?page=pengembalian';
                }
            </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

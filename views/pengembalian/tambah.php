<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Pengembalian</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <select name="buku" class="form-control" required>
                            <option value="">Pilih Judul Buku</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM buku");
                                foreach ($sql as $buku) {
                            ?>
                                <option value="<?= $buku['id_buku']?>"><?= $buku['judul_buku']?></option>
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
                                <option value="<?= $mahasiswa['id_mahasiswa']?>"><?= $mahasiswa['nim_mahasiswa']?> - <?= $mahasiswa['nama_mahasiswa']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_kembali" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Denda</label>
                        <input type="number" class="form-control" name="denda" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Petugas</label>
                        <select name="petugas" class="form-control" required>
                            <option value="">Pilih Nama Petugas</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM petugas");
                                foreach ($sql as $petugas) {
                            ?>
                                <option value="<?= $petugas['id_petugas']?>"><?= $petugas['nama_petugas']?></option>
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
        $buku = $_POST['buku'];
        $mahasiswa = $_POST['mahasiswa'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $denda = $_POST['denda'];
        $petugas = $_POST['petugas'];

        $sql = "INSERT INTO pengembalian (tanggal_pengembalian, denda, id_buku, id_mahasiswa, id_petugas) VALUES ('$tgl_kembali', '$denda', '$buku', '$mahasiswa', '$petugas')";

        if ($conn->query($sql) === TRUE) {
?>
            <script type="text/javascript">
                alert("Data berhasil disimpan!");
            </script>
<?php
        } 
    }
?>
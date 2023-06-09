<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Peminjaman</h3>
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
                                <option value="<?= $buku['id_buku']?>" <?php echo (isset($_POST['buku']) && $_POST['buku'] == $buku['id_buku']) ? 'selected' : ''; ?>><?= $buku['judul_buku']?></option>
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
                                <option value="<?= $mahasiswa['id_mahasiswa']?>" <?php echo isset($_POST['mahasiswa']) && $_POST['mahasiswa'] == $mahasiswa['id_mahasiswa'] ? 'selected' : '' ?>>
                                    <?= $mahasiswa['nim_mahasiswa']?> - <?= $mahasiswa['nama_mahasiswa']?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" id="exampleFormControlInput1" value="<?php echo $_POST['tgl_pinjam']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" id="exampleFormControlInput1" value="<?php echo $_POST['tgl_kembali']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Petugas</label>
                        <select name="petugas" class="form-control" required>
                            <option value="">Pilih Nama Petugas</option>
                            <?php
                                $sql = $conn->query("SELECT * FROM petugas");
                                foreach ($sql as $petugas) {
                            ?>
                                <option value="<?= $petugas['id_petugas']?>" <?php echo (isset($_POST['petugas']) && $_POST['petugas'] == $petugas['id_petugas']) ? 'selected' : ''; ?>><?= $petugas['nama_petugas']?></option>
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
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $petugas = $_POST['petugas'];

        $sql = "INSERT INTO peminjaman (tanggal_pinjam, tanggal_kembali, id_buku, id_mahasiswa, id_petugas) VALUES ('$tgl_pinjam', '$tgl_kembali', '$buku', '$mahasiswa', '$petugas')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    if(confirm('Data berhasil ditambahkan!')) {
                        window.location.href = 'index.php?page=peminjaman';
                    }
                </script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }
?>
<div class="col-lg-6 mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Buku</h3>
        </div>
        <div class="container">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penulis Buku</label>
                        <input type="text" class="form-control" name="penulis_buku" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penerbit Buku</label>
                        <input type="text" class="form-control" name="penerbit_buku" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_penerbit" id="exampleFormControlInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" id="exampleFormControlInput1" required>
                    </div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $penulis_buku = $_POST['penulis_buku'];
        $penerbit_buku = $_POST['penerbit_buku'];
        $tahun_penerbit = $_POST['tahun_penerbit'];
        $stok = $_POST['stok'];

        $sql = "INSERT INTO buku (kode_buku, judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, stok) VALUES ('$kode_buku', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$tahun_penerbit', '$stok')";

        if ($conn->query($sql) === TRUE) {
?>
            <script type="text/javascript">
                alert("Data berhasil disimpan!");
            </script>
<?php
        } 
    }
?>
<h2>Data Mahasiswa</h2>
<a href="?page=mahasiswa&aksi=tambah" class="btn btn-primary btn-sm mt-2 mb-2">Tambah Data</a>
<div class="card">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">JK</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM mahasiswa");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim_mahasiswa']; ?></td>
                            <td><?= $data['nama_mahasiswa']; ?></td>
                            <td><?= $data['jk_mahasiswa']; ?></td>
                            <td><?= $data['prodi_mahasiswa']; ?></td>
                            <td><?= $data['no_telp_mahasiswa']; ?></td>
                            <td><?= $data['alamat_mahasiswa']; ?></td>
                            <td>
                                <a href="?page=mahasiswa&aksi=edit&id=<?= $data['id_mahasiswa']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="?page=mahasiswa&aksi=hapus&id=<?= $data['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data mahasiswa ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus' && isset($_GET['id'])) {
    $id_mahasiswa = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil dihapus!')) {
                    window.location.href = 'index.php?page=mahasiswa';
                }
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
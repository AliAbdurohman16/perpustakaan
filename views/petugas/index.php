<h2>Data Petugas</h2>
<a href="?page=petugas&aksi=tambah" class="btn btn-primary btn-sm mt-2 mb-2">Tambah Data</a>
<div class="card">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM petugas");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td><?= $data['jabatan_petugas']; ?></td>
                            <td><?= $data['no_telp_petugas']; ?></td>
                            <td><?= $data['alamat_petugas']; ?></td>
                            <td>
                                <a href="?page=petugas&aksi=edit&id=<?= $data['id_petugas']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="?page=petugas&aksi=hapus&id=<?= $data['id_petugas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data petugas ini?')">Hapus</a>
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
    $id_petugas = $_GET['id'];
    $sql = "DELETE FROM petugas WHERE id_petugas = '$id_petugas'";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil dihapus!')) {
                    window.location.href = 'index.php?page=petugas';
                }
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
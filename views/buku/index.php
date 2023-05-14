<h2>Data Buku</h2>
<a href="?page=buku&aksi=tambah" class="btn btn-primary btn-sm mt-2 mb-2">Tambah Data</a>
<div class="card">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM buku");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['kode_buku']; ?></td>
                            <td><?= $data['judul_buku']; ?></td>
                            <td><?= $data['penulis_buku']; ?></td>
                            <td><?= $data['penerbit_buku']; ?></td>
                            <td><?= $data['tahun_penerbit']; ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td>
                                <a href="?page=buku&aksi=edit&id=<?= $data['id_buku']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="?page=buku&aksi=hapus&id=<?= $data['id_buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data buku ini?')">Hapus</a>
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
    $id_buku = $_GET['id'];
    $sql = "DELETE FROM buku WHERE id_buku = '$id_buku'";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil dihapus!')) {
                    window.location.href = 'index.php?page=buku';
                }
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
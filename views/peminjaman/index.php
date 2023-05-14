<h2>Data Peminjaman</h2>
<a href="?page=peminjaman&aksi=tambah" class="btn btn-primary btn-sm mt-2 mb-2">Tambah Data</a>
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
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM peminjaman INNER JOIN buku ON buku.id_buku = peminjaman.id_buku INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = peminjaman.id_mahasiswa INNER JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas ORDER BY peminjaman.id_peminjaman ASC");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim_mahasiswa']; ?></td>
                            <td><?= $data['nama_mahasiswa']; ?></td>
                            <td><?= $data['judul_buku']; ?></td>
                            <td><?= $data['tanggal_pinjam']; ?></td>
                            <td><?= $data['tanggal_kembali']; ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td>
                                <a href="?page=peminjaman&aksi=edit&id=<?= $data['id_peminjaman']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="?page=peminjaman&aksi=hapus&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data peminjaman ini?')">Hapus</a>
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
    $id_peminjaman = $_GET['id'];
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if(confirm('Data berhasil dihapus!')) {
                    window.location.href = 'index.php?page=peminjaman';
                }
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
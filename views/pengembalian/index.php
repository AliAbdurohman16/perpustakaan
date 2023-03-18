<h2>Data Pengembalian</h2>
<a href="?page=pengembalian&aksi=tambah" class="btn btn-primary btn-sm mt-2 mb-2">Tambah Data</a>
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
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">denda</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM pengembalian INNER JOIN buku ON buku.id_buku = pengembalian.id_buku INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = pengembalian.id_mahasiswa INNER JOIN petugas ON petugas.id_petugas = pengembalian.id_petugas");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim_mahasiswa']; ?></td>
                            <td><?= $data['nama_mahasiswa']; ?></td>
                            <td><?= $data['judul_buku']; ?></td>
                            <td><?= $data['tanggal_pengembalian']; ?></td>
                            <td>Rp <?= $data['denda']; ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
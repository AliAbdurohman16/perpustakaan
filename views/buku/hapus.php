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
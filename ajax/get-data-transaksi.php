<?php

include '../config/koneksi.php';

if(isset($_GET['kode_transaksi'])) {
    $id = $_GET['kode_transaksi'];
    $queryTrans = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id = '$id'");
    $rowPengembalian = mysqli_fetch_assoc($queryTrans);

    $res = json_encode(['data' => $rowPengembalian]);
    echo $res;
}

?>
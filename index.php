<?php
session_start();
include 'config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        nav.menu {
            background-color: white;
            box-shadow: 0 0 3px #000;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar menu navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=peminjaman">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=pengembalian">Pengembalian</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?pg=kategori">Kategori</a></li>
                                <li><a class="dropdown-item" href="?pg=buku">Buku</a></li>
                                <li><a class="dropdown-item" href="?pg=anggota">Anggota</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="?pg=user">User</a></li>
                                <li><a class="dropdown-item" href="?pg=level">Level</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-danger" href="?pg=keluar">Keluar</a>
                    </form>
                </div>
            </div>
        </nav>

        <!-- content here-->
        <?php
        if (isset($_GET['pg'])) {
            if (file_exists('content/' . $_GET['pg'] . '.php')) {
                include 'content/' . $_GET['pg'] . '.php';
            } else {
                echo "not found";
            }
        } else {
            include 'content/home.php';
        }
        ?>
        <!-- end content-->
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $("#id_kategori").change(function() {
            let id = $(this).val();
            let option = "";
            $.ajax({
                url: "ajax/get-buku.php?id_kategori=" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    option += "<option>Pilih Buku</option>"
                    $.each(res, function(key, value) {
                        option += "<option value=" + value.id + ">" + value.judul + "</option>"
                        // console.log("valuenya : ", value.judul);
                    });
                    $('#id_buku').html(option);
                }
            })
        });
    </script>
</body>

</html>
<?php include "../conn.php"; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda Belum Login.'); window.location = '../loginout.php'</script>";
}
if ($_SESSION['level'] != "admin") {
    echo "<script>alert('Terjadi Ketidaksinkronisasi.'); window.location = '../loginout.php'</script>";
}
?>
<?php
$id = $_GET['id'];
$ambil = "SELECT * FROM customer WHERE id= $id";
$query = mysqli_query($koneksi, $ambil);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Peminjaman Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .header img {
            width: 200px;
        }

        .header .Kop {
            width: 400px;
            font-size: 10rem;
        }

        .table td,
        .table th {
            font-size: 1.2rem;
        }

        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature div {
            text-align: center;
            width: 30%;
        }

        .signature span {
            display: block;
            margin-top: 50px;
        }

        .signature .aju,
        .signature .setuju,
        .signature .approved {
            font-size: 0.8rem;
            margin-bottom: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <table class="table-borderless w-100">
                <tr>
                    <td><img src="logo2.png" alt="Logo"></td>
                    <td><img src="kop2.png" alt="Kop" class="Kop"></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="text-right">
            <p><strong>Tanggal Dibuat:</strong> <?php echo date("d-M-Y"); ?></p>
        </div>
        <div class="content">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Nama Pemesan</td>
                        <td><?php echo $data['namapemesan']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo $data['haritgl']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td><?php echo $data['no_telp']; ?></td>
                    </tr>
                    <tr>
                        <td>Unit</td>
                        <td><?php echo $data['unit']; ?></td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td><?php echo $data['area']; ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td><?php echo $data['tujuan']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Penumpang</td>
                        <td><?php echo $data['jumlahpenumpang']; ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Awal</td>
                        <td><?php echo $data['waktuawal']; ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Akhir</td>
                        <td><?php echo $data['waktuakhir']; ?></td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td><?php echo $data['catatan']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="signature">
            <div class="aju">
                <span>Diajukan oleh,</span>
                <br>
                <span>(________________)</span>
                <br>
                <span>Marketing</span>
            </div>
            <div class="setuju">
                <span>Disetujui oleh,</span>
                <br>
                <span>(________________)</span>
                <br>
                <span>Senior Manager</span>
            </div>
            <div class="approved">
                <span>Diketahui oleh,</span>
                <br>
                <span>(________________)</span>
                <br>
                <span>Direktur</span>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
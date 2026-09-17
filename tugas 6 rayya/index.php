<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Latihan - Tiket Online Jakarta - Malaysia</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>: Latihan</h2>

<div class="container">
    <div class="form-box">
        <h3>Tiket Online Jakarta - Malaysia</h3>
        <form method="post" action="proses.php">
            <div class="form-row">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama">
            </div>

            <div class="form-row">
                <label for="kode_pesawat">Pilih Kode Pesawat</label>
                <select id="kode_pesawat" name="kode_pesawat">
                    <option value="GRD">GRD</option>
                    <option value="GA1">GA1</option>
                    <option value="AA2">AA2</option>
                    <option value="LN3">LN3</option>
                </select>
            </div>

            <div class="form-row">
                <label>Pilih Kelas</label>
                <div class="radio-group">
                    <?php foreach ($harga_kelas as $nama_kelas => $harga) { ?>
                        <label>
                            <input type="radio" name="kelas" value="<?php echo $nama_kelas; ?>">
                            <?php echo $nama_kelas; ?>
                        </label>
                    <?php } ?>
                </div>
            </div>

            <div class="form-row">
                <label for="jumlah_tiket">Jumlah Tiket</label>
                <select id="jumlah_tiket" name="jumlah_tiket">
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="btn-row">
                <button type="submit">SIMPAN</button>
                <button type="reset">BATAL</button>
            </div>
        </form>
    </div>

    <div class="total-box">
        <h3>Total Bayar</h3>
        <p>&rArr; Harga tiket * Jumlah tiket</p>

        <?php
        // kalau ada data dari proses.php, tampilkan hasilnya
        if (isset($_SESSION['total'])) {
            echo "<p>Nama: " . $_SESSION['nama'] . "</p>";
            echo "<p>Kelas: " . $_SESSION['kelas'] . "</p>";
            echo "<p>Jumlah Tiket: " . $_SESSION['jumlah'] . "</p>";
            echo "<div class='total-result'>Rp " . number_format($_SESSION['total'], 0, ",", ".") . "</div>";

            // hapus session setelah ditampilkan
            session_unset();
        }
        ?>
    </div>
</div>

</body>
</html>

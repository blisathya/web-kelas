<?php include 'koneksi.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama  = $_POST['nama'];
    $nim   = $_POST['nim'];
    $quote = $_POST['quote'];

    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    move_uploaded_file($foto_tmp, "img/" . $foto_name);

    $insert = mysqli_query($conn, "INSERT INTO mahasiswa (nama, nim, quote, foto) 
        VALUES ('$nama', '$nim', '$quote', '$foto_name')");

    if ($insert) {
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quotes</label>
                                <textarea name="quote" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto (JPG/PNG)</label>
                                <input type="file" name="foto" class="form-control" accept="image/*" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center text-muted mt-3">© <?= date('Y') ?> Kelas Informatika</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Website Kelas Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #0a3d62;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand:hover {
            color: #f0c929;
        }

        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
            border-radius: 12px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #0a3d62;
            margin-top: 1rem;
        }

        .name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2d3436;
        }

        .nim {
            font-size: 0.9rem;
            color: #636e72;
        }

        .quote {
            font-style: italic;
            font-size: 0.88rem;
            color: #444;
            margin-bottom: 1rem;
        }

        .add-btn {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        .add-btn a {
            background-color: #f0c929;
            border: none;
            color: #000;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .add-btn a:hover {
            background-color: #ffd900;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Kelas Informatika</a>
        </div>
    </nav>

    <div class="container">
        <div class="add-btn">
            <a href="tambah.php">✚ Tambah Mahasiswa</a>
        </div>

        <div class="row">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card text-center">
                        <img src="img/<?php echo $data['foto']; ?>" class="mx-auto mt-3" alt="Foto <?php echo $data['nama']; ?>">
                        <div class="card-body">
                            <div class="name"><?php echo $data['nama']; ?></div>
                            <div class="nim"><?php echo $data['nim']; ?></div>
                            <div class="quotes">"<?php echo $data['quotes']; ?>"</div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>
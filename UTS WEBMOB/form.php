<?php
// Panggil file koneksi
require 'connection.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaPegawai = $_POST['namaPegawai'];
    $jabatanPegawai = $_POST['jabatanPegawai'];
    $gaji = $_POST['gajiPegawai'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $alamatPegawai = $_POST['alamatPegawai'];

    // Query untuk memasukkan data pegawai ke dalam tabel
    $sql = "INSERT INTO pegawai (nama_pegawai, jabatan, gaji, tanggal_lahir, jenis_kelamin, alamat)
            VALUES ('$namaPegawai', '$jabatanPegawai', '$gaji','$tanggalLahir', '$jenisKelamin', '$alamatPegawai')";

    // Eksekusi query dan cek apakah data berhasil dimasukkan
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                window.location.href = 'form.php';
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Workers</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="form.css" rel="stylesheet">
    <link href="file_css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="file_css/form.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        html
        body {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            min-height: 100%;
            position: relative;
        }

        .container {
            padding-bottom: 60px;
            /* Height of the footer */
        }

        .copyright-container {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="dashboard.php">Menu</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="form.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>INPUT EMPLOYEE</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="update.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>EDIT EMPLOYEE</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="aboutUs.php" class="sidebar-link">
                        <i class="bi bi-info-circle"></i>
                        <span>About Us</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="login.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="container mt-5" align="center">
            <div class="card animate-slideInDown" align="left">
                <div class="card-header animate-slideInDown">
                    <h3 class="text-center">Input Employee</h3>
                </div>
                <div class="card-body">
                    <form action="form.php" method="POST">
                        <div class="mb-3 animate-slideInDown">
                            <label for="namaPegawai" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="namaPegawai" name="namaPegawai"
                                placeholder="Input employee name" required>
                        </div>

                        <div class="mb-3 animate-slideInDown">
                            <label for="jabatanPegawai" class="form-label">Position</label>
                            <select class="form-select" id="jabatanPegawai" name="jabatanPegawai" required>
                                <option value="" disabled selected>Select Position</option>
                                <option value="Direktur">Director</option>
                                <option value="Manajer">Manager</option>
                                <option value="Karyawan">Employee</option>
                            </select>
                        </div>

                        <div class="mb-3 animate-slideInDown">
                            <label for="gajiPegawai" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="gajiPegawai" name="gajiPegawai"
                                placeholder="Input employee salary" required>
                        </div>

                        <div class="mb-3 animate-slideInDown">
                            <label for="tanggalLahir" class="form-label">Date of birth</label>
                            <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
                        </div>

                        <div class="mb-3 animate-slideInDown">
                            <label for="jenisKelamin" class="form-label">Gender</label>
                            <select class="form-select" id="jenisKelamin" name="jenisKelamin" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Laki-laki">Male</option>
                                <option value="Perempuan">Female</option>
                            </select>
                        </div>

                        <div class="mb-3 animate-slideInDown">
                            <label for="alamatPegawai" class="form-label">Address</label>
                            <textarea class="form-control" id="alamatPegawai" name="alamatPegawai" rows="3"
                                placeholder="Input employee address" required></textarea>
                        </div>

                        <div class="text-center animate-slideInDown">
                            <button type="submit" class="btn btn-primary w-100 mb-2">Save Data</button>
                            <button type="reset" class="btn btn-danger w-100">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Footer fixed at the bottom -->
        <div class="copyright-container">
            <p class="mb-0">&copy; Worker Management Data. All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="file_js/dashboard.js"></script>
</body>

</html>
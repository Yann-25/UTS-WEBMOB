<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Data Pegawai</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="file_css/dashboard.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <style>
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
                    <a href="#">Menu</a>
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
                        <span>ABOUT US</span>
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

        <div class="main p-3">
            <div class="text-center mb-4 animate__animated animate__fadeInLeft">
                <h1><b>Main Dashboard</b></h1>
            </div>

            <div class="row animate__animated animate__fadeInLeft">
    <!-- Card untuk Chart Jabatan -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header text-center" style="background-color: #ffd65f">
                <h5 class="card-title" style="color: navy"><b>Employee Distribution by Position</b></h5>
            </div>
            <div class="card-body">
                <canvas id="jabatanChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
    </div>

    <!-- Card untuk Chart Jenis Kelamin -->
    <div class="col-md-6 mb-4 animate__animated animate__fadeInLeft">
        <div class="card">
            <div class="card-header text-center" style="background-color: #ffd65f">
                <h5 class="card-title" style="color: navy"><b> Employee Distribution by Gender </b></h5>
            </div>
            <div class="card-body">
                <canvas id="jenisKelaminChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
    </div>

    <!-- Card untuk Total Gaji Pegawai -->
    <div class="col-md-12 mb-4 animate__animated animate__fadeInLeft">
        <div class="card">
            <div class="card-header text-center bg-success">
                <h5 class="card-title text-light">Total Salary of Employees</h5>
            </div>
            <div class="card-body">
                <canvas id="totalGajiChart" style="width:100%"></canvas>
            </div>
        </div>
    </div>
</div>

            <!-- Tabel Data Pegawai -->
            <div class="row animate__animated animate__fadeInLeft">
                <div class="col-md-12 mb-4">
                    <div class="card" id="card1">
                        <div class="card-header text-center" style="background-color: #001f3f">
                            <h5 class="card-title"style="color: #ffd65f"><b>Employee Data Table</b></h5>
                        </div>
                        <div class="card-body">
                            <!-- <h5 align="center" class="bg-secondary">Employee Data Table</h5> -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Gaji</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="employeeTable">
                                        <!-- Data pegawai akan dimasukkan di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
    // Chart untuk Jabatan
    fetch('getData.php?type=jabatan')
        .then(response => response.json()) // Mengubah respons menjadi JSON
        .then(data => {
            const xValues = data.map(item => item.jabatan); // Jabatan sebagai label
            const yValues = data.map(item => item.jumlah_pegawai); // Jumlah pegawai sebagai data

            const barColors = [
                "#9A342A",
                "#A16050",
                "#F2C88C"
            ];

            // Membuat chart untuk jabatan
            new Chart("jabatanChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Distribusi Jabatan Pegawai'
                    }
                }
            });
        });

    // Chart untuk Jenis Kelamin
    fetch('getData.php?type=jenis_kelamin')
        .then(response => response.json()) // Mengubah respons menjadi JSON
        .then(data => {
            const xValues = data.map(item => item.jenis_kelamin); // Jenis kelamin sebagai label
            const yValues = data.map(item => item.jumlah_pegawai); // Jumlah pegawai sebagai data

            const barColors = [
                "#32447A", // Laki-laki
                "#B971BD"  // Perempuan
            ];

            // Membuat chart untuk jenis kelamin
            new Chart("jenisKelaminChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Distribusi Jenis Kelamin Pegawai'
                    }
                }
            });
        });

    // Chart untuk Total Gaji Pegawai
    fetch('getData.php?type=total_gaji')
        .then(response => response.json()) // Mengubah respons menjadi JSON
        .then(data => {
            const totalGaji = data.total_gaji || 0; // Total gaji pegawai
            const xValues = ['Total Gaji']; // Label
            const yValues = [totalGaji]; // Data

            const barColors = ['#43BC69']; // Warna grafik

            // Membuat chart untuk total gaji
            new Chart("totalGajiChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: 'Total Gaji Pegawai',
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Total Gaji Pegawai'
                    }
                }
            });
        });

    // Fetch data for employee table
    fetch('getData.php?type=all')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('employeeTable');
            data.forEach(employee => {
                const row = `
                    <tr>
                        <td>${employee.id}</td>
                        <td>${employee.nama_pegawai}</td>
                        <td>${employee.jabatan}</td>
                        <td>${employee.gaji}</td>
                        <td>${employee.tanggal_lahir}</td>
                        <td>${employee.jenis_kelamin}</td>
                        <td>${employee.alamat}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        });
</script>


        </div>
    </div>

    <div class="copyright-container">
        <p class="mb-0">&copy; Worker Management Data. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="file_js/dashboard.js"></script>

</body>

</html>
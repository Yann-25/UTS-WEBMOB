<?php
include 'connection.php';

// Error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables
$id = $nama_pegawai = $jabatan = $gaji = $tanggal_lahir = $jenis_kelamin = $alamat = '';
$search = '';
$edit_state = false;

// Handle Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE pegawai SET nama_pegawai='$nama_pegawai', jabatan='$jabatan', gaji='$gaji', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM pegawai WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Handle Search
if (isset($_POST['search'])) {
    $search = $_POST['search_term'];
    // Update query to search by ID or other fields
    $sql = "SELECT * FROM pegawai WHERE id='$search' OR nama_pegawai LIKE '%$search%' OR jabatan LIKE '%$search%' OR gaji LIKE '%$search%' OR tanggal_lahir LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR alamat LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM pegawai";
}

$result = $conn->query($sql);

// Handle Edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true; // This triggers the form to be in edit mode.
    $edit_result = $conn->query("SELECT * FROM pegawai WHERE id='$id'");
    
    if ($edit_result->num_rows > 0) {
        $row = $edit_result->fetch_assoc();
        $nama_pegawai = $row['nama_pegawai'];
        $jabatan = $row['jabatan'];
        $gaji = $row['gaji'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $alamat = $row['alamat'];
    }
}

// Handle cancel operation
if (isset($_POST['cancel'])) {
    // Reset all variables to exit edit mode
    $edit_state = false; // Set edit state to false
    $id = $nama_pegawai = $jabatan = $gaji = $tanggal_lahir = $jenis_kelamin = $alamat = ''; // Reset all form variables
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Workers Data Management</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="file_css/dashboard.css" />
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
  <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    .copyright-container {
      position: flex;
      bottom: 0;
      left: 0;
      right: 0;
      height: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }
    
        @keyframes slideInDown {
        0% {
            opacity: 0;
            transform: translateY(-100%);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slideInDown {
        animation: slideInDown 1s ease-out;
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

    <div class="main p-3">
      <h2 class="mt-3 " align="center">Employee List</h2>

      <!-- Search Form -->
      <form method="post" class="form-inline mb-3">
        <input type="text" name="search_term" class="form-control" placeholder="Find employee..." value="<?= htmlspecialchars($search); ?>">
        <button type="submit" name="search" class="btn btn-primary my-3">Find</button>
      </form>

      <!-- Update Form (only visible when edit is clicked) -->
      <?php if ($edit_state && !isset($_POST['search'])): ?>
        <h4>Edit Employee</h4>
        <form method="post">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="nama_pegawai" class="form-control" value="<?= htmlspecialchars($nama_pegawai); ?>" required>
          </div>
          <div class="form-group">
              <label>Position</label>
              <select name="jabatan" class="form-select" required>
                  <option value="" disabled selected>Select Position</option>
                  <option value="Direktur" <?= $jabatan == 'Direktur' ? 'selected' : ''; ?>>Direktur</option>
                  <option value="Manajer" <?= $jabatan == 'Manajer' ? 'selected' : ''; ?>>Manajer</option>
                  <option value="Karyawan" <?= $jabatan == 'Karyawan' ? 'selected' : ''; ?>>Karyawan</option>
              </select>
          </div>

          <div class="form-group">
            <label>Salary</label>
            <input type="number" name="gaji" class="form-control" value="<?= htmlspecialchars($gaji); ?>" required>
          </div>
          <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?= htmlspecialchars($tanggal_lahir); ?>" required>
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select name="jenis_kelamin" class="form-control" required>
              <option value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'selected' : ''; ?>>Male</option>
              <option value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'selected' : ''; ?>>Female</option>
            </select>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="alamat" class="form-control" value="<?= htmlspecialchars($alamat); ?>" required>
          </div>
          <button type="submit" name="update" class="btn btn-success mt-4">Update Employee</button>
          <button type="submit" name="cancel" class="btn btn-secondary mt-4 ms-2">Cancel</button>
        </form>
      <?php endif; ?>

      <!-- Display Data in Table -->
      <div class="table-responsive mt-5 animate-slideInDown">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Employee Name</th>
              <th>Position</th>
              <th>Salary</th>
              <th>Date of Birth</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['id']); ?></td>
                  <td><?= htmlspecialchars($row['nama_pegawai']); ?></td>
                  <td><?= htmlspecialchars($row['jabatan']); ?></td>
                  <td><?= htmlspecialchars($row['gaji']); ?></td>
                  <td><?= htmlspecialchars($row['tanggal_lahir']); ?></td>
                  <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                  <td><?= htmlspecialchars($row['alamat']); ?></td>
                  <td>
                    <a href="?edit=<?= $row['id']; ?>" 
                      class="btn btn-warning" 
                      style="width: 100px; text-align: center; padding: 7px; margin: 5px; font-size: 12px; display: inline-block; white-space: nowrap;">
                      Edit
                    </a>
                    <a href="?delete=<?= $row['id']; ?>" 
                      class="btn btn-danger" 
                      style="width: 100px; text-align: center; padding: 7px; margin: 5px; font-size: 12px; display: inline-block; white-space: nowrap;" 
                      onclick="return confirm('Yakin ingin menghapus?')">
                      Delete
                    </a>
                </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="8">No data found</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="copyright-container">
    <p class="mb-0">© 2024 Worker Management Data. All Rights Reserved.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="file_js/dashboard.js"></script>
</body>

</html> 
<?php
// Koneksi ke database
include 'connection.php'; // Asumsikan Anda sudah memiliki file connection.php

// Ambil parameter dari URL untuk menentukan jenis data yang diminta
$dataType = isset($_GET['type']) ? $_GET['type'] : 'jabatan';

// Array untuk menyimpan hasil
$data = array();

if ($dataType === 'jabatan') {
    // Query untuk mendapatkan jumlah pegawai berdasarkan jabatan
    $query = "SELECT jabatan, COUNT(*) AS jumlah_pegawai FROM pegawai GROUP BY jabatan";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Loop untuk mendapatkan data dari setiap row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
} elseif ($dataType === 'jenis_kelamin') {
    // Query untuk mendapatkan jumlah pegawai berdasarkan jenis kelamin
    $query = "SELECT jenis_kelamin, COUNT(*) AS jumlah_pegawai FROM pegawai GROUP BY jenis_kelamin";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Loop untuk mendapatkan data dari setiap row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
} elseif ($dataType === 'all') {
    // Query untuk mendapatkan semua data pegawai
    $query = "SELECT id, nama_pegawai, jabatan, gaji, tanggal_lahir, jenis_kelamin, alamat FROM pegawai";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Loop untuk mendapatkan data dari setiap row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
} elseif ($dataType === 'total_gaji') {
    // Query untuk menghitung total gaji pegawai
    $query = "SELECT SUM(gaji) AS total_gaji FROM pegawai";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data['total_gaji'] = $row['total_gaji'];
    } else {
        $data['total_gaji'] = 0;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Tutup koneksi
$conn->close();
?>

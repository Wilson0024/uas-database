<?php

$db = mysqli_connect("localhost:3307", "root", "", "mahasiswa");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk tambah
function tambahmhs($data) {
    global $db;
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $semester = htmlspecialchars($data["semester"]);
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
    $nip = htmlspecialchars($data["nip"]);

    $query = "INSERT INTO mahasiswa values ('$npm','$nama','$jenis_kelamin', '$semester', '$kode_jurusan', '$nip')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambahdosen($data) {
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $email = htmlspecialchars($data["email"]);

    $query = "INSERT INTO dosen values ('$nip', '$nama', '$jenis_kelamin', '$email')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambahjurusan($data) {
    global $db;
    $nama_jurusan = htmlspecialchars($data["nama_jurusan"]);
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);

    $query = "INSERT INTO jurusan values ('$kode_jurusan', '$nama_jurusan')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusmhs($datanpm) {
    global $db;
    $query = "DELETE FROM mahasiswa WHERE npm = '$datanpm'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusdosen($datanip) {
    global $db;
    $query = "DELETE FROM dosen WHERE nip = '$datanip'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusjurusan($data) {
    global $db;
    $query = "DELETE FROM jurusan WHERE kode_jurusan = '$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function updatedosen($data) {
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $email = htmlspecialchars($data["email"]);

    $query = "UPDATE dosen SET
                    nama = '$nama',
                    jenis_kelamin = '$jenis_kelamin',
                    email = '$email'
                    WHERE nip = '$nip'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function updatemhs($data) {
    global $db;
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $semester = htmlspecialchars($data["semester"]);
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
    $nip = htmlspecialchars($data["nip"]);

    $query = "UPDATE mahasiswa SET 
                    nama = '$nama',
                    jenis_kelamin = '$jenis_kelamin',
                    semester = '$semester',
                    kode_jurusan = '$kode_jurusan',
                    nip = '$nip'
                    WHERE npm = '$npm'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function updatejurusan($data) {
    global $db;
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
    $nama_jurusan = htmlspecialchars($data["nama_jurusan"]);

    $query = "UPDATE jurusan SET
                    nama_jurusan = '$nama_jurusan'
                    WHERE kode_jurusan = '$kode_jurusan'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function caridosen($keyword) {
    $query = "SELECT * FROM dosen
                    WHERE 
                    nip LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    jenis_kelamin LIKE '%$keyword%' OR
                    email LIKE '%$keyword%'
                    ";
    return query($query);
}

function carimhs($keyword) {
    $query = "SELECT m.npm, m.nama, m.jenis_kelamin, m.semester, j.nama_jurusan 
    FROM mahasiswa m 
    JOIN jurusan j 
    ON m.kode_jurusan = j.kode_jurusan
    WHERE m.nama LIKE '%$keyword%' 
    OR m.npm LIKE '%$keyword%' 
    OR j.nama_jurusan LIKE '%$keyword%'";                
                
    return query($query);
}

function carijurusan($keyword) {
    $query = "SELECT * FROM jurusan
                    WHERE 
                    kode_jurusan LIKE '%$keyword%' OR
                    nama_jurusan LIKE '%$keyword%'";
    return query($query);
}



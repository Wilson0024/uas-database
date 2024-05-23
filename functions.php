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

function tambahmhs($data) {
    global $db;
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $semester = htmlspecialchars($data["semester"]);
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
    $nip = htmlspecialchars($data["nip"]);

    //query insert data
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

    //query insert data
    $query = "INSERT INTO dosen values ('$nip', '$nama', '$jenis_kelamin', '$email')";
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

function updatemhs($data)
{
    global $db;
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $kode_jurusan = htmlspecialchars($data["kode_jurusan"]);
    $nip = htmlspecialchars($data["nip"]);

    $query = "UPDATE mahasiswa SET nim = '$nim',
                    nama = '$nama',
                    jurusan = '$jurusan',
                    gambar = '$gambar',
                    email = '$email'
                    WHERE id = '$id'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function caridosen($keyword)
{
    $query = "SELECT * FROM dosen
                    WHERE 
                    nip LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    jenis_kelamin LIKE '%$keyword%' OR
                    email LIKE '%$keyword'
                    ";
    return query($query);
}

function carimhs($keyword)
{
    $query = "SELECT * FROM mahasiswa
                    WHERE 
                    npm LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    jenis_kelamin LIKE '%$keyword%' OR
                    semester LIKE %$keyword% OR
                    kode_jurusan LIKE '%$keyword%'
                    ";
    return query($query);
}

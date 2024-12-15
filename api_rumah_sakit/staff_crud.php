<?php
include 'db.php';

// Mendapatkan data dari request
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    // Create data
    $data = json_decode(file_get_contents("php://input"), true);
    $nama = $data['nama'];
    $IDLibrary = $data['IDLibrary'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $no_hp = $data['no_hp'];
    $level = $data['level'];
    $alamat = $data['alamat'];
    $created_by = $data['created_by'];

    $sql = "INSERT INTO tabel_staf (nama, IDLibrary, email, password, no_hp, level, alamat, created_by) 
            VALUES ('$nama', '$IDLibrary', '$email', '$password', '$no_hp', '$level', '$alamat', '$created_by')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data staf berhasil ditambahkan!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} elseif ($method == 'GET') {
    // Read data
    $sql = "SELECT * FROM tabel_staf";
    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} elseif ($method == 'PUT') {
    // Update data
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $nama = $data['nama'];
    $no_hp = $data['no_hp'];
    $level = $data['level'];
    $alamat = $data['alamat'];

    $sql = "UPDATE tabel_staf SET nama='$nama', no_hp='$no_hp', level='$level', alamat='$alamat' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data staf berhasil diperbarui!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} elseif ($method == 'DELETE') {
    // Delete data
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];

    $sql = "DELETE FROM tabel_staf WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data staf berhasil dihapus!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
}
?>

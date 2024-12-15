<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data JSON dari Flutter
    $input = json_decode(file_get_contents("php://input"), true);

    $name = isset($input['name']) ? $input['name'] : null;
    $username = isset($input['username']) ? $input['username'] : null;
    $email = isset($input['email']) ? $input['email'] : null;
    $password = isset($input['password']) ? $input['password'] : null;

    // Validasi input
    if (!$name || !$username || !$email || !$password) {
        echo json_encode(['status' => 'error', 'message' => 'Data input tidak lengkap!']);
        exit();
    }

    // Simpan ke database (contoh hard-coded, harus dihubungkan ke database)
    // Misalnya: mysqli_query($conn, "INSERT INTO users ...");

    echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak valid!']);
}
?>

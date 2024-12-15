<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Cek metode request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data JSON dari Flutter
    $input = json_decode(file_get_contents("php://input"), true);

    // Ambil input username dan password
    $username = isset($input['username']) ? $input['username'] : null;
    $password = isset($input['password']) ? $input['password'] : null;

    // Validasi input
    if (!$username || !$password) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data input tidak lengkap!',
            'debug' => $input
        ]);
        exit();
    }

    // Contoh validasi hard-coded (seharusnya cek database)
    if ($username === 'admin' && $password === 'admin123') {
        echo json_encode([
            'status' => 'success',
            'message' => 'Login berhasil!'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username atau password salah!'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Metode request tidak valid!'
    ]);
}
?>

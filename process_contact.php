<?php
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Metode permintaan tidak didukung."]);
    exit;
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $message === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(["status" => "error", "message" => "Nama, email yang valid, dan pesan wajib diisi."]);
    exit;
}

$to = "muhsafaat21@gmail.com";
$subject = "Pesan dari Website Portfolio";
$body = "Nama: " . htmlspecialchars($name, ENT_QUOTES, "UTF-8") . "\n";
$body .= "Email: " . htmlspecialchars($email, ENT_QUOTES, "UTF-8") . "\n";
$body .= "Pesan:\n" . htmlspecialchars($message, ENT_QUOTES, "UTF-8");
$headers = "From: website@" . ($_SERVER["SERVER_NAME"] ?? "localhost") . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo json_encode(["status" => "success", "message" => "Pesan berhasil dikirim!"]);
    exit;
}

http_response_code(500);
echo json_encode(["status" => "error", "message" => "Server email belum dikonfigurasi. Jalankan situs melalui server PHP dengan SMTP aktif."]);
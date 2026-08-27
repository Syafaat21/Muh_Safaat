<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "aksan12@example.com";
    $subject = "Pesan dari Website Portfolio";
    $body = "Nama: $name\nEmail: $email\nPesan:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Pesan berhasil dikirim!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal mengirim pesan."]);
    }
}

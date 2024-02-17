<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $recaptcha_response = $_POST["g-recaptcha-response"];

    // Validasi reCAPTCHA
    $recaptcha_secret_key = "6LfEoDEpAAAAAJNmo0wyqRbAvil9KpFWq8noSbyh"; // Ganti dengan secret key reCAPTCHA Anda
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptcha_data = [
        'secret' => $recaptcha_secret_key,
        'response' => $recaptcha_response,
    ];

    $recaptcha_options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data),
        ],
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha_data = json_decode($recaptcha_result);

    // Validasi formulir
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.php?status=error3");
        exit();
    } elseif (!$recaptcha_data->success) {
        header("Location: index.php?status=error2");
        exit();
    } else {
        // Kirim email
        $to = "reza@rehad.id"; // Ganti dengan alamat email tujuan Anda
        $subject = "New Form Submission";
        $headers = "From: $email";

        // Isi pesan email
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Message:\n$message";

        // Kirim email
        mail($to, $subject, $email_message, $headers);

        // Redirect ke halaman sukses
        header("Location: index.php?status=success");
        exit();
    }
} else {
    // Jika bukan metode POST, redirect ke halaman lain atau lakukan sesuai kebutuhan Anda
    header("Location: index.php");
    exit();
}
?>
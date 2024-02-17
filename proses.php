<?php
// Pastikan formulir dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai-nilai yang dikirimkan dari formulir
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlentities(trim($_POST["message"]));

    // mengecek validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?status=error2");
        exit;
    }
    // terdapat erro jika form kosong
    if (empty($name) or empty($message)) {
        header("Location: index.php?status=error3");
        exit;
    }
    // terdapat error jika recaptcha tidak terisi
    if (empty($_POST['g-recaptcha-response'])) {
        header("Location: index.php?status=error");
        exit;
    }
    // Kirim pesan ke tujuan yang diinginkan
    // Misalnya, menggunakan fungsi mail() untuk mengirim email
    $to = "reza@rehad.id";
    $subject = "Pesan dari $name";
    $body = "Nama: $name\nEmail: $email\n\n$message";


    if (mail($to, $subject, $body)) {
        // kembali ke home dan muncul modals
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
}
?>

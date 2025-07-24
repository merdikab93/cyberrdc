<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    $to = "mkabuikaone@gmailcom";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $contenu = "Nom : $nom\n";
    $contenu .= "Email : $email\n";
    $contenu .= "Sujet :$sujet\n";
    $contenu .= "Message :\n$message\n";

    if (mail($to, $sujet, $contenu, $headers)) {
        header("Location: contact.html?success=1");
        exit();
    } else {
        header("Location: contact.html?error=1");
        exit();
    }
} else {
    header("Location: contact.html");
    exit();
}
?>
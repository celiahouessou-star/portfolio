<?php
/**
 * Traitement du formulaire de contact.
 * Reçoit les données envoyées par assets/js/main.js et répond en JSON.
 *
 * ⚠️ La fonction mail() de PHP doit être activée chez votre hébergeur
 *    (c'est le cas chez la plupart : OVH, o2switch, Hostinger, IONOS…).
 *    En local (php -S), l'e-mail ne partira pas : c'est normal.
 */
session_start();
header('Content-Type: application/json; charset=utf-8');

$c = require __DIR__ . '/config/content.php';

function respond(bool $ok, string $msg, int $code = 200): void
{
    http_response_code($code);
    echo json_encode(['success' => $ok, 'message' => $msg], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Méthode non autorisée.', 405);
}

// Anti-spam : champ piège rempli = robot
if (!empty($_POST['_honey']) || !empty($_POST['website'])) {
    respond(true, 'Merci ! Votre message a bien été envoyé.');
}

// Anti-spam : 1 message toutes les 30 secondes maximum
if (isset($_SESSION['last_contact']) && time() - $_SESSION['last_contact'] < 30) {
    respond(false, 'Merci de patienter quelques secondes avant de renvoyer un message.', 429);
}

$name    = trim(strip_tags($_POST['name'] ?? ''));
$email   = trim($_POST['email'] ?? '');
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Merci de remplir correctement les champs obligatoires.', 422);
}
if (mb_strlen($message) > 5000 || mb_strlen($name) > 120) {
    respond(false, 'Votre message est trop long.', 422);
}

// Empêche l'injection d'en-têtes
$name    = str_replace(["\r", "\n"], ' ', $name);
$subject = str_replace(["\r", "\n"], ' ', $subject);

$to    = $c['contact']['form_to'];
$title = 'Portfolio — ' . ($subject !== '' ? $subject : 'Nouveau message de ' . $name);
$body  = "Nom : {$name}\nE-mail : {$email}\nSujet : {$subject}\n\n{$message}\n";

$host    = preg_replace('/[^a-z0-9.\-]/i', '', $_SERVER['SERVER_NAME'] ?? 'localhost');
$headers = [
    'From: Portfolio <no-reply@' . $host . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Content-Type: text/plain; charset=UTF-8',
];

$sent = @mail($to, '=?UTF-8?B?' . base64_encode($title) . '?=', $body, implode("\r\n", $headers));

if ($sent) {
    $_SESSION['last_contact'] = time();
    respond(true, 'Merci ' . $name . ' ! Votre message a bien été envoyé, je vous réponds très vite.');
}

respond(false, 'Le message n’a pas pu être envoyé. Écrivez-moi directement à ' . $to . '.', 500);

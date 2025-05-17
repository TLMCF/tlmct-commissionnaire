<?php
// Adresse email du destinataire (vous)
$destinataire = "contact@tlmcf.com"; // Remplacez par votre vraie adresse

// Sujet de l'email
$sujet = "Nouvelle demande de devis depuis votre site web";

// Construction du message à partir des champs du formulaire
$message = "Une nouvelle demande de devis a été soumise :\n\n";
foreach ($_POST as $cle => $valeur) {
    if (is_array($valeur)) {
        $valeur = implode(", ", $valeur);
    }
    $message .= ucfirst($cle) . " : " . htmlspecialchars($valeur) . "\n";
}

// En-têtes de l'email
$headers = "From: no-reply@tlmcf.com\r\n";
$headers .= "Reply-To: " . $_POST['email'] . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi de l'email
if (mail($destinataire, $sujet, $message, $headers)) {
    // Redirection vers une page de remerciement
    header("Location: merci.html");
    exit();
} else {
    echo "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer.";
}
?>

<?php
// contact.php
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $company  = trim($_POST['company'] ?? '');
    $message  = trim($_POST['message'] ?? '');

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
        $to      = 'ewakor.fourniture@gmail.com';
        $subject = 'Nouveau message depuis le site Ewakor';
        $body    = "Nom: $name\n".
                   "Email: $email\n".
                   "Société: $company\n\n".
                   "Message:\n$message";
        $headers = "From: $name <$email>\r\n";

        if (@mail($to, $subject, $body, $headers)) {
            $sent = true;
        } else {
            $error = "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    } else {
        $error = 'Veuillez remplir correctement tous les champs obligatoires.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact – Ewakor</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <script defer src="assets/js/main.js"></script>
</head>
<body>
  <header>
    <div class="container navbar">
      <a href="index.html" class="logo">Ewakor</a>
      <nav>
        <a href="index.html">Accueil</a>
        <a href="products.html">Produits</a>
        <a href="about.html">À propos</a>
        <a href="partners.html">Partenaires</a>
        <a href="contact.php">Contact</a>
      </nav>
    </div>
  </header>

  <section class="hero" style="background-image:none;background:#005baf;color:#ffffff;">
    <h1>Contactez-nous</h1>
  </section>

  <section class="section">
    <div class="container" style="max-width:600px;">
      <?php if ($sent): ?>
        <p>Merci pour votre message. Nous vous répondrons dans les plus brefs délais.</p>
      <?php else: ?>
        <?php if ($error): ?>
          <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="contact.php" style="display:flex;flex-direction:column;gap:1rem;">
          <input type="text" name="name" placeholder="Nom*" required style="padding:0.75rem;border:1px solid #ccc;border-radius:8px;" />
          <input type="email" name="email" placeholder="Email*" required style="padding:0.75rem;border:1px solid #ccc;border-radius:8px;" />
          <input type="text" name="company" placeholder="Société" style="padding:0.75rem;border:1px solid #ccc;border-radius:8px;" />
          <textarea name="message" rows="6" placeholder="Message*" required style="padding:0.75rem;border:1px solid #ccc;border-radius:8px;"></textarea>
          <button type="submit" class="btn" style="width:fit-content;align-self:flex-start;">Envoyer</button>
        </form>
      <?php endif; ?>
    </div>
  </section>

  <section class="section">
    <div class="container" style="height:400px;">
      <!-- Google Map Embed Placeholder -->
      <iframe title="Ewakor Localisation" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.329660344437!2d-7.543559412712786!3d33.57078897427668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd315bd38c2f%3A0x322d1ef83b097d22!2sBE.COMMERCE!5e0!3m2!1sfr!2sma!4v1754399320554!5m2!1sfr!2sma" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>Téléphone : <a href="tel:+212600000000">+212 6 xx xx xx xx</a> | Email : <a href="mailto:ewakor.fourniture@gmail.com">ewakor.fourniture@gmail.com</a></p>
      <p>Km 10 Route de Casablanca, Marrakech, Maroc</p>
      <div>
        <a href="#">LinkedIn</a> · <a href="#">Facebook</a>
      </div>
      <p style="margin-top:1rem;">© <span id="year"></span> Ewakor. Tous droits réservés.</p>
    </div>
    <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
  </footer>
</body>
</html>

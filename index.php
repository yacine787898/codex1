<?php
$success = isset($_GET['success']) && $_GET['success'] === '1';
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meneeto Agency | Communication & Publicité en ligne</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWix+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkR4Jqk5AXR9Q8K+L2kY5sH2Cj9M4eA+4A1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="gradient-orb orb-1"></div>
    <div class="gradient-orb orb-2"></div>

    <header class="site-header">
        <a href="index.php" class="logo-link" aria-label="Meneeto Agency">
            <img src="/uploads/logo.png" alt="Logo Meneeto Agency" class="logo">
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#apropos">À propos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="accueil" class="hero-section glass">
            <div class="overlay"></div>
            <div class="hero-content">
                <h1>Boostez votre présence digitale avec Meneeto Agency</h1>
                <p>Votre agence de communication et publicité en ligne pour des solutions gratuites et premium.</p>
                <a class="btn-glossy" href="#services">Découvrir nos services</a>
            </div>
        </section>

        <section id="services" class="section glass reveal">
            <h2>Services</h2>
            <div class="cards-grid">
                <a class="service-card" href="https://my.meneeto.com" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-link"></i>
                    <h3>Création de page de liens (BioLink)</h3>
                    <p>Créez gratuitement votre page bio-link sur My Meneeto, sans publicités.</p>
                </a>
                <a class="service-card" href="https://wa.me/213660890203" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-laptop-code"></i>
                    <h3>Sites web, boutiques & landing pages</h3>
                    <p>Conception professionnelle de sites web adaptés à votre activité.</p>
                </a>
                <a class="service-card" href="https://meneeto.com/daridja-ai" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-microphone-lines"></i>
                    <h3>Voix-off Daridja avec IA</h3>
                    <p>Génération d'audio et de voix-off Daridja avec Meneeto Voice.</p>
                </a>
                <a class="service-card" href="https://wa.me/213660890203" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-utensils"></i>
                    <h3>Menu numérique</h3>
                    <p>Menus digitaux modernes pour restaurants, cafeterias et fast-foods.</p>
                </a>
                <a class="service-card" href="produits.php">
                    <i class="fa-solid fa-bullhorn"></i>
                    <h3>Produits & services marketing</h3>
                    <p>Découvrez notre catalogue marketing pour développer votre business.</p>
                </a>
            </div>
        </section>

        <section id="contact" class="section glass reveal">
            <h2>Contact</h2>
            <?php if ($success): ?>
                <p class="alert success">Merci ! Votre message a été envoyé avec succès.</p>
            <?php endif; ?>

            <?php if ($error): ?>
                <p class="alert error">Erreur: <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>

            <form class="contact-form" action="contact_submit.php" method="POST">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required maxlength="100">

                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required maxlength="255">

                <label for="message">Message (max 1000 caractères)</label>
                <textarea id="message" name="message" required maxlength="1000"></textarea>

                <button type="submit" class="btn-glossy">Envoyer</button>
            </form>
        </section>

        <section id="apropos" class="section glass reveal">
            <h2>À propos</h2>
            <p>Nous aidons les marques à performer en ligne avec des solutions de communication créatives, digitales et orientées résultats.</p>
            <div class="social-icons">
                <a href="https://instagram.com" aria-label="Instagram" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" aria-label="Facebook" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
                <a href="mailto:contact@meneeto.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                <a href="https://wa.me/213660890203" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </section>
    </main>

    <footer class="site-footer glass">
        <p>&copy; <?= date('Y'); ?> Meneeto Agency. Tous droits réservés.</p>
    </footer>

    <script src="assets/app.js"></script>
</body>
</html>

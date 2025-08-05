# Ewakor Website

Responsive, multilingual (FR) showcase site for Ewakor – Moroccan B2B distributor of Olipes lubricants.

## Structure
```
index.html          Accueil / Home
products.html       Gammes produits
about.html          À propos
partners.html       Nos partenaires
contact.php         Formulaire de contact (PHP mail)
assets/
  css/style.css
  js/
    main.js
    slider.js
  img/
    placeholder.jpg
    logo-placeholder.png
```

## Quick start (local)
1. Install PHP ≥ 7 and run a local server:
   ```bash
   php -S localhost:8000
   ```
2. Navigate to `http://localhost:8000` in your browser.

## Deployment
Upload the entire folder to any LAMP shared hosting space. Ensure `contact.php` has permission to send emails (some hosts require SMTP auth instead of `mail()`).

## Customisation
- Replace placeholder images in `assets/img/` with real product and partner logos.
- Adjust colour palette in `assets/css/style.css`.
- Update contact details in footer across pages.
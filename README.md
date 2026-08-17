# translate-nz — PHP conversion

A plain-PHP + vanilla-JS rebuild of the original React site. No framework,
no build step — upload the folder to any PHP host (PHP 8+, mbstring
extension recommended) and it runs.

## Structure

```
index.php, about.php, services.php, ...   Page files (one per route)
service-detail.php   ?key=<slug>           Dynamic service page (see data/services.php)
about-detail.php     ?key=<slug>           Dynamic about page (see data/about-detail.php)
includes/            Shared chrome (head/header/footer/floats/popup) + reusable
                      section partials in includes/components/
data/                Structured content for the two dynamic page types
locales/en, locales/mi/common.json         Same locale files the React app used —
                      edit these directly to change site copy in either language
assets/css/          Every original component CSS file, copied as-is
assets/js/main.js    Vanilla JS replacing all React interactivity (menus,
                      language switcher, popup + contact forms with reCAPTCHA,
                      FAQ search/filter, animated stats, testimonials carousel,
                      language directory search, back-to-top)
assets/images/        All site images/logos/service photos
```

## How language switching works

`?lang=en` or `?lang=mi` on any URL sets the language for the session
(stored server-side, mirrors the React app's localStorage behaviour). The
header's language dropdown links do this automatically.

## Forms / Zoho CRM

The popup, contact page, and quote page all submit to the same Zoho
Web-to-Lead endpoint the original React app used, via a hidden form + iframe
(no page reload). Field IDs and the site's reCAPTCHA site key were carried
over unchanged from `ZohoForm.jsx` / `PopupForm.jsx` / `Contact.jsx`.

## Known simplifications vs. the React version

- Framer-motion scroll/stagger animations were dropped; content renders in
  its final state. CSS transitions (hover states, FAQ accordion, etc.) are
  preserved since those came from the ported CSS files.
- The Swiper testimonials carousel was replaced with a small vanilla-JS
  carousel that reuses the original `.swiper-pagination` styling.
- React Router's client-side routing became real navigation between `.php`
  files (classic multi-page site, per the agreed scope).

<?php
/**
 * Core site configuration + i18n loader.
 * Include this at the very top of every page (before any HTML output).
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_ROOT', dirname(__DIR__));
define('SITE_NAME', 'Honey Language Translation Services LLC');

// ---------------------------------------------------------------------
// Language handling
// ---------------------------------------------------------------------
$SUPPORTED_LANGS = ['en', 'cz'];

// Allow ?lang=xx to switch language (mirrors i18n.changeLanguage in React)
if (isset($_GET['lang']) && in_array($_GET['lang'], $SUPPORTED_LANGS, true)) {
    $_SESSION['site_lang'] = $_GET['lang'];
}

$CURRENT_LANG = $_SESSION['site_lang'] ?? 'en';
if (!in_array($CURRENT_LANG, $SUPPORTED_LANGS, true)) {
    $CURRENT_LANG = 'en';
}

// html lang attribute: English -> en, Czech -> cs (matches the React i18n setup)
$HTML_LANG = $CURRENT_LANG === 'en' ? 'en' : 'cs';

// ---------------------------------------------------------------------
// Load locale JSON (cached in memory for this request)
// ---------------------------------------------------------------------
function load_locale(string $lang): array
{
    static $cache = [];
    if (isset($cache[$lang])) {
        return $cache[$lang];
    }
    $path = SITE_ROOT . "/locales/{$lang}/common.json";
    if (!is_file($path)) {
        return $cache[$lang] = [];
    }
    $json = json_decode(file_get_contents($path), true);
    return $cache[$lang] = is_array($json) ? $json : [];
}

$LOCALE = load_locale($CURRENT_LANG);
$LOCALE_FALLBACK = $CURRENT_LANG === 'en' ? [] : load_locale('en');

/**
 * t('nav.home') -> looks up nested dot-notation key in the current locale,
 * falling back to English, then to the key itself (same behaviour as
 * i18next's fallbackLng: 'en').
 */
function t(string $key, array $vars = []): string
{
    global $LOCALE, $LOCALE_FALLBACK;

    $value = array_reduce(explode('.', $key), function ($carry, $segment) {
        return (is_array($carry) && array_key_exists($segment, $carry)) ? $carry[$segment] : null;
    }, $LOCALE);

    if ($value === null) {
        $value = array_reduce(explode('.', $key), function ($carry, $segment) {
            return (is_array($carry) && array_key_exists($segment, $carry)) ? $carry[$segment] : null;
        }, $LOCALE_FALLBACK);
    }

    if ($value === null || is_array($value)) {
        return $key; // mirrors i18next returning the key when missing
    }

    foreach ($vars as $k => $v) {
        $value = str_replace('{{' . $k . '}}', $v, $value);
    }

    return $value;
}

/**
 * t_arr('about.checklist') -> returns a raw array value (e.g. list items)
 * from the locale file instead of a string.
 */
function t_arr(string $key): array
{
    global $LOCALE, $LOCALE_FALLBACK;
    $value = array_reduce(explode('.', $key), function ($carry, $segment) {
        return (is_array($carry) && array_key_exists($segment, $carry)) ? $carry[$segment] : null;
    }, $LOCALE);
    if (!is_array($value)) {
        $value = array_reduce(explode('.', $key), function ($carry, $segment) {
            return (is_array($carry) && array_key_exists($segment, $carry)) ? $carry[$segment] : null;
        }, $LOCALE_FALLBACK);
    }
    return is_array($value) ? $value : [];
}

function is_maori(): bool
{
    // Kept for backward compatibility with existing calls in the codebase;
    // now reflects the Czech ('cz') locale instead of Māori.
    global $CURRENT_LANG;
    return $CURRENT_LANG === 'cz';
}

/** Build a URL that preserves the current query string but changes lang */
function lang_switch_url(string $lang): string
{
    $qs = $_GET;
    $qs['lang'] = $lang;
    return '?' . http_build_query($qs);
}

// current path helper, used for active-nav-link highlighting
$CURRENT_PATH = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
// Normalise to be relative to the site base (handles deployment in a
// subfolder, e.g. /translate-nz-php/php-site/index.php -> /index.php).
// Without this, $CURRENT_PATH never equals '/' or '/index.php' when the
// site isn't at the domain root, so the home page never matches.
$__base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
if ($__base !== '' && str_starts_with($CURRENT_PATH, $__base)) {
    $CURRENT_PATH = substr($CURRENT_PATH, strlen($__base));
    if ($CURRENT_PATH === '') {
        $CURRENT_PATH = '/';
    }
}
unset($__base);

function is_active(string $path): bool
{
    global $CURRENT_PATH;
    if ($path === '/' || $path === '/index.php') {
        return $CURRENT_PATH === '/' || $CURRENT_PATH === '/index.php';
    }
    return str_starts_with($CURRENT_PATH, $path);
}

/**
 * Site base path, derived from the currently-running script, so links work
 * whether the site is deployed at the domain root (e.g. https://site.com/)
 * or inside a subfolder (e.g. http://localhost/translate-nz-php/php-site/).
 * Returns '' at the root, or e.g. '/translate-nz-php/php-site' in a subfolder
 * (no trailing slash).
 */
function base_url(): string
{
    static $base = null;
    if ($base === null) {
        // Allow generated/area pages living outside the hanioo folder to
        // force the real site's web base instead of deriving it from
        // wherever the script happens to be served from.
        if (defined('HANIOO_FORCE_WEB_BASE')) {
            $base = rtrim(HANIOO_FORCE_WEB_BASE, '/');
        } else {
            $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
        }
    }
    return $base;
}

/** Build a site-root-relative link to another page, e.g. url('contact.php') */
function url(string $path = ''): string
{
    return base_url() . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return base_url() . '/assets/' . ltrim($path, '/');
}

# Karta MP1

**Firma:** Bud-Spec Usługi Budowlane  
**Branża:** Usługi budowlano-remontowe
**Oferta:** Remonty mieszkań, prace instalacyjne.  
**Grupa docelowa:** Właściciele mieszkań/domów w trakcie remontu oraz deweloperzy potrzebujący podwykonawców do konkretnych prac.

## Persony

**Klient indywidualny**
* **Cel:** Znalezienie ekipy remontowej do wykończenia mieszkania.
* **Problem:** Szuka firmy, która szybko odpowie na zapytanie o wycenę.
* **Urządzenie:** Smartfon w drodze do pracy, laptop.
* **Oczekiwana akcja:** Wypełnienie formularza kontaktowego "Poproś o wycenę".

**Inwestor**
* **Cel:** Sprawdzenie, czy firma ma doświadczenie w większych projektach.
* **Problem:** Potrzebuje konkretnych informacji o zakresie usług i terminach realizacji.
* **Urządzenie:** Laptop (szczegółowe przeglądanie galerii zdjęć i zakresu usług w czasie pracy).
* **Oczekiwana akcja:** Przejście do sekcji "Nasze Realizacje" / bezpośredni kontakt telefoniczny.

## Mapa

1. **Strona główna** (podsumowanie usług i najważniejsze zdjęcia)
2. **Nasze usługi** (podstrona z listą prac: remonty, wykończenia, instalacje)
3. **Realizacje** (galeria zdjęć z poprzednich prac)
4. **O nas** (informacje o ekipie i doświadczeniu)
5. **Kontakt** (formularz, mapa, numer telefonu)
6. **Polityka prywatności** (wymóg prawny)

## Uzasadnienie wyboru CMS

Wybór WordPress self-hosted:
1. **Kontrola i własność:** W przeciwieństwie do rozwiązań online (np. Wix), instalując WordPressa na własnym hostingu, mam pełną kontrolę nad plikami i danymi firmy, co jest ważne przy budowaniu profesjonalnego wizerunku.
2. **Rozbudowa i SEO:** WordPress posiada ogromną bazę wtyczek wspierających pozycjonowanie (SEO).
3. **Analiza rynku:** Według danych W3Techs, WordPress dominuje na rynku, co zapewnia łatwość w znalezieniu specjalistów, jeśli firma zdecyduje się na rozbudowę strony.

## L3 WebAIM: Contrast Chcker:

Tekst - Tło: 17.4:1 [https://webaim.org/resources/contrastchecker/?fcolor=1A1A1A&bcolor=FFFFFF]
Odnośnik - Tło: 7.34:1 [https://webaim.org/resources/contrastchecker/?fcolor=0B5D7A&bcolor=FFFFFF]
Przycisk (Tekst - Tło): 7.34:1 [https://webaim.org/resources/contrastchecker/?fcolor=FFFFFF&bcolor=0B5D7A]
Akcent - Tło: 7.75:1 [https://webaim.org/resources/contrastchecker/?fcolor=8A3B00&bcolor=FFFFFF]


## L3 B1

WCAG 3.3.8 (Accessible Authentication — Minimum): Formularz nie stosuje testów poznawczych (takich jak obrazkowe CAPTCHA z przepisywaniem znaków), umożliwia swobodne wklejanie danych ze schowka oraz wspiera autouzupełnianie przeglądarki dzięki atrybutom autocomplete:name i autocomplete:email.
WCAG 2.5.8 (Target Size — Minimum): Wszystkie elementy interaktywne formularza (pola tekstowe, checkbox zgody RODO ostylowany w CSS na min-width: 24px; min-height: 24px oraz przycisk wysyłania) mają obszar dotykowy równy lub większy niż minimalne 24x24.

## L3 B2 - Preferencje użytkownika i skip link

* Dodano w CSS obsługę `prefers-reduced-motion` (wyłączenie animacji), `forced-colors` (ramka przycisków w trybie wysokiego kontrastu) oraz widoczny po Tab link „Przejdź do treści” (`.skip-link:focus`).
* Zrzut z testu emulacji w DevTools: `L3 B2/Forced_colors.png`.

## L3 G3 - Audyt dostępności (Lighthouse i WAVE)

Raporty przed i po poprawkach (PDF/PNG) znajdują się w katalogu `L3 G3/`. Naprawiono:
* **WCAG 1.1.1 / 1.3.1:** jeden nagłówek H1 na stronie, poprawna kolejność nagłówków.
* **WCAG 1.4.3:** poprawiony kontrast kolorów i nakładki na zdjęciu (> 7:1).

## L3 G4 - Prawo i licencje

* Dodano stronę Polityka prywatności (link w stopce i formularzu).
* Czcionka Advent Pro jest hostowana lokalnie w WordPressie (zgodnie z RODO).
* Lista źródeł i licencji: licencja.md.

## Użycie AI

Narzędzie: **Gemini**. Zakres użycia:
* **`docker-compose.yml`:** Pomoc w naprawie konfiguracji dla Codespaces (domyślne instrukcje powodowały przekierowanie na `localhost` i utratę danych).
* **Planowanie strony:** Pomoc w rozpisaniu kolejności zadań i dopasowaniu treści do wymogów MP1.
* **Poprawki CSS:** Pomoc w poprawie kodu CSS dla dostępności, fokusu i widoku mobilnego (375 px).
* **Polityka prywatności:** Pomoc w napisaniu treści polityki prywatności pod fikcyjną firmę.


---

# Mini projekt 2 (MP2) - Motyw blokowy (L4) i motyw potomny (L5)

## Decyzje projektowe
W MP2 zrobiłem oba motywy dla firmy Bud-Spec Usługi Budowlane:
- Motyw blokowy (`wp-content/themes/budspec`, L4) - zbudowany od zera z `theme.json` na bazie kolorów i fontów z L3, z własnymi szablonami HTML, wzorcami PHP i wariantem ciemnym. Motyw wyeksportowałem przez Create Block Theme do `export/budspec.zip` i sprawdziłem w WordPress Playground.
- Motyw potomny (`wp-content/themes/mf-child`, L5) - oparty na motywie rodzica `twentytwentyone`, bez ruszania plików rodzica.

Do końcowego widoku strony wybrałem motyw potomny `mf-child`, bo daje bezpośrednią kontrolę w PHP (hooki, własny szablon strony i dynamiczny blok pobierający dane z WordPressa).

## Struktura plików
- `wp-content/themes/budspec/` - `style.css`, `theme.json`, części szablonu w `parts/` (`header.html`, `footer.html`), szablony w `templates/` (`index.html`, `single.html`, `page.html`, `archive.html`, `404.html`, `front-page.html`), wzorce w `patterns/` (`hero-cta.php`, `uslugi.php`, `opinie.php`) oraz tryb ciemny w `styles/ciemny.json`.
- `wp-content/themes/mf-child/` - `style.css`, `functions.php`, `page-o-nas.php` i katalog bloku `blocks/info-firmy/` (`block.json`, `index.js`, `index.asset.php`, `render.php`).
- `export/budspec.zip` - paczka ZIP wyeksportowana z Create Block Theme.

## Hierarchia szablonów (sprawdzone w WordPressie)
W motywie blokowym `budspec` (L4):
- Strona główna (`/`) - `templates/front-page.html`
- Strony (np. `/o-nas/`, `/kontakt/`) - `templates/page.html`
- Pojedynczy wpis - `templates/single.html`
- Lista wpisów (`/aktualnosci/`) - `templates/index.html`
- Archiwum kategorii (`/category/porady/`) - `templates/archive.html`
- Błąd 404 - `templates/404.html`

W motywie potomnym `mf-child` (L5):
- Strona „O nas” (`/o-nas/`) - `page-o-nas.php` z motywu potomnego (nadpisuje rodzica)
- Strona główna i pozostałe strony - `page.php` z rodzica (`twentytwentyone`)
- Pojedynczy wpis, lista wpisów, archiwum i 404 - odpowiednio `single.php`, `index.php`, `archive.php`, `404.php` z rodzica

## Użyte hooki w `mf-child/functions.php`
- `wp_enqueue_scripts` (`mf_child_enqueue_styles`) - podpięcie `style.css` motywu potomnego po arkuszu rodzica `twenty-twenty-one-style`.
- `after_setup_theme` (`mf_child_setup`) - załadowanie domeny tłumaczeń `mf-child`.
- `excerpt_length` (`mf_excerpt_length`) - skrócenie zajawki wpisów do 25 słów.
- `the_content` (`mf_add_note`) - dodanie notki z zaproszeniem do kontaktu pod treścią pojedynczego wpisu.
- `init` (`mf_register_block_styles`, `mf_register_custom_blocks`) - rejestracja stylów bloków `mf-cien` („Z cieniem” dla `core/button`) i `mf-karta` („Karta” dla `core/group`) oraz bloku `mf-child/info-firmy`.
- `enqueue_block_editor_assets` (`mf_enqueue_editor_ssr`) - załadowanie skryptu `wp-server-side-render` w edytorze bloków.

## Dlaczego blok `mf-child/info-firmy` jest dynamiczny?
Blok statyczny zapisuje gotowy HTML bezpośrednio w treści strony w bazie danych, więc przy zmianie numeru telefonu albo nazwy firmy trzeba by było ręcznie poprawiać każde miejsce, gdzie został wstawiony. Blok dynamiczny (`save` zwraca `null`, a HTML generuje `render.php`) pobiera dane na żywo z WordPressa (`get_bloginfo('name')`, `get_option('mf_telefon')`) z escapingiem `esc_html` i `esc_url`. Dzięki temu jedna zmiana danych aktualizuje blok jednocześnie na stronie „O nas” i w stopce.

## Dostępność i licencje
- Paleta jasna (`#ffffff`, `#1a1a1a`, `#0b5d7a`, `#8a3b00`), wariant ciemny (`#121212`, `#f2f2f2`, `#7cc4e0`, `#f4a261`) oraz style bloków `mf-cien` i `mf-karta` mają kontrast powyżej 7:1 (spełniają WCAG 2.2 AA i AAA).
- Zachowane zostały reguły `:focus-visible`, `prefers-reduced-motion` oraz `forced-colors`.
- Licencje: WordPress, Twenty Twenty-One oraz oba własne motywy są na GPLv2+. Czcionka Advent Pro (SIL OFL) jest hostowana lokalnie (zgodnie z RODO), a licencje zdjęć opisane są w pliku `licencja.md`.

## Zrzuty ekranu MP2
- `screenshots/mp2/l4-glowna-wzorce.png` - strona główna z wzorcami (L4)
- `screenshots/mp2/l4-tryb-ciemny.png` - wariant stylu ciemnego (L4)
- `screenshots/mp2/mp2-glowna.png` - strona główna na motywie potomnym (L5)
- `screenshots/mp2/mp2-o-nas.png` - strona „O nas” z szablonem `page-o-nas.php` i blokiem dynamicznym (L5)
- `screenshots/mp2/mp2-styl-bloku.png` - style bloków „Karta” i „Z cieniem” w edytorze (L5)
- `screenshots/mp2/mp2-mobile.png` - widok mobilny (L5)

## Użycie AI (MP2)
- Narzędzie: Gemini.
- Do czego użyte: pomoc w napisaniu plików `theme.json`, szablonów HTML, wzorców PHP, `functions.php`, plików bloku dynamicznego oraz wyłapaniu błędów składniowych / codespace / php, uporządkowanie readme

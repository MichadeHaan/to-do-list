# to-do-list

Deze eenvoudige ToDo-lijst is een webapplicatie waarmee gebruikers taken kunnen toevoegen, voltooien en verwijderen. Alle taken worden opgeslagen in een MySQL-database, zodat ze ook na het herladen van de pagina behouden blijven.

## Functies

- **Taken toevoegen:** Voeg nieuwe taken toe aan de lijst.
- **Taken voltooien:** Markeer taken als voltooid.
- **Taken verwijderen:** Verwijder taken uit de lijst.
- **Persistente opslag:** Taken worden opgeslagen in een MySQL-database.

## Installatie

Volg deze stappen om de applicatie lokaal te draaien:

### 1. Clone het project

```bash
git clone https://github.com/MichadeHaan/to-do-list.git
```

### 2. Maak een MySQL-database aan

Maak een nieuwe database en tabel aan in MySQL met de volgende SQL-queries:

```sql
CREATE DATABASE todo_db;

USE todo_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE
);
```

### 3. Configureer de databaseverbinding

Zorg ervoor dat de databaseconfiguratie in elk PHP-bestand (`add_task.php`, `toggle_task.php`, `delete_task.php`, `get_tasks.php`) correct is ingesteld:

```php
$host = 'localhost';
$dbname = 'todo_db';
$username = 'Gebruiker';
$password = 'bit';
```

### 4. Start een lokale server

Je kunt een lokale server opzetten met bijvoorbeeld XAMPP of MAMP, of gebruik maken van de ingebouwde PHP-server:

```bash
php -S localhost
```

### 5. Open de applicatie

Navigeer naar `http://localhost` in je webbrowser.

## Bestandsstructuur

De belangrijkste bestanden in het project zijn:

- `index.html`: De hoofd-HTML-pagina met de gebruikersinterface.
- `styles.css`: Bevat de CSS-styling voor de ToDo-lijst.
- `script.js`: Bevat de JavaScript-logica voor het toevoegen, voltooien en verwijderen van taken.
- `add_task.php`: Backend-script voor het toevoegen van een taak aan de database.
- `toggle_task.php`: Backend-script voor het bijwerken van de voltooiingsstatus van een taak.
- `delete_task.php`: Backend-script voor het verwijderen van een taak uit de database.
- `get_tasks.php`: Backend-script voor het ophalen van alle taken uit de database.

## Gebruik

1. **Taak toevoegen:** Voer een taak in het tekstvak in en klik op "Toevoegen" het word dan ook in een database gezet.
2. **Taak voltooien:** Vink het selectievakje naast een taak aan om deze als voltooid te markeren.
3. **Taak verwijderen:** Klik op de "Verwijderen" knop om de taak te verwijderen het word dan ook uit de database verwijderd.

## Licentie

Dit project is vrij te gebruiken en aan te passen voor persoonlijke en educatieve doeleinden.

## Auteur

- **micha de haan** - [GitHub profiel](https://github.com/MichadeHaan)
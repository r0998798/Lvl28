<!-- view_data.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level28 - Data weergeven</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
        /* Algemene CSS-styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Volledige hoogte van het viewport */
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1; /* Neem de resterende ruimte in beslag */
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        /* CSS-styling voor de tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr.details {
            display: none;
        }
        .arrow {
            cursor: pointer;
        }
        /* Footer styling */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        /* Responsieve CSS-styling */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
        }
        @media screen and (max-width: 576px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 6px;
            }
        }
    </style>
</head>
<body>
    <header>
    <div class="max-width">
            <a href="index.html">
                <img src="images/Logo.png" alt="Level 28">
            </a>
            <nav>
                <a href="index.html" class="nav-item current-nav-item">Thuispagina</a>
                <a href="ai-list.html" class="nav-item">AI lijst</a>
                <a href="form.html" class="nav-item">Formulier</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Weergave van gegevens</h2>

        <?php
        // Databaseverbinding maken
        $con = mysqli_connect('localhost', 'root', '', 'lvl28');

        // Controleren op fouten
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Query om gegevens op te halen
        $result = mysqli_query($con, "SELECT * FROM tbl_form");

        // Controleren op resultaten
        if (mysqli_num_rows($result) > 0) {
            // Weergeven van gegevens in een tabel
            echo "<table>";
            echo "<tr><th>Naam</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='summary'>";
                echo "<td class='toggle-details'><span class='arrow'>&#9656;</span> " . $row['naam'] . " " . $row['achternaam'] . "</td>";
                echo "</tr>";
                echo "<tr class='details'>";
                echo "<td colspan='2'>";
                echo "<p><strong>E-mail: </strong>" . $row['email'] . "</p>";
                echo "<p><strong>Achternaam: </strong>" . $row['achternaam'] . "</p>";
                echo "<p><strong>Bedrijfsnaam: </strong>" . $row['bedrijf'] . "</p>";
                echo "<p><strong>Geselecteerde AI: </strong>" . $row['ai'] . "</p>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Geen gegevens gevonden.";
        }

        // Verbinding sluiten
        mysqli_close($con);
        ?>
    </div>

    <footer>
    <div class="max-width">
            <h3>Blijf in contact:</h3>
            <div id="contact">
                <a href="tel:016 45 18 25">016 45 18 25</a>
                <div id="socials">
                    <a href="https://www.instagram.com/" target="_blank" class="bi bi-instagram"></a>
                    <a href="https://www.facebook.com/" target="_blank" class="bi bi-facebook"></a>
                    <a href="https://twitter.com/" target="_blank" class="bi bi-twitter-x"></a>
                    <a href="https://www.youtube.com/" target="_blank" class="bi bi-youtube"></a>
                </div>
                <a href="mailto:info@lvl28.com">info@lvl28.com</a>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript voor het toggle-effect
        const toggleDetails = document.querySelectorAll('.toggle-details');

        toggleDetails.forEach(item => {
            item.addEventListener('click', () => {
                const detailsRow = item.parentNode.nextElementSibling;
                detailsRow.classList.toggle('details');
                detailsRow.classList.toggle('summary');
            });
        });
    </script>
</body>
</html>

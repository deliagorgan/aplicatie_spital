<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Hospital</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-lower"> Hospital</span>
    </h1>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <!-- <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item  px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="index.html">Prima pagină</a>
                    </li>
                    <li class="nav-item px-lg-4 dropdown">
                        <a class="nav-link text-uppercase text-expanded" href="#">Tabele</a>
                        <div class="dropdown-content">
                            <ul>
                                <li><a class="nav-link text-uppercase text-expanded" href="medici.php">Medici</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="pacienti.php">Pacienți</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="investigatii.php">Investigații</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="medical_file.php">Fișe medicale</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="internari.php">Internări</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="echipa_medici.html">Echipa de medici</a>
                    </li>
                    <!-- <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="efecte.html">Efecte</a>
          </li> -->

                    <li class="nav-item px-lg-4 dropdown">
                        <a class="nav-link text-uppercase text-expanded" href="#">Formulare</a>
                        <div class="dropdown-content">
                            <ul>
                                <li><a class="nav-link text-uppercase text-expanded" href="addMedic.php">Adaugă medici</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="addPacient.php">Adaugă pacienți</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="addInvestigatie.php">Adaugă investigații</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="addMF.php">Adaugă fișe medicale</a></li>
                                <li><a class="nav-link text-uppercase text-expanded" href="addInternare.php">Adaugă internări</a></li>
                    </li>
            </div>

            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="contact.html">Contact</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner content-normal text-right rounded">
                        <h2 class="section-heading mb-12">
                            <span class="section-heading-lower"><b>Adaugă un pacient</b></span><br>
                        </h2>
                        <form action="insertPacient.php" method="post">
                            <fieldset>
                                <label for="IdPacient">ID: <input type="text" name="IdPacient" placeholder="01234" required></label><br>
                                <label for="firstName">Prenume: <input type="text" name="Prenume" placeholder="Ion" required></label><br>
                                <label for="lastName">Nume: <input type="text" name="Nume" placeholder="Popescu" required></label><br>
                                <label for="cnp">CNP: <input id="cnp" name="CNP" type="text" pattern="[0-9]{13,}" placeholder="2901010032632" required /></label><br>
                                <label for="adresa">Introduceți adresa: <input type="text" name="Adresa" placeholder="str., bl., sc., ap., jud." required></label><br>
                                <label for="mediu_urban">Mediu de proveniență: <input id="mediu" type="radio" name="mediu" class="inline" checked />Urban</label>
                                <label for="mediu_rural"><input id="mediu" type="radio" name="mediu" class="inline" />Rural</label>
                            </fieldset>
                            <br>
                            <br>
                            <input type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner content-normal text-right rounded">
                        <?php
                        $user = 'root';
                        $password = '';
                        $database = '_HOSPITAL';
                        $port = NULL;
                        $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            // Check if CNP parameter is provided in the URL
                            if (isset($_GET['CNP'])) {
                                $CNP = $_GET['CNP'];

                                // Retrieve patient data from the database
                                $sql = "SELECT * FROM tblPacienti WHERE CNP = '$CNP'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nume = $row["Nume"];
                                    $prenume = $row["Prenume"];
                                    $mediuDeProvenienta = $row["MediuDeProvenienta"];
                                    $adresa = $row["Adresa"];
                                    // Form for editing patient data
                                    echo "<h2>Editare pacient</h2>";
                                    echo "<form action='update_pac.php' method='post'>";
                                    echo "<input type='hidden' name='CNP' value='$CNP'>";
                                    echo "Nume: <input type='text' name='nume' value='$nume'><br><br>";
                                    echo "Prenume: <input type='text' name='prenume' value='$prenume'><br><br>";
                                    echo "Mediu de provenienta: <input type='text' name='mediuDeProvenienta' value='$mediuDeProvenienta'><br><br>";
                                    echo "Adresa: <input type='text' name='adresa' value='$adresa'><br><br>";
                                    echo "<input type='submit' value='Submit'>";
                                    echo "</form>";
                                } else {
                                    echo "Pacientul nu exista.";
                                }
                            } else {
                                echo "CNP-ul pacientului lipseste.";
                            }
                        }


                        $conn->close();

                        ?>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
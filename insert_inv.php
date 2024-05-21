<html>


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

    <section class="cta cta-inner succes">

        <?php
        // Database connection
        $user = 'root';
        $password = '';
        $database = '_HOSPITAL';
        $port = NULL;
        $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $id = $_POST['IdInvestigatie'];
        $numar = $_POST['NumeInvestigatie'];
        $rezultat = $_POST['Rezultate'];
        $fisa = $_POST['Fisa'];

        // Insert new patient into database
        $sql = "INSERT INTO tblInvestigatii (IdInvestigatie, NumeInvestigatie, Rezultate, Fisa) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $id, $numar, $rezultat, $fisa);

        if ($stmt->execute()) {
            echo "Investigație adăugată cu succes";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $stmt->close();
        $conn->close();
        ?>

        <button onclick="location.href='investigatii.php'">⬅</button>

    </section>
</body>

</html>
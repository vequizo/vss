<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubuntu Server-PHP Deployment</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #343a40;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }

        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Form Container -->
        <div class="form-container">
            <h2 class="form-title">Ubuntu Server-PHP Deployment - Ellysha Lao</h2>

            <!-- PHP Code to Handle Form Submission -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database configuration
                $servername = "localhost";
                $username = "vequizo";  // Replace with your MySQL username
                $password = "vequizo";  // Replace with your MySQL password
                $dbname = "lovely";     // Replace with your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve form data
                $firstname = $_POST['firstname'];
                $middlename = $_POST['middlename'];
                $lastname = $_POST['lastname'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $courseandsec = $_POST['courseandsec'];

                // Insert data into the `form` table
                $sql = "INSERT INTO form (fname, mname, lname, age, address, courseandsec) 
                        VALUES ('$firstname', '$middlename', '$lastname', '$age', '$address', '$courseandsec')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>New record created successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }

                // Close the connection
                $conn->close();
            }
            ?>

            <!-- Form Start -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="middlename" class="form-label">Middle:</label>
                    <input type="text" name="middlename" id="middlename" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="courseandsec" class="form-label">Course & Section:</label>
                    <input type="text" name="courseandsec" id="courseandsec" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- Form End -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

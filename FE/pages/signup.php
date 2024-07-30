
<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Movie Website</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light Alice Blue background */
            color: #333; /* Dark text color */
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .form-control {
            border-radius: 0.5rem;
            border-color: #007bff; /* Blue border color */
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary blue */
            border: none;
            border-radius: 0.5rem;
        }
        .btn-secondary {
            background-color: #e2e6ea; /* Light gray for cancel button */
            border: none;
            border-radius: 0.5rem;
        }
        .header-area {
            background: #007bff; /* Blue header background */
            padding: 10px 0;
        }
        .logo img {
            filter: brightness(0) invert(1);
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: #ffffff; /* Solid white background */
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        .footer {
            background-color: #007bff; /* Blue footer background */
            color: #ffffff;
            padding: 10px 0;
        }
        a.text-primary {
            color: #007bff; /* Primary blue for links */
        }
    </style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../../index.php" class="logo">
                            <img src="../assets/images/logo.png" alt="Logo" style="width: 158px;">
                        </a>
                        <!-- ***** Logo End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2 class="text-center mb-4">Sign Up</h2>
                        <?php
                            include_once("../Views/userView.php");
                            SignUpForm();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <div class="container">
            <p>Copyright © 2048 Movie Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

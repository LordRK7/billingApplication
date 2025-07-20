<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-500">Admin Login</h1>
        <!--ADMIN LOGIN SECTION-->
        <div class="m-12 p-6 bg-gray-500 rounded-lg shadow-sm" id="loginform">
            <?php
                if(isset($_REQUEST["status"]))
                {
                    echo("<div id='resMsg'>");
                    if($_REQUEST["status"]==1)
                    {
                        echo("Invalid User");
                    }
                    else if($_REQUEST["status"]==2)
                    {
                        echo("Invalid Password");
                    }
                    echo("</div>");
                }
            ?>
            <div id="logInForm">
                <form action="checkLogin.php" class="form signup-form" method="get">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center" >Log In</h2>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="txtEmail" placeholder="Your Email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="txtPassword" placeholder="Enter Password" required>

                    <button class="btn gray-btn" type="submit">Log in</button>
                </form>
            </div><!--END OF LOGINFORM-->
        </div>
    </div>
</body>
</html>
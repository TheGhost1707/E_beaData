<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Bea-Data - Mahasiswa</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #4e73df, #7a6ad8);
        }
       
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus{
            border-color: #7a6ad8;
            outline: none;
        }

        h4 {
            margin: 0 0 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ccc;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7a6ad8;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
            box-sizing: border-box;
            display: block;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left">
            <img src="assets/images/login.png" alt="Logo">
        </div>
        <div class="right">
            <h4 style="text-align: center;">Selamat Datang,<br>Calon Penerima Beasiswa</h4>
            <h2 style="text-align: center;">Login Bea-Data</h2>

            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo '<div class="error">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']);
            }
            ?> 

            <form action="proses_login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>
</html>

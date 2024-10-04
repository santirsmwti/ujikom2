<?php
session_start();

$users = array(
    'admin' => array(
        'username' => 'admin',
        'password' => 'admin123' 
    ),
    'user' => array(
        'username' => 'user',
        'password' => 'user123'
    )
);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]['password'] == $password) {
        $_SESSION['logged_in'] = true; 
        $_SESSION['username'] = $username; 
        header('Location: jadwal_angkot.php'); // Ganti ini dengan halaman yang sesuai setelah login
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #C62828; /* Merah Tua */
            overflow: hidden; /* Menghindari scrollbar */
            position: relative;
        }
        .login-container {
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            background-color: #FFD600; /* Kuning */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10; /* Pastikan form di atas */
        }
        .welcome-text {
            margin-bottom: 20px;
            color: #000; /* Warna teks hitam untuk kontras dengan kuning */
        }
        .footer-text {
            font-size: 0.8em;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="welcome-text">RODA KOTA</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <p class="footer-text">Created by SANTI ROSMAWATI</p>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

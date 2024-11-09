<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ./dashboard.php');
    exit();
}

if (isset($_GET['error'])) {
    $error = "Username atau password salah";
} else {
    $error = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LibOffice</title>
    <link rel="stylesheet" href="./src/style/global.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#71cfb9',
                        secondary: '#fac441',
                        accent: '#556080'
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="container flex justify-center items-center h-screen">
        <div class="flex flex-col lg:flex-row bg-white rounded-lg shadow-lg p-6 w-3/4">
            <img src="./src/images/library.png" alt="Login" class="lg:w-1/2 w-full">
            <form action="./services/auth/login.php" method="POST" class="lg:w-1/2 w-full flex flex-col items-center justify-center">
                <h2 class="text-primary text-2xl font-bold self-start">Login Admin</h2>
                <h2 class="text-primary mb-4 self-start">LibOffice</h2>
                <?php if ($error) : ?>
                    <p class="text-red-500 text-sm self-start mb-2"><?= $error ?></p>
                <?php endif; ?>
                <input type="text" name="username" placeholder="Username" class="input-field" required>
                <input type="password" name="password" placeholder="Password" class="input-field" required>
                <button type="submit" class="button w-full mt-4">Login</button>
            </form>
        </div>
    </div>
</body>

</html>

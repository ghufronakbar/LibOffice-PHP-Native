<?php
session_start();
require_once './utils/isSession.php';

if (!isSession()) {
  echo "<script>alert('Login terlebih dahulu!');</script>";
  echo "<script>console.log('Login terlebih dahulu!');</script>";
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - LibOffice</title>

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

  <link rel="stylesheet" href="./src/style/global.css">

</head>

<body class="bg-gray-100">

  <?php include './layout/sidebar.php'; ?>

  <main class="p-4">
    <div class="container mx-auto">
      <?php
      ob_start();
      ?>
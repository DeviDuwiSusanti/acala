<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Acala Bromo</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style2.css" />
</head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php'; ?>
            <h1 style="margin-top: 20px; margin-left: 20px;">Users</h1>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Admin 1</td>
                                    <td>admin1@example.com</td>
                                </tr>
                                <tr>
                                    <td>Admin 2</td>
                                    <td>admin2@example.com</td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>            

           
    <!-- =========== Scripts =========  -->
    <script src="js/main2.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

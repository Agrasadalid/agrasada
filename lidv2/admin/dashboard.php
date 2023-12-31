<?php
include '../config/dbCon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
}

if (isset($_GET['log'])) {
    if ($_GET['log'] == 'true') {
        session_destroy();
        header("Location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <a href="dashboard.php?log=true">Logout</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $select = mysqli_query($conn, $sql);

                if (mysqli_num_rows($select) != 0) {
                    while ($row = mysqli_fetch_array($select)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['uname']; ?></td>
                            <td><?php echo $row['pass']; ?></td>
                            <th scope="row"><?php echo $row['email']; ?></th>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

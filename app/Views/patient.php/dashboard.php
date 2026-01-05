<!DOCTYPE html>
<html>
<body>
    <h1>Patient Portal</h1>
    <p>Hello <?php echo $_SESSION['user_name']; ?></p>
    <a href="index.php?action=logout">Logout</a>
</body>
</html>
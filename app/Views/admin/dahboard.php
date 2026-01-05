<!DOCTYPE html>
<html>
<body>
    <h1>Welcome, Admin!</h1>
    <p>You are logged in as <?php echo $_SESSION['user_name']; ?></p>
    <a href="index.php?action=logout">Logout</a>
</body>
</html>
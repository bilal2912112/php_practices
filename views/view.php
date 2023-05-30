<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <?php foreach ($users as $user): ?>
        <div>
            <h3><?php echo $user['name']; ?></h3>
            <p>Email: <?php echo $user['email']; ?></p>
            <!-- Add more user information as needed -->
        </div>
    <?php endforeach; ?>
</body>
</html>
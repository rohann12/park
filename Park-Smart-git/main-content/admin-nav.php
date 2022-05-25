<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/admin-style.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c45811900b.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
<div class="admin_nav">
    <h1 style="margin-top:3vh">Park Smart</h1>
    <ul class="admin_nav_menu">
        
        <a href="admin-profile.php" class="admin_nav_link">
            <div class="admin_nav_item">
                <i class="fa-solid fa-user"></i>
                <li>Profile</li>
            </div>
        </a>
        
        <a href="users.php" class="admin_nav_link">
            <div class="admin_nav_item">
                <i class="fa-solid fa-users"></i>
                <li>Users</li>
            </div>
        </a>
        <a href="admin-report.php" class="admin_nav_link">
            <div class="admin_nav_item">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <li>Report</li>
            </div>
        </a>
        <a href="admin-logout.php" class="admin_nav_link">
        <div class="admin_nav_item">
            <i class="fa-solid fa-right-from-bracket"></i>
            <li class="bottom_item">Logout</li>
        </div>
        </a>
    </ul>
</div>
</body>
</html>
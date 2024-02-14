<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="favicon.ico">
</head>
<body>
<div class="main-container">
    <div class="hero-container">

    </div>
    <form id="userForm" class="form">
        <h1 class="title">Enter User Details</h1>
        <div class="form-section">
            <div class="form-group">
            <label for="username" class="label">Username:</label>
            <input type="text" id="username" name="username" class="input" required>
            </div>
            <div class="form-group">
            <label for="email" class="label">Email:</label>
            <input type="email" id="email" name="email" class="input" required>
            </div>
            <div class="form-group">
            <label for="password" class="label">Password:</label>
            <input type="password" id="password" name="password" class="input" required>
            </div>
            <div class="form-group">
            <label for="birthdate" class="label">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" class="input" required>
            </div>
            <div class="form-group">
            <label for="phone" class="label">Phone number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="input" required>
            </div>
            <div class="form-group">
            <label for="url" class="label">URL:</label>
            <input type="url" id="url" name="url" class="input" required><br>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/userList.php'">User List</button>
            </div>
        </div>
<!--        <a href="/gbg/user_list.php">User List</a>-->
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>

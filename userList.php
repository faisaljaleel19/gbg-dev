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
<div class="usersTableSection">
    <h1 class="title">User List</h1>
    <table class="userTable">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="userTableBody">

        </tbody>

    </table>
    <a href="/" class="homeLink">Go to Home</a>
</div>
<div id="popupContainer">
    <div id="popupContent">
        <span id="closePopup">&times;</span>
        <h2 class="title-black">User Details</h2>
        <div id="UserSection">
            <table>
                <thead>
                    <tr>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Birth Date</th>
                        <th>Phone Number</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tbody id="userDetails">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>

<?php
include 'connection.php';

$username_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        header("Location: welcome.php");
        exit();
    } else {
        $username_error = "The username or password is incorrect. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box; 
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8; /* Light background for better contrast */
            font-family: 'Arial', sans-serif; 
        }

        .container {
            max-width: 350px;
            width: 100%; 
            background: #ffffff; 
            border-radius: 20px; 
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Softer shadow */
            margin: 20px;
        }

        h1 {
            color: #0070E1;
            text-align: center; 
            margin-bottom: 20px;
            font-weight: 900;
            font-size: 28px; /* Slightly smaller font size */
        }

        form {
            margin-top: 10px; 
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        input {
            width: 100%; 
            background: #f8f9fd; 
            border: 1px solid #ced4da; 
            padding: 15px 20px; 
            border-radius: 10px; 
            transition: border-color 0.3s; 
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #0070E1;
        }

        label {
            position: absolute;
            left: 20px;
            top: 15px;
            transition: 0.2s ease all;
            color: #999;
            font-size: 16px;
            pointer-events: none;
        }

        input:focus + label,
        input:not(:placeholder-shown) + label {
            top: -15px;
            left: 20px;
            font-size: 12px;
            color: #0070E1;
        }

        button {
            display: block;
            width: 100%; 
            font-weight: bold;
            background: linear-gradient(45deg, #0070E1 0%, #00aaff 100%); 
            color: white;
            padding: 15px; 
            margin: 20px 0; 
            border-radius: 10px; 
            border: none;
            transition: all 0.3s ease; 
            font-size: 16px; /* Increased font size for better readability */
        }

        button:hover {
            background-color: #0056b3; 
            transform: scale(1.03);
        }

        button:active {
            opacity: 0.8; 
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p, a {
            text-decoration: none;
            color: #0070E1; 
            font-size: 12px; 
        }

        a:hover {
            text-decoration: underline; 
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder=" " required>
                <label>Username</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder=" " required>
                <label>Password</label>
            </div>
            <div class="error"><?php echo $username_error; ?></div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Sign up here</a>.</p>
    </div>
</body>
</html>
<?php
include 'connection.php';

// Initialize variables
$firstname = '';
$lastname = '';
$contactnumber = '';
$username = '';
$username_error = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insert'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $contactnumber = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            $username_error = "This username is already taken. Please choose another one.";

        } else {
            $insert_sql = "INSERT INTO user (first_name, last_name, contact_number, username, password)
            VALUES ('$firstname', '$lastname', '$contactnumber', '$username', '$password')";
            
            if ($conn->query($insert_sql)) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error registering user, please try again.";
            }            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        * {
            box-sizing: border-box; 
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e9ecef; 
            font-family: Arial, sans-serif; 
        }

        .container {
            max-width: 350px;
            width: 100%; 
            background: #ffffff; 
            border-radius: 20px; 
            padding: 30px;
            box-shadow: rgba(133, 189, 215, 0.5) 0px 10px 20px;
            margin: 20px;
        }

        h1 {
            color: #0070E1;
            text-align: center; 
            margin-bottom: 20px;
            font-weight: 900;
            font-size: 30px;
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
            margin-bottom: 5px;
        }

        input:focus + label,
        input:not(:placeholder-shown) + label {
            top: -15px;
            left: 20px;
            font-size: 12px;
            color: #0070E1;
        }

        .btn {
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
        }

        .btn:hover {
            background-color: #0056b3; 
            transform: scale(1.03);
        }

        .btn:active {
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
        <h1>Registration</h1>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="first_name" placeholder=" " value="<?php echo $firstname; ?>" required>
                <label>First Name</label>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" placeholder=" " value="<?php echo $lastname; ?>" required>
                <label>Last Name</label>
            </div>
            <div class="form-group">
                <input type="text" name="contact_number" placeholder=" " value="<?php echo $contactnumber; ?>" required>
                <label>Contact Number</label>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder=" " value="<?php echo $username; ?>" required>
                <label>Username</label>
                <div class="error"><?php echo $username_error; ?></div>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder=" " required>
                <label>Password</label>
            </div>
            <button class="btn" type="submit" name="insert">Register</button>
        </form>
        <p>If you already have an account, you can <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
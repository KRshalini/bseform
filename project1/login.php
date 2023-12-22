<?php
session_start();

if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    echo "Logout successful!";
}

?>
<?php

include("reg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = trim($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $query = "SELECT *,role FROM person_details WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
           // echo "Password is valid<br>";
            
            $_SESSION["role"] = $row['role'];
            $_SESSION["id"] = $row['id']; 
            

            if ($row['role'] == 2) {
                header("Location: table.php"); 
            }  else {
                header("Location: index.php"); 
            }

            exit();
        } else {
            echo "Invalid password";
           
        }
    } else {
        echo "Invalid email or password";
    }
} 
?>
<html>
<head>
    <style>
        .class {
            border-collapse: collapse;
            background-color: white;
            position: absolute;
            box-sizing: border-box;
            margin: 30px 250px;
            padding: 50px;
            border-style: solid;
        }
        
        .title {
            text-align: center;
        }
        
        .input {
            padding: 20px 20px;
        }
    </style>
</head>
<body>
    <div class="class">
        <form action="#" id="formvalidation" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h1>LOGIN</h1>
            </div>

            <div class="input">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
            </div>

            <div class="input">
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
            </div>
        
            <div class="input">
                <input type="submit" name="login" value="Login">   
            </div>
            <div>
            <p>Not have an account, <a href="form1.php">Register</a>.</p>
            </div>

        </form>
    </div>
</body>
</html>

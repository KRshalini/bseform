<?php
include("db.php");
?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#email").keyup(function(e){
                var email = $("#email").val();

                $.ajax({
                    type: "POST",
                    url: "checkemail.php",
                    data: { email: email },
                    success: function(response){
                        if(response === 'exists'){
                            $('#email-error').html('');
                        } else {
                            $('#email-error').html('Email does not exist');
                        }
                    }
                });
            });

            $('#login').submit(function(e){
                e.preventDefault();
                
                var email = $('#email').val();

                $.ajax({
                    type: 'POST',
                    url: 'checkemail.php',
                    data: { email: email },
                    success: function(response){
                        if(response === 'exists'){
                            $('#email-error').html('');
                            $('#login').unbind('submit').submit();
                        } else {
                            $('#email-error').html('Email does not exist');
                        }
                    }
                });
            });
        });
    </script>
  <script src="password.js"></script>
</head>
<body>
    <div class="class">
        <form action="" id="login" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h1>LOGIN</h1>
            </div>

            <div class="input">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <span id="email-error" style="color: red;"></span><br>
            </div>

            <div class="input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <span id="password-error" style="color: red;"></span><br>
                <span id="password-message" style="color: red;"></span><br>
                
            </div>
        
            <div class="input">
                <input type="submit" name="login" value="Login">  
                
            </div>
            
        </form>
    </div>
</body>
</html>
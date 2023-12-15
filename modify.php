<?php
include("reg.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from person_details where id='$id'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    $skills1 = explode(",", $result['skills']);
    $location = explode(",", $result['location']);
}
?>

<html>
  <style>
    .class {
        border-collapse: collapse;
        background-color: white;
        position: center;
        box-sizing: border-box;
        margin: 10px 300px;
        padding: 50px 50px;
        border-style: solid;
    }
    
    .reg {
        text-align: center;
    }
    
    .form {
        margin-right: 0px;
    }
    
    .input {
        padding: 20px 0px;
    }  
  </style>
  <title>FORM</title>
  <body>
    <div class="class">
        <form action="#" id="formvalidation" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h1>UPDATE FORM</h1>
            </div>
            <div class="form">
                <div class="input">
                    <label for="fname">FirstName:</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo $result['firstname'] ?>"><br>
                </div>

                <div class="input">
                    <label for="lname">LastName:</label>
                    <input type="text" name="lastname"  value="<?php echo $result['lastname'] ?>"><br>
                </div>

                <div class="input">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $result['email'] ?>"><br>
                </div>

                <div class="input">
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="<?php echo $result['password'] ?>"><br>
                </div>

                <div class="input">
                    <label for="gender">Gender:</label><br>
                    <input type="radio" name="gender" value="Female" <?php if($result['gender']=="Female") echo "checked"; ?>>Female
                    <input type="radio" name="gender" value="Male" <?php if($result['gender']=="Male") echo "checked"; ?>>Male<br>
                </div>

                <div class="input">
                    <label for="native">Native:</label>
                    <select name="native">
                        <option value="Select">Select</option>
                        <option value="Chennai" <?php if($result['native'] == 'Chennai') echo "selected"; ?>>Chennai</option>
                        <option value="Madurai" <?php if($result['native'] == 'Madurai') echo "selected"; ?>>Madurai</option>
                        <!-- Add other options as needed -->
                    </select>
                </div>

                <div class="input">
                    <input type="file" name="uploadfile"><br><br>
                </div>  

                <div class="input">
                    <label for="skills">Skills:</label>
                    <input type="checkbox" name="skills[]" value="Java" <?php if(in_array("Java", $skills1)) echo "checked"; ?>>Java 
                    <input type="checkbox" name="skills[]" value="CPP" <?php if(in_array("CPP", $skills1)) echo "checked"; ?>>cpp
                    <input type="checkbox" name="skills[]" value="Python" <?php if(in_array("Python", $skills1)) echo "checked"; ?>>python
                    <input type="checkbox" name="skills[]" value="NodeJs" <?php if(in_array("NodeJs", $skills1)) echo "checked"; ?>>nodejs
                    <input type="checkbox" name="skills[]" value="C" <?php if(in_array("C", $skills1)) echo "checked"; ?>>C
                    <input type="checkbox" name="skills[]" value="Javascript" <?php if(in_array("Javascript", $skills1)) echo "checked"; ?>>Javascript<br>
                </div>

                <div class="input">
                    <label for="location">Preferred location:</label><br>
                    <select name="location[]" multiple required="select-form-control">
                        <option value="Madurai" <?php echo (isset($location) && in_array('Madurai', $location)) ? "selected" : ""; ?>>Madurai</option>
                        <option value="Bangalore" <?php echo (isset($location) && in_array('Bangalore', $location)) ? "selected" : ""; ?>>Bangalore</option>
                        <option value="Chennai" <?php echo (isset($location) && in_array('Chennai', $location)) ? "selected" : ""; ?>>Chennai</option>
                        <option value="Coimbatore" <?php echo (isset($location) && in_array('Coimbatore', $location)) ? "selected" : ""; ?>>Coimbatore</option>   
                        <option value="Tirchy" <?php echo (isset($location) && in_array('Tirchy', $location)) ? "selected" : ""; ?>>Trichy</option>          
                        <option value="Hyderabad" <?php echo (isset($location) && in_array('Hyderabad', $location)) ? "selected" : ""; ?>>Hyderabad</option>   
                    </select>
                </div>

                <div class="input">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <input type="submit" name="update" value="update">   
                </div>
            </div>
        </form>
    </div>
  </body>
</html>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $native = $_POST['native'];
    $skills = implode(",", $_POST['skills']);
    $location = implode(',', $_POST['location']);

    $sql = "update person_details set firstname='$firstname', lastname='$lastname', email='$email', password='$password', gender='$gender', native='$native', skills='$skills', location='$location' where id='$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Successful');</script>";
    } else {
        echo "Failed to submit";
    }
}
?>

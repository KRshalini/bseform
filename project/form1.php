
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn) {
  echo "Connection Success";
}else{
    echo "Connection failed .mysqli_connect_error";
}

?>

<html>
  

  <style>
    .class{
        border-collapse:collapse;
        background-color:white;
        position:center;
        box-sizing:border-box;
        margin: 10px 300px;
        padding:50px 50px;
        border-style:solid;

    }
    
    .reg{
        text-align:center;
    }
    .form{
        margin-right:0px;
    }
    .input{
        padding:20px 0px;
    }  
  </style>
  <title>FORM</title>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="form.js"></script>
  <script>  
           //country
        $(document).ready(function(){
            $('#country').on('change', function(){
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'data.php',
                        data: 'country_id=' + country_id,
                        success: function(html){
                            $('#state').html(html);
                            $('#city').html('<option value="">Select city</option>'); 
                        }
                        
                    });
                } else {
                    $('#state').html('<option value="">Select state</option>');
                    $('#city').html('<option value="">Select city</option>'); 
                }
            });
              //state
            $('#state').on('change', function(){
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'data.php',
                        data: 'state_id=' + state_id,
                        success: function(html){
                            $('#city').html(html);
                        }
                        
                    });
                } else {
                    $('#city').html('<option value="">Select city</option>'); 
                }
            });
        });
    </script>
  </head>
  <body>
 
    <div class="class">
        <form action="#" id="formvalidation"  method="POST" enctype="multipart/form-data">
        <div class="title">
         <h1>FORM</h1>
        </div>
      <div class="form">
        <div class="input">
          <label for="fname">FirstName:</label>
          <input type="text" id="firstname" name="firstname"><br>
        </div>

        <div class="input">
          <label for="lname">LastName:</label>
          <input type="text" name="lastname"><br>
        </div>

        <div class="input">
          <label for="email">Email:</label>
          <input type="email" name="email"><br>
        </div>

        <div class="input">
          <label for="password">Password:</label>
          <input type="password" name="password"><br>
        </div>
          
        <!-- radio button -->
        <div class="input">
          <label for="gender">Gender:</label><br>
          <input type="radio" name="gender" value="Female">Female
          <input type="radio" name="gender" value="Male">Male<br>
        </div>
  

        <!-- Dropdown -->
        <div class="input">
          <label for="native">Native:</label>
          <select name="native">
            <option value="Select">Select</option>
            <option value="Chennai">Chennai</option>
            <option value="Madurai">Madurai</option>
            <option value="Tirchy">Tirchy</option>
            <option value="coimbatore">Coimbatore</option>
            <option value="Bangalore">Bangalore</option>
          </select>
    
            <!-- checkbox -->
          <div class="input">
            <label for="skills">Skills:</label>
            <input type="checkbox"  name="skills[]" value="Java">Java 
           
            <input type="checkbox"  name="skills[]" value="CPP">cpp
           
            <input type="checkbox"  name="skills[]" value="Python">python
          
            <input type="checkbox"  name="skills[]" value="NodeJs">nodejs
           
            <input type="checkbox"  name="skills[]" value="C">C
            
            <input type="checkbox"  name="skills[]" value="Javascript">Javascript<br>
           
           <!--file upload 
          <div class="input">
          <input type="file" name="uploadfile" required><br>
          </div>  -->
          
            <!-- multiple daatas in dropdown -->
            <div class="input">
            
              <label for="location">Preferred location:</label><br>
              <textare></textarea>
              <select name="location[]" multiple required="select-form-control" >
                 <option value="Madurai">Madurai</option>
                 <option value="Bangalore">Bangalore</option>
                 <option value="Chennai">Chennai</option>
                 <option value="Coimbatore">Coimbatore</option>   
                 <option value="Tirchy">Trichy</option>          
                 <option value="Hyderabad">Hyderabad</option>   
                  
              </select>
            </div>

            <div class="jq">
            <?php 
            include_once "db.php";
            $query = "SELECT * FROM country ORDER BY name ASC";
           // $result = $db->query($query);
            ?>
            <label>Country:</label>
            <select id="country">
                <option value="">Select Country</option>
                <?php
                //ftch country data
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; 
                    }
                } else {
                    echo '<option value="">Not available</option>';
                }
                ?>
            </select>
            <label>State</label>
            <select id="state">:
                <option value="">Select state</option>
            </select>

            <label>City</label>
            <select id="city">
                <option value="">Select city</option>
            </select>
        </div>

        <div class="input">
            <input type="submit" name="submit" value="Submit">   
        </div>

      </div>
    </div>  
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.f.js"></script>
    <script src="form.js"></script>
  </body>
</html>

<?php

$query="SELECT * FROM `person_details` ORDER BY Id DESC LIMIT 1";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

  if(isset($_POST['submit'])){
    if($total==0)
{
  $id = 1; 
}else{
    $result = mysqli_fetch_assoc($data);
    $id =$result['id']+1; 
}
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $native = $_POST['native'];
    $skills = $_POST['skills'];
    $state = $_POST['state'];
   // $img = $_POST['img'];
    $location = implode(',',$_POST['location']);
    $skills1 = implode(",",$skills);
  
    if(isset($_POST['native'])){
        $selected = $_POST['native'];
    }

   // $image = file_get_contents($_FILES['uploadfile']['tmp_name']);

   // $escapedImage = $conn->real_escape_string($image);

   $sql = "insert into person_details(id,firstname,lastname,email,password,gender,native,skills,location,state) values('$id','$firstname','$lastname','$email','$password','$gender','$native','$skills1','$location','$state')";
   $query = mysqli_query($conn,$sql);
   

   if($query){
   echo "<script>alert('Succesfull');</script>";
   }else{
     echo "Failed to submit";
   }
     
  }

?>

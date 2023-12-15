<?php
include("reg.php");

$query = "select * from person_details ";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

//echo $total;

if($total != 0){
    ?>
  <table>
    <th>ID</th>
     <th>FirstName</th>
     <th>LastName</th>
     <th>Email</th>
     <th>Password</th>
     <th>Gender</th>
     <th>Native</th>
     <th>Skills</th>
     <th>Location</th>
     
     <th>Edit/Delete</th>
     
    
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>".$result['id']."</td>
        <td>".$result['firstname']."</td>
        <td>".$result['lastname']."</td>
        <td>".$result['email']."</td>
        <td>".$result['password']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['native']."</td>
        <td>".$result['skills']."</td>
        
        <td>".$result['location']."</td>

        <td><a href='modify.php?id=$result[id] & firstname=$result[firstname] & lastname=$result[lastname] & email=$result[email] & password=$result[password] & gender=$result[gender] & native=$result[native] & skills=$result[skills]  & location=$result[location]'>Edit</a>
        <a href='delete.php?id=$result[id]'>Delete</a></td>

        </tr>
        ";
        
    }
  
}else{
    echo "No records";
}
?>
</table>

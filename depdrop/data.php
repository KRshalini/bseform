<?php
include_once 'db.php';
if(!empty($_POST["country_id"])){
    $query = "Select * from state where country_id= '" . $_POST["country_id"] . "' order by state asc";
    $result = $db->query($query);

    if($result->num_rows > 0){
        echo '<option value="">Select State</option>'; 
        while($row = $result->fetch_assoc()){   //fetch state
            echo '<option value="'.$row['id'].'">'.$row['state'].'</option>'; 
        }
    }else{
        echo '<option value="">Not available</option>'; 
    }
}else if(!empty($_POST["state_id"])){
    $query = "select * from city where state_id= '" . $_POST["state_id"] . "' order by name asc";
    $result = $db->query($query);

    if($result->num_rows > 0){
        echo '<option value="">Select City</option>'; 
        while($row = $result->fetch_assoc()){   //fetch city
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Not available</option>'; 
    }

}
?>
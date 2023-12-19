<?php
require_once("db.php");
$db_handle = new DB();
if(!empty($_POST["state_id"])){
    $query = "Select * from city where state_id= '" . $_POST["state_id"] . "' order by name asc";
    $result = $db_handle->runQuery($query);
    ?>
    <option value disabled selected>Select City</option>
    <?php
    foreach($result as $city){
        ?>
        <option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
        <?php
    }
}
?>
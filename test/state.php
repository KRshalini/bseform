<?php
require_once("db.php");
$db_handle = new DB();
if(!empty($_POST["country_id"])){
    $query = "Select * from state where country_id= '" . $_POST["country_id"] . "' order by state asc";
    $result = $db_handle->runQuery($query);
    ?>
    <option value disabled selected>Select State</option>
    <?php
    foreach($result as $state){
        ?>
        <option value="<?php echo $state["id"]; ?>"><?php echo $state["state"]; ?></option>
        <?php
    }
}
?>
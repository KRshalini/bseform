<!DOCTYPE html>
<html>
<head>
    <title>Dependent dropdown using jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        <h1>jQuery dependent dropdown</h1>
        <div class="jq">
            <?php 
            include_once "dbconnect.php";
            $query = "SELECT * FROM country ORDER BY name ASC";
            $result = $db->query($query);
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
    </div>
</body>
</html>

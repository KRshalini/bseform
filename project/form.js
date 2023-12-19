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
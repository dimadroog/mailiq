jQuery(document).ready(function() {
  jQuery('#pollform').on('submit', function(e){
    
    e.preventDefault();
    
    var	data = (jQuery('#pollform').serializeArray());

    jQuery.ajax({
        type: 'POST',
        url: 'formproceed.php',
        data: data,
        success: function(data){
        	data = jQuery.parseJSON(data);
            // console.log(data.cnt_right_answers);

            jQuery('.poll__response').removeClass('d-none');
            if (data.pool_correct) {
            	jQuery('.poll__response').addClass('bg-success');
            	jQuery('.poll__response__header').text('Успех');
            } else {
            	jQuery('.poll__response').addClass('bg-danger');
            	jQuery('.poll__response__header').text('Ошибка');
            }
        	
        	jQuery('.poll__response__cnt_right_answers').text(data.cnt_right_answers);
        	jQuery('.poll__response__cnt_questions').text(data.cnt_questions);
        	jQuery('.poll__submit').prop('disabled', true);
        	jQuery('.poll__submit').addClass('disabled');


        }, 
        error: function(){
            alert('error');
        }
    });
  
  });
});
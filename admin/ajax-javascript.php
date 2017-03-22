<script src="<?php echo $url_dir ?>plugins/validate/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function(e) {
    $('.form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

       
    });
    /* ================ #CHECK-ALL =================== */
    $('#check-all').click(function(){
        
        if($(this).prop('checked')){
            $('.check-all').prop('checked', true).parent().parent().find('td').addClass('select');
        }
        else{
            $('.check-all').prop('checked', false).parent().parent().find('td').removeClass('select');
        }
    });
    $('.check-all').click(function(){
        if($(this).prop('checked') == false){
            $(this).parent().parent().find('td').removeClass('select');
            $('#check-all').prop('checked', false);
        }
        else{
            $(this).parent().parent().find('td').addClass('select');
        }
        if($('.check-all:checked').length == $('.check-all').length){
            $('#check-all').prop('checked', true);
        }
    });
});
    
</script>
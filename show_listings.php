<?php  
require('edit_user.php');
require_once('includes/load.php');
include('includes/header_for_news_feed.php');
?>

<div id="add_news_modal_4" class="modal fade" role="dialog" >
    <div class="modal-dialog" style="width: 35%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title_2">Couse category</h4>
        </div>
        <div class="modal-body">
        <div class="well_1 well_3">
          <?php echo get_all_category_order_by_id_2();?>
           
        </div>
        </div>
       
    <div class="modal-footer"></div>
    </div>
</div>
<?php 




    echo show_my_listings();
    
                   


    ?>





<?php
include('includes/footer_for_news_feed.php');
?>
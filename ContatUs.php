
         <?php
        require('edit_user.php');
        require_once('includes/load.php');
        include('includes/header_for_news_feed_2.php');
        confirm_logged_in();
        
         ?>
           
            <div class="form-head" style="border:1px solid red;">
                </div>
                <div class="form-body" style="border:1px solid red;">
                   <form action="" method="post">  
                       <section id="message" style="border:1px solid red;">
                        <p>In this field you can type your message to the admins</p>
                        <textarea name="message"></textarea>
                    </section>
               </form>  
            </div>
            <div class="form-footer"> 
            </div>
            
         
       
    </body>
</html>
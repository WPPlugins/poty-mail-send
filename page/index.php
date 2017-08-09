
<?php
add_filter('admin_head','show_tinyMCE');
 
function show_tinyMCE() {
    wp_enqueue_script( 'common' );
    wp_enqueue_script( 'jquery-color' );
    wp_print_scripts('editor');
    if (function_exists('add_thickbox')) add_thickbox();
    wp_print_scripts('media-upload');
    if (function_exists('wp_tiny_mce')) wp_tiny_mce();
    wp_admin_css();
    wp_enqueue_script('utils');
    do_action("admin_print_styles-post-php");
    do_action('admin_print_styles');
    remove_all_filters('mce_external_plugins');
}
?>


<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Poty Mail Send</h2>
    
    
    <?php
	global $current_user;
      get_currentuserinfo();
	
if($_REQUEST["to"]!=""&&$_REQUEST["subject"]!=""&&$_REQUEST["content"]!=""){
		$remitente = $current_user->user_email;		
		$cuerpo .= $_REQUEST["content"] . "\n";
		$para = $_REQUEST["to"];
		$asunto = $_REQUEST["subject"];
		$encabezados = "From: $remitente\nReply-To: $remitente\nContent-Type: text/html; charset=iso-8859-1";
		
	
		//mando el correo...
	 if (wp_mail($para, $asunto, $cuerpo, $encabezados)) {
		 echo '<div id="message" class="updated below-h2"><p>'.__('Your message has been sent').'</p></div>';
	  } else {
		  		 echo '<div id="message" class="updated below-h2"><p>'.__('There was an error sending mail').'</p></div>';
	  }
}else {	  	
}
?> 
    
    
    
    
	
	<div class="metabox-holder has-right-sidebar">
		
		<!-- Sidebar -->
         <?php require_once( PMS_PATH.'/page/sidebar.php' );?>
         <!-- Sidebar --> <!-- .inner-sidebar -->

		<div id="post-body">
			<div id="post-body-content">

				<div class="postbox">
					<h3><span>&nbsp;</span></h3>
					<div class="inside">
						
                        
                        <div id="mail_box">
                            <form method="POST" action="">
                                <ul>
                                <li><label for="to"><?php _e('To');?>:</label>
                                <input type="text" id="to" name="to" class="txt" />
                                <br class="clear" /></li>
                                
                                <li><label for="subject"><?php _e('Subject');?>:</label>
                                <input type="text" id="subject" name="subject" class="txt" />
                                <br class="clear" /></li>
                                
                                <li><div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" class="postarea">
                                <?php the_editor(stripslashes($content),'content','content', false); ?>
                                </div></li>
                                </ul>
                                <input id="btn_accion" class="button-primary" type="submit" name="<?php _e('Send');?>" /> 
                            </form>
                           </div>
                        
                        
					</div> <!-- .inside -->
				</div>

			</div> <!-- #post-body-content -->
		</div> <!-- #post-body -->

	</div> <!-- .metabox-holder -->
	
</div> <!-- .wrap -->
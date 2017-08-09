<?php
/*Plugin Name: Poty Mail Send
	Plugin URI: http://wordpress.org/plugins/poty-mail-send/
	Description: Plugin to send mails from the administration of wordpress.	
	Version: 0.5
	Author: jmmunozpl
	Author URI: mailto:dev.jmmunozpl@gmail.com
*/

define( "PMS_URL", plugins_url( '/', __FILE__ ) );
define( "PMS_PATH", dirname( __FILE__ ) );




class pms {
    public $_name = 'pms';
	public $_label = 'Poty Mail Send';
    
    function __construct() {
		
		register_activation_hook( __FILE__, array( &$this, 'activate_plugin' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate_plugin' ) );
		
		add_action( 'init', array( &$this, 'init' ) );				
    }
	
	function init() {
		if ( is_admin() )  {
			add_action( 'admin_menu', array( &$this, 'admin_menus' ) );  
		}
		
		wp_enqueue_style( "{$this->_name}-poty-mail-send-css", PMS_URL .'css/poty-mail-send.css' );
		
		wp_enqueue_script( 'jquery' ); 		
		wp_enqueue_script( "jquery-poty-mail-send", PMS_URL .'js/poty-mail-send.js');
	}
	
	

    public static function activate_plugin() {
        
    }
    
	/**
	 * 
	 */
    public static function deactivate_plugin() {
        
    }
	
	/**
	 * 
	 */
    public static function uninstall_plugin() {
      
    }
	
	
	function pms_page() {
		require_once( PMS_PATH.'/page/head.php' );
		require_once( PMS_PATH.'/page/index.php' );
    }
	
    
    function admin_menus() {
        add_menu_page( $this->_label, $this->_label, 8, $this->_name, array( &$this, 'pms_page' ), PMS_URL .'css/img/ico-menu.png' );

    }
	
}
new pms();
?>
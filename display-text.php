<?php
    /*
    Plugin Name: display_text
    Description: Plugin for Dispaly Content like:- text, html code, javascript, adsensecode, etc...
    Author: prashant
    Version: 1.0
    */
    /*
    For More Contact :-
    Aurthor Contact
    */
    function display_text_admin_menus() {
        add_menu_page('Display Text', 'Display Text', 8, 'md_page_general', 'general_settings_page');
        add_submenu_page('md_page_general',
        'Display Text', 'Display Text', 8,
        'md_page_general', '');
    }
    add_action("admin_menu", "display_text_admin_menus");

    function general_settings_page(){
        if(isset($_POST['btn_submit']))
        {
            update_option('txt_text',stripslashes($_POST['txt_text']));
        ?>
        <script type="text/javascript">window.location.href= "<?php echo get_bloginfo('url'); ?>/wp-admin/admin.php?page=md_page_general&sv=1";</script>
        <?php
        }
        
        if($_GET['sv'] == '1'){
            echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
            <p><strong>Save successfully.</strong></p>
            </div>';  
        }
    ?>
        <div style="margin-top: 20px; margin-left: 20px;">
        If You like to donate for future creation, Please Click on " Donate button ". <br />
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_donations">
        <input type="hidden" name="business" value="prashant_bca007@yahoo.com">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="item_name" value="MagicSpark Donation">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        </div>
    <form action="" method="post">
        <div style="width: auto; margin-top: 20px; margin-left: 10px;">
        
            <div style="clear: both; width: auto; margin-left: 80px;">
                 <span style="color: green;">If you would like to add a This Content to your website, just copy and put this shortcode onto your post or page or widget or Code :</span><span style="color: black;"> [display_text_short]</span>
            </div>
            <div class="left_side">
                <span>Enter Text : </span>
            </div>
            <div class="left_side">
                <span><textarea cols="100" rows="18" name="txt_text"><?php echo get_option('txt_text'); ?></textarea>
                    <input type="hidden" name="hdn_submit" id="hdn_submit" value="1">
                </span>
            </div>
            <div style="clear: both; width: 500px; margin-left: 80px;">
                <span style="color: red;">You can add javascript / text / html code / adsense code / etc..</span>
            </div>
            <div class="btn_class">
                <input type="submit" class="button-primary" name="btn_submit" value="Save">
            </div>
        </div>
    </form>
    <style type="text/css">
        .left_side{
            float: left;
            width: 80px;
        }
        .btn_class{
            clear: both;    
        }
    </style>
    <?php 
    }
    function display_text_init(){   
        $options = array('description' => 'This widgets display text.');

        wp_register_widget_control('display_text','display_text','display_text_widget_control',$options);

        add_shortcode( 'display_text_short', 'display_text_short_code');
    }
    function display_text_short_code(){
        echo get_option('txt_text');
    }
    add_action('init','display_text_init');    
?>
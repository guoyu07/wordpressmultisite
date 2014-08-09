<?php
/*
Plugin Name: bsWordPressPlugIn
Plugin URI: http://google.com
Description: Creates a WP Site
Version: 1.0
Author: Billie Smothers
Author URI: http://google.com
*/
define("bsWordPressPlugIn_ID", "bsWordPressPlugIn");

function widget_coming_next_init() {
  wp_register_sidebar_widget(bsWordPressPlugIn_ID,
    __('BS WP Plug-In'), 'widget_bsWordPressPlugIn');
    
    //add teh wiget control
    wp_register_widget_control(bsWordPressPlugIn_ID, __('BS'), 'bs_widget_control');
}

function widget_bsWordPressPlugIn(){
  echo "<div class=\"widefat\">Ah ha, I am a widiget igit</div>";
}

function bs_widget_control() {
  $widget_data = $_POST[bsWordPressPlugIn_ID];
  if ($widget_data['submit']) {
    $options['siteName'] = $widget_data['siteName'];
    $options['adminName'] = $widget_data['adminName'];
    $options['adminPassword'] = $widget_data['adminPassword'];
 
    shell_exec("wp.sh $options['siteName'] $options['adminName'] $options['adminPassword']")
  }
   
  // The HTML form will go here
  ?>
<p>
  <label for="<?php echo bsWordPressPlugIn_ID;?>-siteName">
    Name of Site Install:
  </label>
  <input class="widefat"
    type="text"
    name="<?php echo bsWordPressPlugIn_ID; ?>[siteName]"
    id="<?php echo bsWordPressPlugIn_ID; ?>-siteName"
    value=""/>
</p>
<p>
  <label for="<?php echo bsWordPressPlugIn_ID;?>-adminName">
    Admin User Name:
  </label>
  <input class="widefat" type="text"
    name="<?php echo bsWordPressPlugIn_ID; ?>[adminName]"
    id="<?php echo bsWordPressPlugIn_ID; ?>-adminName"
    value=""/>
</p>
<p>
  <label for="<?php echo bsWordPressPlugIn_ID;?>-adminPassword">
    Password:
  </label>
 <input class="widefat" type="text"
    name="<?php echo bsWordPressPlugIn_ID; ?>[adminPassword]"
    id="<?php echo bsWordPressPlugIn_ID; ?>-adminPassword"
    value=""/>  

</p>
<input type="hidden"
  name="<?php echo bsWordPressPlugIn_ID; ?>[submit]"
  value="1"/>
<?php
}
 
// Register widget to WordPress
add_action("plugins_loaded", "widget_coming_next_init");
?>

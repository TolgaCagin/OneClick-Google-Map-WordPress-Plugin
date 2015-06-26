<?php
/*
* Plugin Name: OneClick Google Map
* Plugin URI: http://www.wp-samurai.com/oneclick-google-map-wordpress-plugin/
* Description: Just use location finder and choose your custom icon/logo for Google Map. Use our buttons for show in your content, Super Easy & Highly Customizable
* Version: 1.0
* Author: Wp-Samurai
* Author URI: http://www.wp-samurai.com
*
*/
// ======================================================================
// PLUGIN FUNCTIONS
// ======================================================================
function generateRandomString($length = 6)
{
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ") , 0, $length);
}
$pluginversion = '1.0';
// Gives information Plugin Version
function oneclick_call_color_picker()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('call_color_picker', plugins_url('color_picker.js', __FILE__) , array(
    'wp-color-picker'
    ) , false, true);
}
add_action('admin_enqueue_scripts', 'oneclick_call_color_picker');
// ======================================================================
// MENU ACTIONS
// ======================================================================
/*
 * Add a menu, with sub-menu, that contains multiple links, that all open in a new window
 * Change the Menu 'title' name and 'href' link.
 */
// Add page visible to editors

function oneclick_plugin_menu()
{
    add_menu_page('OneClick Google Map', 'OneClick Map', 'manage_options', 'oneclick-google-map', 'oneclick_google_map_plugin_mainpage', 'dashicons-location' /*plugins_url( 'gmap-iconizer/includes/images/map_marker.png')*/);
    add_submenu_page('oneclick-google-map', 'OneClick Google Map', 'OneClick Google Map', 'manage_options', 'oneclick-google-map' );
	add_submenu_page('oneclick-google-map', 'OneClick GeoLocation Finder', 'GeoLocation Finder', 'manage_options', 'oneclick-geolocation-finder', 'oneclick_google_map_plugin_geolocationpage');
}
add_action('admin_menu', 'oneclick_plugin_menu');
// ======================================================================
// MAIN PLUGIN PAGE
// ======================================================================
function oneclick_google_map_plugin_mainpage()
{
    if (!current_user_can('manage_options')) {
        wp_die('We hereby declarating :You are not authorised to access this plugin');
    }
    global $plugin_url;
    global $options;
    if (isset($_POST['google_settings_form_submitted'])) {
        $hidden_field = esc_html($_POST['google_settings_form_submitted']);
        if ($hidden_field == "Y") {
            $gmap_iconizer_apikey = esc_html($_POST['gmap_iconizer_apikey']);
            $options_settings['gmap_iconizer_apikey'] = $gmap_iconizer_apikey;
            $gmap_iconizer_zoomcontrol = esc_html($_POST['gmap_iconizer_zoomcontrol']);
            $options_settings['gmap_iconizer_zoomcontrol'] = $gmap_iconizer_zoomcontrol;
            $gmap_iconizer_zoomcontrolSize = esc_html($_POST['gmap_iconizer_zoomcontrolSize']);
            $options_settings['gmap_iconizer_zoomcontrolSize'] = $gmap_iconizer_zoomcontrolSize;
            $gmap_iconizer_zoomcontrolPosition = esc_html($_POST['gmap_iconizer_zoomcontrolPosition']);
            $options_settings['gmap_iconizer_zoomcontrolPosition'] = $gmap_iconizer_zoomcontrolPosition;
            $gmap_iconizer_maptype = esc_html($_POST['gmap_iconizer_maptype']);
            $options_settings['gmap_iconizer_maptype'] = $gmap_iconizer_maptype;
			$gmap_iconizer_type = esc_html($_POST['gmap_iconizer_type']);
            $options_settings['gmap_iconizer_type'] = $gmap_iconizer_type;
            $gmap_iconizer_maptypecontrol_style = esc_html($_POST['gmap_iconizer_maptypecontrol_style']);
            $options_settings['gmap_iconizer_maptypecontrol_style'] = $gmap_iconizer_maptypecontrol_style;
            $gmap_iconizer_maptype_position = esc_html($_POST['gmap_iconizer_maptype_position']);
            $options_settings['gmap_iconizer_maptype_position'] = $gmap_iconizer_maptype_position;
            $gmap_iconizer_pancontrol = esc_html($_POST['gmap_iconizer_pancontrol']);
            $options_settings['gmap_iconizer_pancontrol'] = $gmap_iconizer_pancontrol;
            $gmap_iconizer_pan_position = esc_html($_POST['gmap_iconizer_pan_position']);
            $options_settings['gmap_iconizer_pan_position'] = $gmap_iconizer_pan_position;
            $gmap_iconizer_streetviewcontrol = esc_html($_POST['gmap_iconizer_streetviewcontrol']);
            $options_settings['gmap_iconizer_streetviewcontrol'] = $gmap_iconizer_streetviewcontrol;
            $gmap_iconizer_streetviewcontrol_position = esc_html($_POST['gmap_iconizer_streetviewcontrol_position']);
            $options_settings['gmap_iconizer_streetviewcontrol_position'] = $gmap_iconizer_streetviewcontrol_position;
            update_option('oneclick', $options_settings);
        }
    }
    if (isset($_POST['google_settings_form_submitted'])) {
        $hidden_field = esc_html($_POST['google_settings_form_submitted']);
        if ($hidden_field == "Y") {
            $gmap_iconizer_zoom_level = esc_html($_POST['gmap_iconizer_zoom_level']);
            $options_geolocation['gmap_iconizer_zoom_level'] = $gmap_iconizer_zoom_level;
            $gmap_iconizer_latitude = esc_html($_POST['gmap_iconizer_latitude']);
            $options_geolocation['gmap_iconizer_latitude'] = $gmap_iconizer_latitude;
            $gmap_iconizer_longitude = esc_html($_POST['gmap_iconizer_longitude']);
            $options_geolocation['gmap_iconizer_longitude'] = $gmap_iconizer_longitude;
            update_option('oneclick_geolocation', $options_geolocation);
        }
    }
    $options_geolocation = get_option('oneclick_geolocation');
    $gmap_iconizer_zoom_level = $options_geolocation['gmap_iconizer_zoom_level'];
    $gmap_iconizer_latitude = $options_geolocation['gmap_iconizer_latitude'];
    $gmap_iconizer_longitude = $options_geolocation['gmap_iconizer_longitude'];
    $options_iconizer = get_option('oneclick');
    $gmap_iconizer_apikey = $options_iconizer['gmap_iconizer_apikey'];
    $gmap_iconizer_zoomcontrol = $options_iconizer['gmap_iconizer_zoomcontrol'];
    $gmap_iconizer_zoomcontrolSize = $options_iconizer['gmap_iconizer_zoomcontrolSize'];
    $gmap_iconizer_zoomcontrolPosition = $options_iconizer['gmap_iconizer_zoomcontrolPosition'];
    $gmap_iconizer_maptype = $options_iconizer['gmap_iconizer_maptype'];
	$gmap_iconizer_type = $options_iconizer['gmap_iconizer_type'];
    $gmap_iconizer_maptypecontrol_style = $options_iconizer['gmap_iconizer_maptypecontrol_style'];
    $gmap_iconizer_maptype_position = $options_iconizer['gmap_iconizer_maptype_position'];
    $gmap_iconizer_pancontrol = $options_iconizer['gmap_iconizer_pancontrol'];
    $gmap_iconizer_pan_position = $options_iconizer['gmap_iconizer_pan_position'];
    $gmap_iconizer_streetviewcontrol = $options_iconizer['gmap_iconizer_streetviewcontrol'];
    $gmap_iconizer_streetviewcontrol_position = $options_iconizer['gmap_iconizer_streetviewcontrol_position'];
    if (isset($_POST['frontend_settings_form_submitted'])) {
        $hidden_field_frontend = esc_html($_POST['frontend_settings_form_submitted']);
        if ($hidden_field_frontend == "Y") {
            $gmap_iconizer_upload_icon = esc_html($_POST['upload_icon']);
            $options_frontend['gmap_iconizer_upload_icon'] = $gmap_iconizer_upload_icon;
            $gmap_iconizer_maphue = esc_html($_POST['gmap_iconizer_hue']);
            $options_frontend['gmap_iconizer_maphue'] = $gmap_iconizer_maphue;
            $gmap_iconizer_mapsaturation = esc_html($_POST['gmap_iconizer_saturation']);
            $options_frontend['gmap_iconizer_mapsaturation'] = $gmap_iconizer_mapsaturation;
            $gmap_iconizer_mapwidth = esc_html($_POST['gmap_iconizer_mapwidth']);
            $options_frontend['gmap_iconizer_mapwidth'] = $gmap_iconizer_mapwidth;
            $gmap_iconizer_mapheight = esc_html($_POST['gmap_iconizer_mapheight']);
            $options_frontend['gmap_iconizer_mapheight'] = $gmap_iconizer_mapheight;
            $gmap_iconizer_mapstyle = esc_html($_POST['gmap_iconizer_mapstyle']);
            $options_frontend['gmap_iconizer_mapstyle'] = $gmap_iconizer_mapstyle;
            $gmap_iconizer_mapcontainerstyle = esc_html($_POST['gmap_iconizer_mapcontainerstyle']);
            $options_frontend['gmap_iconizer_mapcontainerstyle'] = $gmap_iconizer_mapcontainerstyle;
            update_option('oneclick_frontend', $options_frontend);
        }
    }
    $options_frontend_admin = get_option('oneclick_frontend');
    $gmap_iconizer_upload_icon = $options_frontend_admin['gmap_iconizer_upload_icon'];
    $gmap_iconizer_maphue = $options_frontend_admin['gmap_iconizer_maphue'];
    $gmap_iconizer_mapsaturation = $options_frontend_admin['gmap_iconizer_mapsaturation'];
    $gmap_iconizer_mapwidth = $options_frontend_admin['gmap_iconizer_mapwidth'];
    $gmap_iconizer_mapheight = $options_frontend_admin['gmap_iconizer_mapheight'];
    $gmap_iconizer_mapstyle = $options_frontend_admin['gmap_iconizer_mapstyle'];
    $gmap_iconizer_mapcontainerstyle = $options_frontend_admin['gmap_iconizer_mapcontainerstyle'];
    $options_main_frontend = get_option('oneclick_google_map_frontend_tutorials');
    $options_main_advanced = get_option('oneclick_google_map_advanced_tutorials');
    $options_main_installation = get_option('oneclick_google_map_installation_tutorials');
    $tutorial_last_updated = $options_main_installation['last_updated'];
    $timenow = time();
    $check_updates_difference = $timenow - $tutorial_last_updated;
    // ======================================================================
    // /* 604800 for a Week 86400 for a day */
    // ======================================================================
    if ($check_updates_difference > 150) {
        $tutorial_frontend_api = oneclick_call_wp_frontend_api();
        $tutorial_advanced_api = oneclick_call_wp_advanced_api();
        $tutorial_installation_api = oneclick_call_wp_installation_api();
        $tutorials_frontend['oneclick_google_map_frontend_tutorials'] = $tutorial_frontend_api;
        $tutorial_advanced['oneclick_google_map_advanced_tutorials'] = $tutorial_advanced_api;
        $tutorial_installation['oneclick_google_map_installation_tutorials'] = $tutorial_installation_api;
        $tutorial_installation['last_updated'] = time();
        update_option('oneclick_google_map_frontend_tutorials', $tutorials_frontend);
        update_option('oneclick_google_map_advanced_tutorials', $tutorial_advanced);
        update_option('oneclick_google_map_installation_tutorials', $tutorial_installation);
    }
    $context = stream_context_create(array(
    'http' => array(
    'header' => 'Accept: application/xml'
    )
    ));
    $url = 'http://wp-samurai.com/wp-samurai-updates.xml';
    $xml = file_get_contents($url, false, $context);
    $xml = simplexml_load_string($xml);
    $updatedversion = $xml->googlemap->version;
    global $pluginversion;
    $updatedversion = (double)$updatedversion;
    $pluginversion = (double)$pluginversion;
    if ($updatedversion > $pluginversion) {
        echo '<div style="width:80%; padding: 10px;margin-left:0px;margin-bottom:15px;margin-top:15px;" class="error below-h2">
        We updated Our Plugin from ' . $pluginversion . ' to ' . $updatedversion . ' at ' . $xml->googlemap->publish_date . '
        <p>Release Notes :' . $xml->googlemap->description . '
        </br>' . $xml->googlemap->releasenote1 . ', ' . $xml->googlemap->releasenote2 . '
        </p>
        <p>
        Bug Fixes :</br> ' . $xml->googlemap->bug1 . ', ' . $xml->googlemap->bug2 . '
        </p>
        <p>Please take time to <a href="' . $xml->googlemap->downloadurl . '" target="_blank">download</a> new version from CodeCanyon</p>
        </div>';
    }
    else {
    }
    require ('includes/plugin_mainpage_wrapper.php');
}
// ======================================================================
// SECONDARY PLUGIN PAGE
// ======================================================================
function oneclick_google_map_plugin_geolocationpage()
{
    if (!current_user_can('manage_options')) {
        wp_die('We hereby declarating :You are not authorised to access this plugin');
    }
    global $plugin_url;
    global $options;
    if (isset($_POST['geolocation_settings_form_submitted'])) {
        $hidden_field = esc_html($_POST['geolocation_settings_form_submitted']);
        if ($hidden_field == "Y") {
            $gmap_iconizer_latitude = esc_html($_POST['gmap_iconizer_latitude']);
            $options_geolocation_page['gmap_iconizer_latitude'] = $gmap_iconizer_latitude;
            $gmap_iconizer_longitude = esc_html($_POST['gmap_iconizer_longitude']);
            $options_geolocation_page['gmap_iconizer_longitude'] = $gmap_iconizer_longitude;
            $gmap_iconizer_zoom_level = esc_html($_POST['gmap_iconizer_zoom_level']);
            $options_geolocation_page['gmap_iconizer_zoom_level'] = $gmap_iconizer_zoom_level;
            update_option('oneclick_geolocation', $options_geolocation_page);
            $url = admin_url('admin.php?page=oneclick-google-map', 'http');
            echo '<script> window.location="';
            echo $url . '"; </script> ';
        }
    }
    $options = get_option('oneclick_geolocation');
    $gmap_iconizer_zoom_level = $options['gmap_iconizer_zoom_level'];
    $gmap_iconizer_latitude = $options['gmap_iconizer_latitude'];
    $gmap_iconizer_longitude = $options['gmap_iconizer_longitude'];
    require ('includes/plugin_geolocation_wrapper.php');
}
// ======================================================================
// WIDGET SETTINGS
// ======================================================================
class OneClick_Google_Map_Widget_Settings extends WP_Widget
{
    function __construct()
    {
        parent::__construct('advanced_map', // Base ID
        __('OneClick Google Map', 'text_domain') , // Name
        array(
        'description' => __('Super Easy Advanced Google Map on Widget Area', 'text_domain') ,
        ) // Args
        );
    }
    public
    function widget($args, $instance)
    {
        $options_geolocation = get_option('oneclick_geolocation');
        $gmap_iconizer_latitude = $options_geolocation['gmap_iconizer_latitude'];
        $gmap_iconizer_longitude = $options_geolocation['gmap_iconizer_longitude'];
        $map_id = generateRandomString();
        $options_iconizer = get_option('oneclick');
        $gmap_iconizer_apikey = $options_iconizer['gmap_iconizer_apikey'];
        $gmap_iconizer_pancontrol = $options_iconizer['gmap_iconizer_pancontrol'];
        $gmap_iconizer_pan_position = $options_iconizer['gmap_iconizer_pan_position'];
        $gmap_iconizer_streetviewcontrol = $options_iconizer['gmap_iconizer_streetviewcontrol'];
        $gmap_iconizer_streetviewcontrol_position = $options_iconizer['gmap_iconizer_streetviewcontrol_position'];
        $options_frontend_admin = get_option('oneclick_frontend');
        $gmap_iconizer_upload_icon = $options_frontend_admin['gmap_iconizer_upload_icon'];
        $gmap_iconizer_mapwidth = $instance['width'];
        $gmap_iconizer_mapheight = $instance['height'];
        $gmap_iconizer_mapstyle = $instance['mapstyle'];
        $gmap_iconizer_mapcontainerstyle = $instance['containerstyle'];
        require ('includes/oneclick_google_map_widget.php');
    }
    public
    function form($instance)
    {
        $options_frontend_admin = get_option('oneclick_frontend');
        $gmap_iconizer_upload_icon = $options_frontend_admin['gmap_iconizer_upload_icon'];
        $title = !empty($instance['title']) ? $instance['title'] : __('', '');
        $width = !empty($instance['width']) ? $instance['width'] : __('', '');
        $height = !empty($instance['height']) ? $instance['height'] : __('', '');
        $zoomlevel = !empty($instance['zoomlevel']) ? $instance['zoomlevel'] : __('', '');
        $maptype = !empty($instance['maptype']) ? $instance['maptype'] : __('', '');
        $color = !empty($instance['color']) ? $instance['color'] : __('', '');
        $saturation = !empty($instance['saturation']) ? $instance['saturation'] : __('', '');
        $zoomcontrol = !empty($instance['zoomcontrol']) ? $instance['zoomcontrol'] : __('', '');
        $zoomcontrolsize = !empty($instance['zoomcontrolsize']) ? $instance['zoomcontrolsize'] : __('', '');
        $zoomcontrolposition = !empty($instance['zoomcontrolposition']) ? $instance['zoomcontrolposition'] : __('', '');
        $maptypecontrol = !empty($instance['maptypecontrol']) ? $instance['maptypecontrol'] : __('', '');
        $maptypecontroldefault = !empty($instance['maptypecontroldefault']) ? $instance['maptypecontroldefault'] : __('', '');
        $maptypecontrolposition = !empty($instance['maptypecontrolposition']) ? $instance['maptypecontrolposition'] : __('', '');
        $pancontrol = !empty($instance['pancontrol']) ? $instance['pancontrol'] : __('', '');
        $pancontrolposition = !empty($instance['pancontrolposition']) ? $instance['pancontrolposition'] : __('', '');
        $streetviewcontrol = !empty($instance['streetviewcontrol']) ? $instance['streetviewcontrol'] : __('', '');
        $streetviewposition = !empty($instance['streetviewposition']) ? $instance['streetviewposition'] : __('', '');
        $containerstyle = !empty($instance['containerstyle']) ? $instance['containerstyle'] : __('', '');
        $mapstyle = !empty($instance['mapstyle']) ? $instance['mapstyle'] : __('', '');
        $icon = !empty($instance['icon']) ? $instance['icon'] : __('', '');
        require ('includes/oneclick_widget_advanced_form.php');
    }
    public
    function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['width'] = (!empty($new_instance['width'])) ? strip_tags($new_instance['width']) : '';
        $instance['height'] = (!empty($new_instance['height'])) ? strip_tags($new_instance['height']) : '';
        $instance['zoomlevel'] = (!empty($new_instance['zoomlevel'])) ? strip_tags($new_instance['zoomlevel']) : '';
        $instance['maptype'] = (!empty($new_instance['maptype'])) ? strip_tags($new_instance['maptype']) : '';
        $instance['color'] = (!empty($new_instance['color'])) ? strip_tags($new_instance['color']) : '';
        $instance['saturation'] = (!empty($new_instance['saturation'])) ? strip_tags($new_instance['saturation']) : '';
        $instance['zoomcontrol'] = (!empty($new_instance['zoomcontrol'])) ? strip_tags($new_instance['zoomcontrol']) : '';
        $instance['zoomcontrolsize'] = (!empty($new_instance['zoomcontrolsize'])) ? strip_tags($new_instance['zoomcontrolsize']) : '';
        $instance['zoomcontrolposition'] = (!empty($new_instance['zoomcontrolposition'])) ? strip_tags($new_instance['zoomcontrolposition']) : '';
        $instance['maptypecontrol'] = (!empty($new_instance['maptypecontrol'])) ? strip_tags($new_instance['maptypecontrol']) : '';
        $instance['maptypecontroldefault'] = (!empty($new_instance['maptypecontroldefault'])) ? strip_tags($new_instance['maptypecontroldefault']) : '';
        $instance['maptypecontrolposition'] = (!empty($new_instance['maptypecontrolposition'])) ? strip_tags($new_instance['maptypecontrolposition']) : '';
        $instance['pancontrol'] = (!empty($new_instance['pancontrol'])) ? strip_tags($new_instance['pancontrol']) : '';
        $instance['pancontrolposition'] = (!empty($new_instance['pancontrolposition'])) ? strip_tags($new_instance['pancontrolposition']) : '';
        $instance['streetviewcontrol'] = (!empty($new_instance['streetviewcontrol'])) ? strip_tags($new_instance['streetviewcontrol']) : '';
        $instance['streetviewposition'] = (!empty($new_instance['streetviewposition'])) ? strip_tags($new_instance['streetviewposition']) : '';
        $instance['containerstyle'] = (!empty($new_instance['containerstyle'])) ? strip_tags($new_instance['containerstyle']) : '';
        $instance['mapstyle'] = (!empty($new_instance['mapstyle'])) ? strip_tags($new_instance['mapstyle']) : '';
        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        return $instance;
    }
}
function oneclick_google_map_widget()
{
    register_widget('OneClick_Google_Map_Widget_Settings');
}
add_action('widgets_init', 'oneclick_google_map_widget');
// ======================================================================
// SINGLE MAP SHORTCODE SETTINGS
// ======================================================================
function oneclick_shortcode_easy_google_map()
{
    $options_geolocation = get_option('oneclick_geolocation');
    $gmap_iconizer_zoom_level = $options_geolocation['gmap_iconizer_zoom_level'];
    $gmap_iconizer_latitude = $options_geolocation['gmap_iconizer_latitude'];
    $gmap_iconizer_longitude = $options_geolocation['gmap_iconizer_longitude'];
    $map_id = generateRandomString();
    $options_iconizer = get_option('oneclick');
    $gmap_iconizer_apikey = $options_iconizer['gmap_iconizer_apikey'];
    $gmap_iconizer_zoomcontrol = $options_iconizer['gmap_iconizer_zoomcontrol'];
    $gmap_iconizer_zoomcontrolSize = $options_iconizer['gmap_iconizer_zoomcontrolSize'];
    $gmap_iconizer_zoomcontrolPosition = $options_iconizer['gmap_iconizer_zoomcontrolPosition'];
    $gmap_iconizer_maptype = $options_iconizer['gmap_iconizer_maptype'];
	$gmap_iconizer_type = $options_iconizer['gmap_iconizer_type'];
    $gmap_iconizer_maptypecontrol_style = $options_iconizer['gmap_iconizer_maptypecontrol_style'];
    $gmap_iconizer_maptype_position = $options_iconizer['gmap_iconizer_maptype_position'];
    $gmap_iconizer_pancontrol = $options_iconizer['gmap_iconizer_pancontrol'];
    $gmap_iconizer_pan_position = $options_iconizer['gmap_iconizer_pan_position'];
    $gmap_iconizer_streetviewcontrol = $options_iconizer['gmap_iconizer_streetviewcontrol'];
    $gmap_iconizer_streetviewcontrol_position = $options_iconizer['gmap_iconizer_streetviewcontrol_position'];
    $options_frontend_admin = get_option('oneclick_frontend');
    $gmap_iconizer_upload_icon = $options_frontend_admin['gmap_iconizer_upload_icon'];
    $gmap_iconizer_mapwidth = $options_frontend_admin['gmap_iconizer_mapwidth'];
    $gmap_iconizer_maphue = $options_frontend_admin['gmap_iconizer_maphue'];
    $gmap_iconizer_mapsaturation = $options_frontend_admin['gmap_iconizer_mapsaturation'];
    $gmap_iconizer_mapheight = $options_frontend_admin['gmap_iconizer_mapheight'];
    $gmap_iconizer_mapstyle = $options_frontend_admin['gmap_iconizer_mapstyle'];
    $gmap_iconizer_mapcontainerstyle = $options_frontend_admin['gmap_iconizer_mapcontainerstyle'];
    ob_start();
    ?>
    <?php
    require ('includes/oneclick_google_map_frontend.php');
    ?>
    <?php
    return ob_get_clean();
}
add_shortcode('oneclick-easy-gmap', 'oneclick_shortcode_easy_google_map');
// ======================================================================
// MULTI MAP SHORTCODE SETTINGS
// ======================================================================
function oneclick_shortcode_easy_content_google_map($atts)
{
    $options_geolocation = get_option('oneclick_geolocation');
    $atts = shortcode_atts(array(
    'lat' => '41.085652',
    'long' => '-73.85846839999999',
    'zoom' => '13',
    'width' => '450',
    'height' => '250',
    'style' => '',
    'icon' => '',
    'basicmaptype' => 'ROADMAP',
    'zoomcontrol' => 'true',
    'zoomcontrolsize' => 'SMALL',
    'zoomcontrolposition' => 'RIGHT_TOP',
    'maptype' => 'true',
    'maptypestyle' => 'HORIZONTAL_BAR',
    'maptypeposition' => 'TOP_RIGHT',
    'pancontrol' => 'false',
    'pancontrolposition' => 'LEFT_TOP',
    'streetview' => 'true',
    'streetviewposition' => 'TOP_LEFT',
    'hue' => '',
    'saturation' => '0',
    'containerstyle' => '',
    'style' => ''
    ) , $atts, 'wp-samurai-easy-multi-gmap');
    $gmap_iconizer_latitude = $atts['lat'];
    $gmap_iconizer_longitude = $atts['long'];
    $gmap_iconizer_zoom_level = $atts['zoom'];
    $gmap_iconizer_mapwidth = $atts['width'];
    $gmap_iconizer_mapheight = $atts['height'];
    $gmap_iconizer_upload_icon = $atts['icon'];
    $gmap_iconizer_zoomcontrol = $atts['zoomcontrol'];
    $gmap_iconizer_zoomcontrolSize = $atts['zoomcontrolsize'];
    $gmap_iconizer_zoomcontrolPosition = $atts['zoomcontrolposition'];
    $gmap_iconizer_maptype = $atts['maptype'];
    $gmap_iconizer_maptypecontrol_style = $atts['maptypestyle'];
    $gmap_iconizer_maptype_position = $atts['maptypeposition'];
    $gmap_iconizer_pancontrol = $atts['pancontrol'];
    $gmap_iconizer_pan_position = $atts['pancontrolposition'];
    $gmap_iconizer_streetviewcontrol = $atts['streetview'];
    $gmap_iconizer_streetviewcontrol_position = $atts['streetviewposition'];
    $gmap_iconizer_basic_map_type = $atts['basicmaptype'];
    $gmap_iconizer_hue = $atts['hue'];
    $gmap_iconizer_mapstyle = $atts['style'];
    $gmap_iconizer_containerstyle = $atts['containerstyle'];
    $gmap_iconizer_saturation = $atts['saturation'];
    $map_id = generateRandomString();
    $options_iconizer = get_option('oneclick');
    $gmap_iconizer_apikey = $options_iconizer['gmap_iconizer_apikey'];
    $options_frontend_admin = get_option('oneclick_geolocation');
    $gmap_iconizer_mapstyle = $atts['style'];
    $gmap_iconizer_mapcontainerstyle = $options_frontend_admin['gmap_iconizer_mapcontainerstyle'];
    ob_start();
    ?>
    <?php
    require ('includes/oneclick_google_multimap_frontend.php');
    ?>
    <?php
    return ob_get_clean();
}
add_shortcode('oneclick-easy-content-gmap', 'oneclick_shortcode_easy_content_google_map');
// ======================================================================
// BACKEND JAVASCRIPT & STYLE SETTINGS
// ======================================================================
function check_plugin_mainscreen_name()
{
    $screen = get_current_screen();
    if (is_object($screen) && $screen->id == 'toplevel_page_oneclick-google-map') {
        return true;
    }
    else {
        return false;
    }
}
function plugin_main_page_scripts()
{
    if (check_plugin_mainscreen_name()) {
        wp_enqueue_style('style-name', plugin_dir_url(__FILE__) . 'includes/css/iconizer-backend.css');
        wp_enqueue_script('gmap_iconizer_custom', plugin_dir_url(__FILE__) . 'includes/js/gmap_iconizer_custom.js', 'jquery', '', false);
    }
}
add_action('admin_enqueue_scripts', 'plugin_main_page_scripts');
function check_geolocation_screen_name()
{
    $screen = get_current_screen();
    if (is_object($screen) && $screen->id == 'oneclick-map_page_oneclick-geolocation-finder') {
        return true;
    }
    else {
        return false;
    }
}
function plugin_geolocation_page_scripts()
{
    if (check_geolocation_screen_name()) {
        wp_enqueue_style('style-name', plugin_dir_url(__FILE__) . 'includes/css/iconizer-backend.css');
        wp_enqueue_script('gmap_iconizer_custom', plugin_dir_url(__FILE__) . 'includes/js/gmap_iconizer_geolocation.js', 'jquery', '', false);
    }
}
add_action('admin_enqueue_scripts', 'plugin_geolocation_page_scripts');
function plugin_uploader_scripts()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    wp_enqueue_script('sensor_js', 'http://maps.googleapis.com/maps/api/js?sensor=false', '', false);
    /* wp_enqueue_script( 'jscolorpicker', plugin_dir_url( __FILE__ ) . 'includes/js/jscolor.js' ,'jquery', '', false ); */
}
function plugin_uploader_styles()
{
    wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'plugin_uploader_scripts');
add_action('admin_enqueue_scripts', 'plugin_uploader_styles');
// ======================================================================
// FRONTEND JAVASCRIPT & STYLE SETTINGS
// ======================================================================
function plugin_frontend_scripts_styles()
{
    $options = get_option('oneclick');
    $gmap_iconizer_apikey = $options['gmap_iconizer_apikey'];
    if ($gmap_iconizer_apikey != "") {
        wp_enqueue_script('gmap_main_js', 'https://maps.googleapis.com/maps/api/js?v=3key=' . $gmap_iconizer_apikey, '', '', false);
    }
    else {
        wp_enqueue_script('sensor_js', 'http://maps.googleapis.com/maps/api/js?sensor=false', '', false);
    }
}
add_action('wp_enqueue_scripts', 'plugin_frontend_scripts_styles');
// ======================================================================
// DASHBOARD WIDGET
// ======================================================================
function wp_samurai_dashboard_widget_function()
{
    // ======================================================================
    // /* 604800 for a Week 86400 for a day */
    // ======================================================================
    $options_wp_samurai_dashboard = get_option('oneclick_dashboard_news');
    $tutorial_last_updated = $options_wp_samurai_dashboard['last_updated'];
    $timenow = time();
    $check_updates_difference = $timenow - $tutorial_last_updated;
    if ($check_updates_difference > 150) {
        $wp_samurai_call_wp_dashboard_widget_api = wp_samurai_call_wp_dashboard_widget_api();
        $arr = array_slice($wp_samurai_call_wp_dashboard_widget_api, -3, 3, true);
        $options_wp_samurai_dashboard['gmap_iconizer_dashboard'] = $wp_samurai_call_wp_dashboard_widget_api;
        $options_wp_samurai_dashboard['last_updated'] = time();
        update_option('oneclick_dashboard_news', $options_wp_samurai_dashboard);
    }
    require ('includes/plugin_dashboard_widget.php');
}
function wp_samurai_add_dashboard_widgets()
{
    wp_add_dashboard_widget('wp_samurai_dashboard_widget', 'WP-Samurai Plugin News & Updates', 'wp_samurai_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wp_samurai_add_dashboard_widgets');
// ======================================================================
// WP_API CONFIGS
// ======================================================================
function oneclick_call_wp_frontend_api()
{
    $args = array(
    'timeout' => 240
    );
    $json_feed_get_frontend = 'http://wp-samurai.com/wp-json/posts/?type=tutorials&filter[category_name]=frontend';
    $json_frontend = wp_remote_get($json_feed_get_frontend, $args);
    $tutorial_frontend_api = json_decode($json_frontend['body']);
    return $tutorial_frontend_api;
}
function oneclick_call_wp_advanced_api()
{
    $args = array(
    'timeout' => 240
    );
    $json_feed_get_advanced = 'http://wp-samurai.com/wp-json/posts/?type=tutorials&filter[category_name]=advanced';
    $json_advanced = wp_remote_get($json_feed_get_advanced, $args);
    $tutorial_advanced_api = json_decode($json_advanced['body']);
    return $tutorial_advanced_api;
}
function oneclick_call_wp_installation_api()
{
    $args = array(
    'timeout' => 240
    );
    $json_feed_get_installation = 'http://wp-samurai.com/wp-json/posts/?type=tutorials&filter[category_name]=installation';
    $json_installation = wp_remote_get($json_feed_get_installation, $args);
    $tutorial_installation_api = json_decode($json_installation['body']);
    return $tutorial_installation_api;
}
function wp_samurai_call_wp_dashboard_widget_api()
{
    $args = array(
    'timeout' => 120
    );
    $json_feed_get_frontend = 'http://wp-samurai.com/wp-json/posts/?type=news';
    $json_frontend = wp_remote_get($json_feed_get_frontend, $args);
    $wp_samurai_call_wp_dashboard_widget_api = json_decode($json_frontend['body']);
    return $wp_samurai_call_wp_dashboard_widget_api;
}
// ======================================================================
// PLUGIN TINYMCE SETTINGS
// ======================================================================
add_action('admin_init', 'wp_samurai_tinymce_buttons');
function wp_samurai_tinymce_buttons()
{
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_buttons', 'registering_tiny_mce_buttons');
        add_filter('mce_external_plugins', 'register_buttons');
    }
}
function registering_tiny_mce_buttons($buttons)
{
    array_push($buttons, "btn_standart", "btn_multi", "btn_icon");
    return $buttons;
}
function register_buttons($plugin_array)
{
    $plugin_array['wp_samurai_register_tinymce_buttons'] = plugins_url('/includes/tinymce/tiny_mce.js', __FILE__);
    return $plugin_array;
}
function get_location()
{
    require ('includes/getlocation.php');
}
add_action('wp_ajax_get_location', 'get_location');
?>
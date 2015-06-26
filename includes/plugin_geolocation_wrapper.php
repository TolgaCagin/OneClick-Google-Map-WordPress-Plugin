<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.button-primary savesettings').click(function() {
        <?php $urlforward = admin_url( 'admin.php?page=wp-samurai-super-easy-google-map', 'http' ); ?>
        window.setTimeout(function() {
            location.href = "<?php echo $urlforward;?>";
        }, 2000);
    });
})
</script>
<div class="main_container" >
<!--#Main Div Start-->
<div id="main_div">
<div id="div1" >
<img src="<?php echo plugins_url( 'images/oneclick-logo.png', __FILE__ ); ?>" class="img" >
</div>
</div>
<!--#Main Div End-->
<h2 class="nav-tab-wrapper margintopminus33" >
<a href="javascript:void(0);" class="nav-tab" style="font-size:1.0vw;">Geolocation Finder</a>
<div class="support_button">
<a href="http://www.wp-samurai.com/oneclick-google-map-call-support" target="_blank"> <img src="<?php echo plugins_url( 'images/call-support.png', __FILE__ ); ?>" width=166 height=42 class="img callsupport" ></a>
</div>
</h2>
<div class="divborder">
<div class="wrap" style="margin-left: 10px;padding-top: 15px;">
<h2>Interactive Google Map </h2>
<div id="poststuff">
<fieldset class="gllpLatlonPicker">
<div id="post-body" class="metabox-holder columns-2">
<!-- main content -->
<div id="post-body-content">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<h3><span>Double Click for Get Geolocation </span></h3>
<div class="inside">
<table>
<tr>
<div class="gllpMap" id="map-canvas" style="height: 350px;width: auto;">Google Maps</div>
</tr>
<br/><br/>
</table>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->
</div> <!-- post-body-content -->
<!-- sidebar -->
<div id="postbox-container-1" class="postbox-container">
<div class="meta-box-sortables">
<div class="postbox">
<h3><span>Geolocation Searching Tools</span></h3>
<div class="inside">
<table>
<tr><p><label for="gmap_iconizer_areaname" style="">Your Location Name: </label>
</p></tr>
<tr style="" >
<input type="text" name="gmap_iconizer_areaname" class="gmap_iconizer_areaname all-options" style="max-width: 70%;margin-right: 10px;margin-bottom: 20px;">
<input type="button" class="gmap_iconizer_areaname_searchbutton button-primary" style="" value="Search"></tr>
<hr />
<form name="geolocation_settings_form" method="post" action="" >
<input type="hidden" name="geolocation_settings_form_submitted" value="Y">
<tr><p><label for="gmap_iconizer_latitude" style="">Enter Your Latidute: </label>
</p></tr>
<tr >
<input type="text" name="gmap_iconizer_latitude" class="gmap_iconizer_latitude all-options" style="margin-bottom: 10px;" value="<?php if($gmap_iconizer_latitude != ""){ echo $gmap_iconizer_latitude;}else{ echo "41.085652";} ?>"/>
</tr>
<tr><p><label for="gmap_iconizer_longitude" style="">Enter Your Longitude: </label>
</p></tr>
<tr>
<input type="text" name="gmap_iconizer_longitude" class="gmap_iconizer_longitude all-options" style="margin-bottom: 10px;" value="<?php if($gmap_iconizer_longitude != ""){ echo $gmap_iconizer_longitude;}else{ echo "-73.8584684";} ?>"/>
</tr>
<tr><p><label for="gmap_iconizer_zoomlevel" style="">Zoom Level: </label>
</p></tr>
<tr>
<select name="gmap_iconizer_zoom_level" class="gmap_iconizer_zoomlevel" style="margin-bottom: 20px;" id="">
<?php if($gmap_iconizer_zoom_level != ""){
    echo '<option value="';
    echo $gmap_iconizer_zoom_level;
    echo '">Selected Level ';
    echo $gmap_iconizer_zoom_level;
    echo "</option>";
    }else{
    echo '"<option value="';
    echo '16">Predetermined Level 16 - Best for City</option>"';
} ?>
<option value="19">Level 19</option>
<option value="18">Level 18</option>
<option value="17">Level 17</option>
<option value="16">Level 16 - Best for City</option>
<option value="15">Level 15</option>
<option value="14">Level 14</option>
<option value="13">Level 13</option>
<option value="12">Level 12</option>
<option value="11">Level 11</option>
<option value="10">Level 10</option>
<option value="9">Level 9</option>
<option value="8">Level 8</option>
<option value="7">Level 7</option>
<option value="6">Level 6</option>
<option value="5">Level 5</option>
<option value="4">Level 4</option>
<option value="3">Level 3</option>
<option value="2">Level 2</option>
<option value="1">Level 1</option>
<option value="0">Level 0</option>
</select>
</tr>
<tr>
<td><input type="button" class="gmap_iconizer_updatebutton button-primary" value="Update Map" style="margin-bottom: 30px;">
</td>
<td> <input class="button-primary savesettings" type="submit" name="save" style="margin-bottom: 30px;margin-left: 10px;" value="<?php _e( 'Save Settings' ); ?>" />
</td>
</tr>
<br/>
</form>
</table>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables -->
</div> <!-- #postbox-container-1 .postbox-container -->
</div> <!-- #post-body .metabox-holder .columns-2 -->
<br class="clear">
</fieldset>
</div> <!-- #poststuff -->
</div> <!-- .wrap -->
</div>
</div>
<div id="div_footer_logo" align="right">
<a href="http://www.wp-samurai.com/" target="_blank"> <img src="<?php echo plugins_url( 'images/wp-samurai-logo-mini.png', __FILE__ ); ?>" width=155 height=29 class="img" ></a>
</div>
<script>jscolor.init();</script>
<style>
@font-face {
    font-family: 'Conv_Hirakatana';
    src: url(' <?php echo plugins_url( 'fonts/Hirakatana.eot', __FILE__ ); ?>');
    src: local('true'), url('<?php echo plugins_url( 'fonts/Hirakatana.woff', __FILE__ ); ?>') format('woff'), url('<?php echo plugins_url( 'fonts/Hirakatana.ttf', __FILE__ ); ?>') format('truetype'), url('<?php echo plugins_url( 'fonts/Hirakatana.svg', __FILE__ ); ?>') format('svg');
    font-weight: normal;
    font-style: normal;
}
</style>
<script type="text/javascript">
function initialize() {
    var mapOptions = {
		mapTypeId: google.maps.MapTypeId.<?php echo $gmap_iconizer_type; ?>,
        zoom: <?php echo $gmap_iconizer_zoom_level; ?>,
        center: new google.maps.LatLng(<?php echo $gmap_iconizer_latitude; ?>,<?php echo $gmap_iconizer_longitude; ?>),
        mapTypeControl: <?php echo $gmap_iconizer_maptype; ?>,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.<?php echo $gmap_iconizer_maptypecontrol_style; ?>,
            position: google.maps.ControlPosition.<?php echo $gmap_iconizer_maptype_position; ?>
        },
        panControl: <?php echo $gmap_iconizer_pancontrol; ?>,
        panControlOptions: {
            position: google.maps.ControlPosition.<?php echo $gmap_iconizer_pan_position; ?>
        },
        zoomControl: <?php echo $gmap_iconizer_zoomcontrol; ?>,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.<?php echo $gmap_iconizer_zoomcontrolSize; ?>,
            position: google.maps.ControlPosition.<?php echo $gmap_iconizer_zoomcontrolPosition; ?>
        },
        scaleControl: false,
        streetViewControl: <?php echo $gmap_iconizer_streetviewcontrol; ?>,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.<?php echo $gmap_iconizer_streetviewcontrol_position; ?>
        }
    }
    var map = new google.maps.Map(document.getElementById('googlemap'),
    mapOptions);
    var styles = [ {
        featureType: "all",
        stylers: [
        { hue: "<?php if($gmap_iconizer_maphue=='#ffffff')
            { echo "0";}
            else { echo $gmap_iconizer_maphue;}
        ?>" },
        { saturation: <?php if($gmap_iconizer_mapsaturation!= '')
            { echo $gmap_iconizer_mapsaturation;}
            else
            { echo '0';}
        ?> }
        ]
    }
    ];
    map.setOptions({styles: styles});
    var image = '<?php echo $gmap_iconizer_upload_icon; ?>';
    var myLatLng = new google.maps.LatLng(<?php echo $gmap_iconizer_latitude; ?>,<?php echo $gmap_iconizer_longitude; ?>);
    var hotel = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        divid: ""
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="main_container" >
<!--#Main Div Start-->
<div id="main_div">
<div id="div1" >
<img src="<?php echo plugins_url( 'images/oneclick-logo.png', __FILE__ ); ?>" class="img" >
</div>
</div>
<h2 class="nav-tab-wrapper margintopminus33" >
<a href="javascript:void(0);" id="custom_settings" class="nav-tab" style="font-size:1.0vw;">Frontend Settings</a>
<a href="javascript:void(0);" id="google_settings" class="nav-tab" style="font-size:1.0vw;">Google Map Settings</a>
<a href="javascript:void(0);" id="video_tutorials" class="nav-tab" style="font-size:1.0vw;">Video Tutorials & Documentation</a>
<div class="support_button">
<a href="http://www.wp-samurai.com/oneclick-google-map-call-support" target="_blank"> <img src="<?php echo plugins_url( 'images/call-support.png', __FILE__ ); ?>" width=166 height=42 class="img callsupport" ></a>
</div>
</h2>
<div class="divborder">
<div id="custom_settings_div" >
<div class="wrap wrapcustom">
<h2>Frontend Settings and Preview</h2>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<!-- main content -->
<div id="post-body-content">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<h3><span>Preview</span></h3>
<div class="inside">
<div class="googlemap_container" style="<?php echo $gmap_iconizer_mapcontainerstyle; ?>
<?php if($gmap_iconizer_mapwidth != ""){
    echo "width:";
    echo $gmap_iconizer_mapwidth;
    echo ";";
    } else {
    echo "width:550px";
} ?>;<?php if($gmap_iconizer_mapheight != ""){
    echo "height:";
    echo $gmap_iconizer_mapheight;
    } else {
    echo "height:400px";
}?>">
<div id="googlemap" class="" style="
<?php if($gmap_iconizer_mapwidth != ""){
    echo "width:";
    echo $gmap_iconizer_mapwidth;
    echo ";";
    } else {
    echo "width:700px";
} ?>
<?php if($gmap_iconizer_mapheight != ""){
    echo "height:";
    echo $gmap_iconizer_mapheight;
    } else {
    echo "height:350px";
}?>
<?php echo $gmap_iconizer_mapstyle; ?>">
</div>
</div>
</div> <!-- .inside end-->
</div> <!-- .postbox end-->
<div class="postbox">
<h3><span>Frontend Settings</span></h3>
<div class="inside">
<form name="frontend_settings_form" method="post" action="" >
<table class="form-table">
<tr>
<td><label for="upload_image1">Google Map Icon:</label></td>
<td>
<input id="upload_icon" type="text" name="upload_icon" value="<?php echo $gmap_iconizer_upload_icon; ?>" class="all-options"/>
<input class="button-primary upload" id="upload_button" type="button" value="Upload Icon" />
</td>
</tr>
<input type="hidden" name="frontend_settings_form_submitted" value="Y">
<tr>
<td><label for="gmap_iconizer_hue">Google Map Hue: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_hue" value="<?php echo $gmap_iconizer_maphue; ?>" class="all-options colorpicker"/>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_saturation">Google Map Saturation: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_saturation" value="<?php echo $gmap_iconizer_mapsaturation; ?>" class="all-options" />
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_mapwidth">Google Map Width: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_mapwidth" value="<?php echo $gmap_iconizer_mapwidth; ?>" class="all-options" />
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_mapheight">Google Map Height: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_mapheight" value="<?php echo $gmap_iconizer_mapheight; ?>" class="all-options" />
</td>
</tr>
<tr>
<td class="vtop"><label for="gmap_iconizer_mapstyle">Google Map Style Definations: </label>
</td>
<td>
<textarea id="" name="gmap_iconizer_mapstyle" cols="gmap_iconizer_mapstyle" rows="6" class="all-options"><?php echo $gmap_iconizer_mapstyle; ?></textarea>
</td>
</tr>
<tr>
<td class="vtop"><label for="gmap_iconizer_mapcontainerstyle">Google Map Container Style Definations: </label>
</td>
<td>
<textarea name="gmap_iconizer_mapcontainerstyle" cols="gmap_iconizer_mapcontainerstyle" rows="6" class="all-options"><?php echo $gmap_iconizer_mapcontainerstyle; ?></textarea>
</td>
</tr>
<tr>
<td></td>
<td><?php submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null )  ?>
</td>
</tr>
</table>
</form>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->
</div> <!-- post-body-content -->
<!-- sidebar -->
<div id="postbox-container-1" class="postbox-container" >
<div class="meta-box-sortables">

<div class="postbox">
<h3><span>Frontend Tutorials</span></h3>
<div class="inside makecenter" id="frontend_tutorials">
<?php $total_row = count( $options_main_frontend['oneclick_google_map_frontend_tutorials'],1);
for ($i = 0; $i <= $total_row-1; $i++):?>
<a href="<?php  $step1=$options_main_frontend['oneclick_google_map_frontend_tutorials'][$i]->excerpt; $step2=substr($step1, 3); echo substr($step2, 0, -5); ?>" target="_blank"> <img src="<?php echo $options_main_frontend['oneclick_google_map_frontend_tutorials'][$i]->featured_image->source; ?>" width=248 height=138 class="img support" ></a>
<?php endfor; ?>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables -->
</div> <!-- #postbox-container-1 .postbox-container -->
</div> <!-- #post-body .metabox-holder .columns-2 -->
<br class="clear">
</div> <!-- #poststuff -->
</div> <!-- .wrap -->
</div>
<div id="google_settings_div">
<div class="wrap wrapcustom " >
<h2>Google Map Advanced Settings</h2>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<!-- main content -->
<div id="post-body-content">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<h3><span>Main Content Header</span></h3>
<div class="inside">
<form name="google_settings_form" method="post" action="" >
<input type="hidden" name="google_settings_form_submitted" value="Y">
<table class="form-table">
<?php if($gmap_iconizer_apikey != "") { ?>
    <tr>
    <td><label>Enable for up 25.000 request per day</label>
    </td>
    <td><input type="radio" name="group1" value="opt1" >
    </td>
    </tr>
    <tr>
    <td><label>Enable for up 1.000.000 request per day</label>
    </td>
    <td><input type="radio" name="group1" value="opt2" checked>
    </td>
<?php }
else { ;?>
    <tr>
    <td><label>Enable for up 25.000 request per day</label>
    </td>
    <td><input type="radio" name="group1" value="opt1" checked>
    </td>
    </tr>
    <tr>
    <td><label>Enable for up 1.000.000 request per day</label>
    </td>
    <td><input type="radio" name="group1" value="opt2" >
    </td>
<?php } ?>
<td>
<?php add_thickbox(); ?>
<div id="maptype_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-map-type.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=maptype_thickbox" class="thickbox"><img id="maptype_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<div id="opt1" class="desc"></div>
<?php if($gmap_iconizer_apikey != "") { ?>
    <tr id="opt2" class="desc">
    <td><label for="gmap_iconizer_apikey">Google Map Api Key: </label>
    </td>
    <td>
    <textarea name="gmap_iconizer_apikey" id="gmap_iconizer_apikey" cols="" rows="2" class="all-options"><?php echo $gmap_iconizer_apikey; ?></textarea>
    </td>
    <td><a class="button-primary" href="<?php
    $url = 'https://code.google.com/apis/console';
    echo $url;
    ?>" title="<?php _e( 'Get Google API Key for Maps upto 1.000.000 request per day' ); ?>" target="_blank"><?php _e( 'Get API Key' ); ?></a>
    </td>
    </tr>
<?php }
else { ;?>
    <tr id="opt2" style="display: none;" class="desc">
    <td><label for="gmap_iconizer_apikey">Google Map Api Key: </label>
    </td>
    <td>
    <textarea name="gmap_iconizer_apikey" id="gmap_iconizer_apikey" cols="" rows="2" class="all-options"><?php echo $gmap_iconizer_apikey; ?></textarea>
    </td>
    <td><a class="button-primary" href="<?php
    $url = 'https://code.google.com/apis/console';
    echo $url;
    ?>" title="<?php _e( 'Get Google API Key for Maps upto 1.000.000 request per day' ); ?>" target="_blank"><?php _e( 'Get API Key' ); ?></a>
    </td>
    </tr>
<?php } ?>

<tr>
<td><label for="gmap_iconizer_zoomcontrol">Google Map Zoom Control: </label>
</td>
<td>
<select name="gmap_iconizer_zoomcontrol" id="">
<?php
if($gmap_iconizer_zoomcontrol!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_zoomcontrol;
    echo '">';
    echo 'Selected Option: ';
    echo ucfirst($gmap_iconizer_zoomcontrol);
    echo '</option>';
    } else {
    echo '<option selected="selected" value="true">Selected Option: True</option>';
}
?>
<option value="true">Map Zoom Control True</option>
<option value="false">Map Zoom Control False</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="zoomcontrol_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-zoom-level.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=zoomcontrol_thickbox" class="thickbox"><img id="zoomlevel_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_zoomcontrolSize">Google Map Zoom Control Size: </label>
</td>
<td>
<select name="gmap_iconizer_zoomcontrolSize" id="">
<?php
if($gmap_iconizer_zoomcontrolSize!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_zoomcontrolSize;
    echo '">';
    echo 'Selected Option: ';
    echo ucfirst(strtolower($gmap_iconizer_zoomcontrolSize));
    echo '</option>';
    } else {
    echo '<option selected="selected" value="small">Selected Option: Small</option>';
}
?>
<option value="LARGE">Large</option>
<option value="SMALL">Small</option>
<option value="DEFAULT">Default</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="zoomcontrol_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-zoom-level.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=zoomcontrol_thickbox" class="thickbox"><img id="zoomlevel_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_zoomcontrolPosition">Google Zoom Control Position: </label>
</td>
<td>
<select name="gmap_iconizer_zoomcontrolPosition" id="">
<?php if($gmap_iconizer_zoomcontrolPosition!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_zoomcontrolPosition;
    echo '">';
    echo 'Selected Position: ';
    echo $gmap_iconizer_zoomcontrolPosition;
    echo '</option>';
    } else {
    echo '<option selected="selected" value="RIGHT_TOP" >Selected Option: RIGHT_TOP</option>';
} ?>
<option value="TOP_CENTER">TOP_CENTER</option>
<option value="TOP_LEFT">TOP_LEFT</option>
<option value="TOP_RIGHT">TOP_RIGHT</option>
<option value="LEFT_TOP">LEFT_TOP</option>
<option value="RIGHT_TOP">RIGHT_TOP</option>
<option value="LEFT_CENTER">LEFT_CENTER</option>
<option value="RIGHT_CENTER">RIGHT_CENTER</option>
<option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
<option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
<option value="BOTTOM_CENTER">BOTTOM_CENTER</option>
<option value="BOTTOM_LEFT">BOTTOM_LEFT</option>
<option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option>
</select>
</td><td>
<?php add_thickbox(); ?>
<div id="maptypeposition_thickbox" style="display:none;height: 800px;">
<p>
You can examine control positions below image
</p>
<img id="maptypeposition" width="550" height="480" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/control-positions.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=780&height=550&inlineId=maptypeposition_thickbox" class="thickbox"><img id="maptypeposition" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_zoom_level">Google Map Zoom Level:</label>
</td>
<td>
<select name="gmap_iconizer_zoom_level" id="">
<?php if($gmap_iconizer_zoom_level!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_zoom_level;
    echo '">';
    echo 'Selected Level: ';
    echo $gmap_iconizer_zoom_level;
    echo '</option>'; } else {
echo '<option selected="selected" value="16" >Selected Level: Level 16</option>';} ?>
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
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_latitude">Google Map Latitude: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_latitude" value="<?php echo $gmap_iconizer_latitude; ?>" class="all-options" />
</td>
<td><a class="button-primary" href="<?php
$url = admin_url( 'admin.php?page=wp-samurai-geolocation-finder', 'http' );
echo $url;
?>" title="<?php _e( 'Coordinate Locator' ); ?>"><?php _e( 'Coordinate Finder' ); ?></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_longitude">Google Map Longitude: </label>
</td>
<td>
<input type="text" name="gmap_iconizer_longitude" value="<?php echo $gmap_iconizer_longitude; ?>" class="all-options" />
</td>
</tr>
<tr>
<td><label class="griditem2"> Google Map Type:</label></td>

<td>
<select class="griditem1" id="" name="gmap_iconizer_type" >

<?php
if($gmap_iconizer_type!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_type;
    echo '">';
    echo 'Selected Map Type: ';
    echo ucfirst($gmap_iconizer_type);
    echo '</option>';
	echo '<option value="ROADMAP">Map Type : ROADMAP </option>';
    } else {
    echo '<option value="ROADMAP" selected>Map Type : ROADMAP </option>';
}
?>

<option value="SATELLITE">Map Type : SATELLITE </option>
<option value="HYBRID">Map Type : HYBRID </option>
<option value="TERRAIN">Map Type : TERRAIN </option>
</select>
</td>
</tr>


<tr>
<td><label for="gmap_iconizer_maptype">Google Map MapType Control: </label>
</td>
<td>
<select name="gmap_iconizer_maptype" id="">
<?php
if($gmap_iconizer_maptype!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_maptype;
    echo '">';
    echo 'Selected Option: ';
    echo ucfirst($gmap_iconizer_maptype);
    echo '</option>';
    } else {
    echo '<option selected="selected" value="true" >Selected Option: True</option>';
}
?>
<option value="true">Map Type Control True</option>
<option value="false">Map Type Control False</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="maptype_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-map-type.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=maptype_thickbox" class="thickbox"><img id="maptype_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<td><label for="gmap_iconizer_maptypecontrol_style">Google Map MapType Control Style: </label>
</td>
<td>
<select name="gmap_iconizer_maptypecontrol_style" id="">
<?php
if($gmap_iconizer_maptypecontrol_style!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_maptypecontrol_style;
    echo '">';
    echo 'Selected Style: ';
    echo ucfirst(strtolower($gmap_iconizer_maptypecontrol_style));
    echo '</option>';
    } else {
    echo '<option selected="selected" value="DEFAULT">Select Style Default</option>';
}
?>
<option value="HORIZONTAL_BAR">Horizontal Bar</option>
<option value="DROPDOWN_MENU ">Dropdown Menu</option>
<option value="DEFAULT ">Default</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="maptype_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-map-type.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=maptype_thickbox" class="thickbox"><img id="maptype_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_maptype_position">Google Map MapType Control Position: </label>
</td>
<td>
<select name="gmap_iconizer_maptype_position" id="">
<?php
if($gmap_iconizer_maptype_position!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_maptype_position;
    echo '">';
    echo 'Selected Position: ';
    echo $gmap_iconizer_maptype_position;
    echo '</option>';
    } else {
    echo '<option selected="selected" value="TOP_RIGHT" >Selected Option: TOP_RIGHT</option>';
}
?>
<option value="TOP_CENTER">TOP_CENTER</option>
<option value="TOP_LEFT">TOP_LEFT</option>
<option value="TOP_RIGHT">TOP_RIGHT</option>
<option value="LEFT_TOP">LEFT_TOP</option>
<option value="RIGHT_TOP">RIGHT_TOP</option>
<option value="LEFT_CENTER">LEFT_CENTER</option>
<option value="RIGHT_CENTER">RIGHT_CENTER</option>
<option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
<option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
<option value="BOTTOM_CENTER">BOTTOM_CENTER</option>
<option value="BOTTOM_LEFT">BOTTOM_LEFT</option>
<option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option>
</select>
</td><td>
<?php add_thickbox(); ?>
<div id="maptypeposition_thickbox" style="display:none;height: 800px;">
<p>
You can examine control positions below image
</p>
<img id="maptypeposition" width="550" height="480" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/control-positions.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=780&height=550&inlineId=maptypeposition_thickbox" class="thickbox"><img id="maptypeposition" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_pancontrol">Google Map Pan Control: </label>
</td>
<td>
<select name="gmap_iconizer_pancontrol" id="">
<?php
if($gmap_iconizer_pancontrol!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_pancontrol;
    echo '">';
    echo 'Selected Option: ';
    echo ucfirst($gmap_iconizer_pancontrol);
    echo '</option>';
    } else {
    echo '<option selected="selected" value="false" >Selected Option:False</option>';
}
?>
<option value="true">Map Pan Control True</option>
<option value="false">Map Pan Control False</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="pantype_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="pantype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-pan-control.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=pantype_thickbox" class="thickbox"><img id="pantypecontrol" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_pan_position">Google Map Pan Control Position: </label>
</td>
<td>
<select name="gmap_iconizer_pan_position" id="">
<?php
if($gmap_iconizer_pan_position!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_pan_position;
    echo '">';
    echo 'Selected Position: ';
    echo $gmap_iconizer_pan_position;
    echo '</option>';
    } else {
    echo '<option selected="selected" value="TOP_RIGHT" >Selected Option: TOP_RIGHT</option>';
}
?>
<option value="TOP_CENTER">TOP_CENTER</option>
<option value="TOP_LEFT">TOP_LEFT</option>
<option value="TOP_RIGHT">TOP_RIGHT</option>
<option value="LEFT_TOP">LEFT_TOP</option>
<option value="RIGHT_TOP">RIGHT_TOP</option>
<option value="LEFT_CENTER">LEFT_CENTER</option>
<option value="RIGHT_CENTER">RIGHT_CENTER</option>
<option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
<option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
<option value="BOTTOM_CENTER">BOTTOM_CENTER</option>
<option value="BOTTOM_LEFT">BOTTOM_LEFT</option>
<option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option>
</select>
</td><td>
<?php add_thickbox(); ?>
<div id="panposition_thickbox" style="display:none;height: 800px;">
<p>
You can examine control positions below image
</p>
<img id="panposition" width="550" height="480" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/control-positions.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=780&height=550&inlineId=panposition_thickbox" class="thickbox"><img id="panposition_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_streetviewcontrol">Google Map Street View Control: </label>
</td>
<td>
<select name="gmap_iconizer_streetviewcontrol" id="">
<?php
if($gmap_iconizer_streetviewcontrol!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_streetviewcontrol;
    echo '">';
    echo 'Selected Option: ';
    echo ucfirst($gmap_iconizer_streetviewcontrol);
    echo '</option>';
    } else {
    echo '<option selected="selected" value="false" >Selected Option:False</option>';
}
?>
<option value="true">Map Street View Control True</option>
<option value="false">Map Street View Control False</option>
</select>
</td>
<td>
<?php add_thickbox(); ?>
<div id="streetview_thickbox" style="display:none;">
<p>
You can examine control below image
</p>
<img id="maptype_div" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/map-control-walk.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=800&height=400&inlineId=streetview_thickbox" class="thickbox"><img id="streetview_image" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td><label for="gmap_iconizer_streetviewcontrol_position">Google Map StreetView Control Position: </label>
</td>
<td>
<select name="gmap_iconizer_streetviewcontrol_position" id="">
<?php
if($gmap_iconizer_streetviewcontrol_position!="") {
    echo '<option selected="selected" value="';
    echo $gmap_iconizer_streetviewcontrol_position;
    echo '">';
    echo 'Selected Position: ';
    echo $gmap_iconizer_streetviewcontrol_position;
    echo '</option>';
    } else {
    echo '<option selected="selected" value="LEFT_TOP" >Selected Option: LEFT_TOP</option>';
}
?>
<option value="TOP_CENTER">TOP_CENTER</option>
<option value="TOP_LEFT">TOP_LEFT</option>
<option value="TOP_RIGHT">TOP_RIGHT</option>
<option value="LEFT_TOP">LEFT_TOP</option>
<option value="RIGHT_TOP">RIGHT_TOP</option>
<option value="LEFT_CENTER">LEFT_CENTER</option>
<option value="RIGHT_CENTER">RIGHT_CENTER</option>
<option value="LEFT_BOTTOM">LEFT_BOTTOM</option>
<option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option>
<option value="BOTTOM_CENTER">BOTTOM_CENTER</option>
<option value="BOTTOM_LEFT">BOTTOM_LEFT</option>
<option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option>
</select>
</td><td>
<?php add_thickbox(); ?>
<div id="maptypeposition_thickbox" style="display:none;height: 800px;">
<p>
You can examine control positions below image
</p>
<img id="maptypeposition" width="550" height="480" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/control-positions.png'  ?>" alt="" />
</div>
<a href="#TB_inline?width=780&height=550&inlineId=maptypeposition_thickbox" class="thickbox"><img id="maptypeposition" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/question.png'  ?>" alt="" /></a>
</td>
</tr>
<tr>
<td></td>
<td>
<input class="button-primary" type="submit" name="save" value="<?php _e( 'Save GoogleMap Settings' ); ?>" />
</td>
</tr>
</table>
</form>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->
</div> <!-- post-body-content -->
<!-- sidebar -->
<div id="postbox-container-1" class="postbox-container">
<div class="meta-box-sortables">
<div class="postbox">
<h3><span>Advanced Settings Tutorials</span></h3>
<div class="inside makecenter">
<?php $total_row = count( $options_main_advanced['oneclick_google_map_advanced_tutorials'],1);
for ($i = 0; $i <= $total_row-1; $i++):?>
<a href="<?php $step1=$options_main_advanced['oneclick_google_map_advanced_tutorials'][$i]->excerpt; $step2=substr($step1, 3); echo substr($step2, 0, -5); ?>" target="_blank"> <img src="<?php echo $options_main_advanced['oneclick_google_map_advanced_tutorials'][$i]->featured_image->source; ?>" width=248 height=138 class="img support" ></a>
<?php endfor; ?>
</br>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables -->
</div> <!-- #postbox-container-1 .postbox-container -->
</div> <!-- #post-body .metabox-holder .columns-2 -->
<br class="clear">
</div> <!-- #poststuff -->
</div> <!-- .wrap -->
</div>
<div id="video_tutorials_div">
<div class="wrap wrapcustom">
<h2>Plugin Video Tutorials</h2>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<!-- main content -->
<div id="post-body-content">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<h3><span>Plugin Installation Video Tutorials</span></h3>
<div class="inside paddingbottom30px">
<?php
$total_row = count( $options_main_installation['oneclick_google_map_installation_tutorials'],1);
for ($i = 0; $i <= $total_row-1; $i++):
?>
<a href="<?php $step1=$options_main_installation['oneclick_google_map_installation_tutorials'][$i]->excerpt; $step2=substr($step1, 3); echo substr($step2, 0, -5); ?>" target="_blank"> <img src="<?php echo $options_main_installation['oneclick_google_map_installation_tutorials'][$i]->featured_image->source; ?>" width=248 height=138 class="img support" ></a>
<?php endfor; ?>
</div> <!-- .inside -->
</div> <!-- .postbox -->
<div class="postbox">
<h3><span>Frontend Video Tutorials</span></h3>
<div class="inside paddingbottom30px">
<?php
$total_row = count( $options_main_frontend['oneclick_google_map_frontend_tutorials'],1);
for ($i = 0; $i <= $total_row-1; $i++):
?>
<a href="<?php $step1=$options_main_frontend['oneclick_google_map_frontend_tutorials'][$i]->excerpt;  $step2=substr($step1, 3); echo substr($step2, 0, -5);?>" target="_blank"> <img src="<?php echo $options_main_frontend['oneclick_google_map_frontend_tutorials'][$i]->featured_image->source; ?>" width=248 height=138 class="img support" ></a>
<?php endfor; ?>
</div> <!-- .inside -->
</div> <!-- .postbox -->
<div class="postbox">
<h3><span>Advanced Video Tutorials</span></h3>
<div class="inside paddingbottom30px">
<?php
$total_row = count( $options_main_advanced['oneclick_google_map_advanced_tutorials'],1);
for ($i = 0; $i <= $total_row-1; $i++):
?>
<a href="<?php $step1=$options_main_advanced['oneclick_google_map_advanced_tutorials'][$i]->excerpt; $step2=substr($step1, 3); echo substr($step2, 0, -5); ?>" target="_blank"> <img src="<?php echo $options_main_advanced['oneclick_google_map_advanced_tutorials'][$i]->featured_image->source; ?>" width=248 height=138 class="img support" ></a>
<?php endfor; ?>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->
</div> <!-- post-body-content -->
<!-- sidebar -->
<div id="postbox-container-1" class="postbox-container">
<div class="meta-box-sortables">



<div class="postbox">
<h3><span>Online Documentation</span></h3>
<div class="inside paddingbottom30px">
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#installation" target="_blank"> 1- Plugin Installation </a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#firstsettings" target="_blank"> 2- First Step Settings</a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#iconizer" target="_blank"> 3- Iconizer & Map Color & Saturation </a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#predefinedmap" target="_blank"> 4- Fixed Map in WordPress Content </a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#custommap" target="_blank"> 5- Custom Map in WordPress Content</a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#widgetmap" target="_blank"> 6- Fixed Map in WordPress Widget </a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#thememap" target="_blank"> 7- Fixed & Custom Map in WordPress Theme </a></p>
<p><a href="http://wp-samurai.com/documentation/oneclick-google-map/#Googleapi" target="_blank"> 8 - Get Google Api Code </a></p>
</div> <!-- .inside -->
</div> <!-- .postbox -->

<div class="postbox">
<h3><span>Plugin Usage Clues</span></h3>
<div class="inside">
Short Code for Predefined Google Map in Theme
</br>
<p class="fontbold">
<?php
$codeblock ='<?php echo do_shortcode("[oneclick-easy-gmap]"); ?>';
echo htmlentities($codeblock); ?>
</p>
</br>
Short Code for Custom Location Google Map in Theme
<p class="fontbold">
<?php
$codeblock ='<?php echo do_shortcode(""); ?>';
echo htmlentities($codeblock); ?>
</p>
<p> Copy & Paste Above Code to show your Google Map in Theme</p>
</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables -->
</div> <!-- #postbox-container-1 .postbox-container -->
</div> <!-- #post-body .metabox-holder .columns-2 -->
<br class="clear">
</div> <!-- #poststuff -->
</div> <!-- .wrap -->
</div>
</div>
</div>
<div id="div_footer_logo" align="right">
<a href="http://www.wp-samurai.com/oneclick-google-map-call-support" target="_blank"> <img src="<?php echo plugins_url( 'images/wp-samurai-logo-mini.png', __FILE__ ); ?>" width=155 height=29 class="img" ></a>
</div>
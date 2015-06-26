<script type="text/javascript">
function initialize() {
    var <?php echo $map_id; ?>_Options = {
        mapTypeId: google.maps.MapTypeId.<?php echo $gmap_iconizer_basic_map_type; ?>,
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
        position: google.maps.ControlPosition.<?php echo $gmap_iconizer_streetviewcontrol_position; ?>}
    }
    var map = new google.maps.Map(document.getElementById('<?php echo $map_id; ?>'),
    <?php echo $map_id; ?>_Options);
    var styles = [ {
        featureType: "all",
        stylers: [
        { hue: " <?php if($gmap_iconizer_maphue!='#ffffff')
            { echo $gmap_iconizer_maphue;}
            else {
                echo '0';
        } ?>" },
        { saturation: <?php if($gmap_iconizer_saturation!= '')
            { echo $gmap_iconizer_saturation;}
            else
            { echo '0';}
        ?> }
        ]
    }
    ];
    map.setOptions({styles: styles});
    var image = '<?php echo $gmap_iconizer_upload_icon;?>';
    var myLatLng = new google.maps.LatLng(<?php echo $gmap_iconizer_latitude; ?>,<?php echo $gmap_iconizer_longitude; ?>);
    var <?php echo $map_id; ?>_div = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        divid: ""
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="<?php echo $map_id; ?>_container" style="<?php echo $gmap_iconizer_containerstyle; ?>width:auto;height:auto;">
<div id="<?php echo $map_id; ?>"  style="<?php echo $gmap_iconizer_mapstyle; ?>width:<?php echo $gmap_iconizer_mapwidth?>;height:<?php echo $gmap_iconizer_mapheight; ?>;<?php echo $gmap_iconizer_mapstyle; ?>">
</div>
</div>
<style>
.gm-style img { max-width: none; }
.gm-style-cc { height:20px; }
.gmnoscreen {position:relative;}
</style>
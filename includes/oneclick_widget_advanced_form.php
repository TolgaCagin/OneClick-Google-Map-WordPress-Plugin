<fieldset class="gllpLatlonPicker"></br><label class="griditem2"> Map Zoom Level:</label><select class="gllpZoom griditem1" id="<?php echo $this->get_field_id( 'zoomlevel' ); ?>" name="<?php echo $this->get_field_name( 'zoomlevel' ); ?>" value="<?php echo esc_attr( $zoomlevel ); ?>" ><?php if($zoomlevel!=''){?>    <option value="<?php echo esc_attr( $zoomlevel ); ?>" selected>Selected Map Zoom Level<?php echo esc_attr( $zoomlevel ); ?></option>    <option value="19">Map Zoom Level 19</option>    <option value="18">Map Zoom Level 18</option>    <option value="17">Map Zoom Level 17</option>    <option value="16">Map Zoom Level 16 - Best for City</option>    <?php } else { ?>    <option value="19">Map Zoom Level 19</option>    <option value="18">Map Zoom Level 18</option>    <option value="17">Map Zoom Level 17</option>    <option value="16" selected>Map Zoom Level 16 - Best for City</option><?php } ?><option value="15">Map Zoom Level 15</option><option value="14">Map Zoom Level 14</option><option value="13">Map Zoom Level 13</option><option value="12">Map Zoom Level 12</option><option value="11">Map Zoom Level 11</option><option value="10">Map Zoom Level 10</option><option value="9">Map Zoom Level 9</option><option value="8">Map Zoom Level 8</option><option value="7">Map Zoom Level 7</option><option value="6">Map Zoom Level 6</option><option value="5">Map Zoom Level 5</option><option value="4">Map Zoom Level 4</option><option value="3">Map Zoom Level 3</option><option value="2">Map Zoom Level 2</option><option value="1">Map Zoom Level 1</option><option value="0">Map Zoom Level 0</option></select><label class="griditem2"> Google Map Type:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'maptype' ); ?>" name="<?php echo $this->get_field_name( 'maptype' ); ?>" ><?php if($maptype!=''){?>    <option value="<?php echo esc_attr( $maptype ); ?>" selected>Selected Map Type :<?php echo esc_attr( $maptype ); ?></option>    <option value="ROADMAP" >Map Type : ROADMAP </option>    <?php } else { ?>    <option value="ROADMAP" selected>Map Type : ROADMAP </option><?php } ?><option value="SATELLITE">Map Type : SATELLITE </option><option value="HYBRID">Map Type : HYBRID </option><option value="TERRAIN">Map Type : TERRAIN </option></select><p><label class="griditem2"> Map Width:</label><input class="gllpheight griditem1" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo esc_attr( $width ); ?>" type="text" placeholder="Enter Map Width"></br><label class="griditem2"> Map Height:</label><input type="text" class="gllpheight griditem1" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo esc_attr( $height ); ?>" placeholder="Enter Map Height" /></br><label class="griditem2"> Map Color:</label><input type="text" class="gllpwidth griditem1 colorpicker" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo esc_attr( $color ); ?>" placeholder="Enter Map Color" /></br><label class="griditem2"> Map Saturation Level:</label><input type="text" class="gllpwidth griditem1" id="<?php echo $this->get_field_id( 'saturation' ); ?>" name="<?php echo $this->get_field_name( 'saturation' ); ?>" value="<?php echo esc_attr( $saturation ); ?>" placeholder="Enter Map Saturation Level" /></p><p><label class="griditem2"> Map Zoom Control:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'zoomcontrol' ); ?>" name="<?php echo $this->get_field_name( 'zoomcontrol' ); ?>"  ><?php if($zoomcontrol!=''){?>    <option value="<?php echo esc_attr( $zoomcontrol ); ?>" selected>Map Zoom Control :<?php echo esc_attr( ucfirst($zoomcontrol) ); ?></option>    <option value="true" >Map Zoom Control True</option>    <?php } else { ?>    <option value="true" selected>Map Zoom Control True</option><?php } ?><option value="false">Map Zoom Control False</option></select></br><label class="griditem2"> Map Zoom Control Size:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'zoomcontrolsize' ); ?>" name="<?php echo $this->get_field_name( 'zoomcontrolsize' ); ?>" ><?php if($zoomcontrolsize!=''){?>    <option value="<?php echo esc_attr( $zoomcontrolsize ); ?>" selected>Zoom Control Size :<?php echo esc_attr( $zoomcontrolsize ); ?></option>    <option value="LARGE">Zoom Control Large</option>    <option value="SMALL">Zoom Control Small</option>    <?php } else { ?>    <option value="LARGE">Zoom Control Large</option>    <option value="SMALL" selected>Zoom Control Small</option><?php } ?><option value="DEFAULT">Zoom Control Default</option></select></br><label class="griditem2">Zoom Control Position:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'zoomcontrolposition' ); ?>" name="<?php echo $this->get_field_name( 'zoomcontrolposition' ); ?>"><?php if($zoomcontrolposition!=''){?>    <option value="<?php echo esc_attr( $zoomcontrolposition ); ?>" selected>Position:<?php echo esc_attr( $zoomcontrolposition ); ?></option>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT" >TOP_LEFT</option>    <option value="TOP_RIGHT">TOP_RIGHT</option>    <option value="LEFT_TOP">LEFT_TOP</option>    <option value="RIGHT_TOP">RIGHT_TOP</option>    <?php } else { ?>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT" >TOP_LEFT</option>    <option value="TOP_RIGHT">TOP_RIGHT</option>    <option value="LEFT_TOP">LEFT_TOP</option>    <option value="RIGHT_TOP" selected>RIGHT_TOP</option><?php } ?><option value="LEFT_CENTER">LEFT_CENTER</option><option value="RIGHT_CENTER">RIGHT_CENTER</option><option value="LEFT_BOTTOM">LEFT_BOTTOM</option><option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option><option value="BOTTOM_CENTER">BOTTOM_CENTER</option><option value="BOTTOM_LEFT">BOTTOM_LEFT</option><option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option></select></p><p><label class="griditem2">Map Type Control:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'maptypecontrol' ); ?>" name="<?php echo $this->get_field_name( 'maptypecontrol' ); ?>"><?php if($maptypecontrol!=''){?>    <option value="<?php echo esc_attr( $maptypecontrol ); ?>" selected>Map Type Control :<?php echo esc_attr( ucfirst($maptypecontrol) ); ?></option>    <option value="true" >Map Type Control True</option>    <?php } else { ?>    <option value="true" selected>Map Type Control True</option><?php } ?><option value="false">Map Type Control False</option></select></br><label class="griditem2">Default Control Type:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'maptypecontroldefault' ); ?>" name="<?php echo $this->get_field_name( 'maptypecontroldefault' ); ?>"><?php if($maptypecontroldefault!=''){?>    <option value="<?php echo esc_attr( $maptypecontroldefault ); ?>" selected>Type:<?php echo esc_attr( $maptypecontroldefault ); ?></option>    <option value="HORIZONTAL_BAR">Horizontal Bar</option>    <?php } else { ?>    <option value="HORIZONTAL_BAR" selected>Horizontal Bar</option><?php } ?><option value="DROPDOWN_MENU ">Dropdown Menu</option><option value="DEFAULT ">Default</option></select></br><label class="griditem2">Type Control Position:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'maptypecontrolposition' ); ?>" name="<?php echo $this->get_field_name( 'maptypecontrolposition' ); ?>"><?php if($maptypecontrolposition!=''){?>    <option value="<?php echo esc_attr( $maptypecontrolposition ); ?>" selected>Position:<?php echo esc_attr( $maptypecontrolposition ); ?></option>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT">TOP_LEFT</option>    <option value="TOP_RIGHT">TOP_RIGHT</option>    <?php } else { ?>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT">TOP_LEFT</option>    <option value="TOP_RIGHT" selected>TOP_RIGHT</option><?php } ?><option value="LEFT_TOP">LEFT_TOP</option><option value="RIGHT_TOP">RIGHT_TOP</option><option value="LEFT_CENTER">LEFT_CENTER</option><option value="RIGHT_CENTER">RIGHT_CENTER</option><option value="LEFT_BOTTOM">LEFT_BOTTOM</option><option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option><option value="BOTTOM_CENTER">BOTTOM_CENTER</option><option value="BOTTOM_LEFT">BOTTOM_LEFT</option><option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option></select></p><p><label class="griditem2">Map Pan Control:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'pancontrol' ); ?>" name="<?php echo $this->get_field_name( 'pancontrol' ); ?>"><?php if($pancontrol!=''){?>    <option value="<?php echo esc_attr( $pancontrol ); ?>" selected>Pan Control :<?php echo esc_attr( ucfirst($pancontrol) ); ?></option>    <option value="true" >Map Type Control True</option>    <option value="false">Map Pan Control False</option>    <?php } else { ?>    <option value="true" >Map Type Control True</option>    <option value="false">Map Pan Control False</option><?php } ?></select></br><label class="griditem2">Pan Control Position:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'pancontrolposition' ); ?>" name="<?php echo $this->get_field_name( 'pancontrolposition' ); ?>"><?php if($pancontrolposition!=''){?>    <option value="<?php echo esc_attr( $pancontrolposition ); ?>" selected>Position:<?php echo esc_attr( $pancontrolposition ); ?></option>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT">TOP_LEFT</option>    <option value="TOP_RIGHT">TOP_RIGHT</option>    <option value="LEFT_TOP">LEFT_TOP</option>    <?php } else { ?>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT" selected>TOP_LEFT</option>    <option value="TOP_RIGHT">TOP_RIGHT</option>    <option value="LEFT_TOP">LEFT_TOP</option><?php } ?><option value="RIGHT_TOP">RIGHT_TOP</option><option value="LEFT_CENTER">LEFT_CENTER</option><option value="RIGHT_CENTER">RIGHT_CENTER</option><option value="LEFT_BOTTOM">LEFT_BOTTOM</option><option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option><option value="BOTTOM_CENTER">BOTTOM_CENTER</option><option value="BOTTOM_LEFT">BOTTOM_LEFT</option><option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option></select></p></br><p><label class="griditem2"> Streetview Control:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'streetviewcontrol' ); ?>" name="<?php echo $this->get_field_name( 'streetviewcontrol' ); ?>"><?php if($streetviewcontrol!=''){?>    <option value="<?php echo esc_attr( $streetviewcontrol ); ?>" selected>Stretview Control:<?php echo esc_attr( ucfirst($streetviewcontrol) ); ?></option>    <option value="true">Street View Control True</option>    <?php } else { ?>    <option value="true" selected>Street View Control True</option><?php } ?><option value="false" >Street View Control False</option></select></br><label class="griditem2">Streetview Position:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'streetviewposition' ); ?>" name="<?php echo $this->get_field_name( 'streetviewposition' ); ?>"><?php if($streetviewposition!=''){?>    <option value="<?php echo esc_attr( $streetviewposition ); ?>" selected>Position:<?php echo esc_attr( $streetviewposition ); ?></option>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT">TOP_LEFT</option>    <?php } else { ?>    <option value="TOP_CENTER">TOP_CENTER</option>    <option value="TOP_LEFT" selected>TOP_LEFT</option><?php } ?><option value="TOP_RIGHT">TOP_RIGHT</option><option value="LEFT_TOP">LEFT_TOP</option><option value="RIGHT_TOP">RIGHT_TOP</option><option value="LEFT_CENTER">LEFT_CENTER</option><option value="RIGHT_CENTER">RIGHT_CENTER</option><option value="LEFT_BOTTOM">LEFT_BOTTOM</option><option value="RIGHT_BOTTOM">RIGHT_BOTTOM</option><option value="BOTTOM_CENTER">BOTTOM_CENTER</option><option value="BOTTOM_LEFT">BOTTOM_LEFT</option><option value="BOTTOM_RIGHT">BOTTOM_RIGHT</option></select></p><p><label class="griditem2">Google Map Icon:</label><select class="griditem1" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>"><?php if($icon!=''){?>    <option value="<?php echo esc_attr( $icon ); ?>" selected style="font-size:9px !important;"><?php echo esc_attr( $icon ); ?></option>    <option value="<?php echo $gmap_iconizer_upload_icon; ?>"><?php echo $gmap_iconizer_upload_icon; ?></option>    <?php } else { ?>    <option value="<?php echo $gmap_iconizer_upload_icon; ?>" selected><?php echo $gmap_iconizer_upload_icon; ?></option><?php } ?><?php$args = array( 'post_type' => 'attachment', 'posts_per_page'=>99, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_mime_type' => 'image' ,'post_status' => null, 'post_parent' => $post->ID );$attachments = get_posts($args);if ($attachments) {    foreach ( $attachments as $attachment ) { ?>        <option value="<?php echo $attachment->guid; ?>" style="font-size:6px;"><?php echo $attachment->post_name; ?></option>        </br><?php } } ?></select></p><p><textarea id="gllpstyle" rows="3" cols="42" id="<?php echo $this->get_field_id( 'containerstyle' ); ?>" name="<?php echo $this->get_field_name( 'containerstyle' ); ?>"  placeholder="Style Your Google Map Container"><?php echo esc_attr( $containerstyle ); ?></textarea><textarea id="gllpstyle" rows="3" cols="42" id="<?php echo $this->get_field_id( 'mapstyle' ); ?>" name="<?php echo $this->get_field_name( 'mapstyle' ); ?>"  placeholder="Style Your Google Map Div"><?php echo esc_attr( $mapstyle ); ?></textarea></p></br></fieldset><style>#TB_ajaxContent{    color:white;}.gllpZoom{    width:160px;}#aes-submit{    margin-top:5px;}.griditem1 {    width:230px;}.griditem2 {    width:155px;    display:block;    float:left;    line-height:28px;}option {    font-size:8px;}.wp-picker-container{    margin-top:5px;}</style><script type="text/javascript">jQuery(document).ready(function($){    $('.colorpicker').wpColorPicker();});</script>
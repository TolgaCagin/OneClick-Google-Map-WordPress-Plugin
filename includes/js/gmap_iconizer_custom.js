jQuery(document).ready(function($){
    if(jQuery.trim(jQuery("#frontend_tutorials").html())=='') {
        setInterval(function () {
            window.location.href = window.location.href;
        }, 5000);
    }
    else {
    }
    jQuery('a#openmodal').click(function() {
        $( "#custom_settings_div" ).show();
    });
    jQuery("input:radio[name='group1']").click(function() {
        $('#gmap_iconizer_apikey').text('');
        $('.desc').hide();
        $('#' + $("input:radio[name='group1']:checked").val()).show();
    });
    jQuery(document).ready(function($){
        $('.colorpicker').wpColorPicker();
    });
    $('#custom_settings').removeClass( "nav-tab" ).addClass( "nav-tab nav-tab-active" );
    $( "#google_settings_div" ).hide();
    $( "#coordinate_locator_div" ).hide();
    $( "#video_tutorials_div" ).hide();
    $( "#custom_settings" ).click(function() {
        $( "#custom_settings_div" ).show();
        $( "#google_settings_div" ).hide();
        $( "#coordinate_locator_div" ).hide();
        $( "#video_tutorials_div" ).hide();
        $('#custom_settings').removeClass( "nav-tab" ).addClass( "nav-tab nav-tab-active" );
        $('#google_settings').removeClass( "nav-tab-active" );
        $('#coordinate_locator').removeClass( "nav-tab-active" );
        $('#video_tutorials').removeClass( "nav-tab-active" );
    });
    $( "#google_settings" ).click(function() {
        $( "#custom_settings_div" ).hide();
        $( "#google_settings_div" ).show();
        $( "#coordinate_locator_div" ).hide();
        $( "#video_tutorials_div" ).hide();
        $('#google_settings').removeClass( "nav-tab" ).addClass( "nav-tab nav-tab-active" );
        $('#custom_settings').removeClass( "nav-tab-active" );
        $('#coordinate_locator').removeClass( "nav-tab-active" );
        $('#video_tutorials').removeClass( "nav-tab-active" );
    });
    $( "#coordinate_locator" ).click(function() {
        $( "#custom_settings_div" ).hide();
        $( "#google_settings_div" ).hide();
        $( "#coordinate_locator_div" ).hide();
        $( "#coordinate_locator_div" ).show();
        $('#coordinate_locator').removeClass( "nav-tab" ).addClass( "nav-tab nav-tab-active" );
        $('#custom_settings').removeClass( "nav-tab-active" );
        $('#google_settings').removeClass( "nav-tab-active" );
        $('#video_tutorials').removeClass( "nav-tab-active" );
    });
    $( "#video_tutorials" ).click(function() {
        $( "#custom_settings_div" ).hide();
        $( "#google_settings_div" ).hide();
        $( "#coordinate_locator_div" ).hide();
        $( "#video_tutorials_div" ).show();
        $('#video_tutorials').removeClass( "nav-tab" ).addClass( "nav-tab nav-tab-active" );
        $('#custom_settings').removeClass( "nav-tab-active" );
        $('#coordinate_locator').removeClass( "nav-tab-active" );
        $('#google_settings').removeClass( "nav-tab-active" );
    });
});
//tb_show('', 'media-upload.php?TB_iframe=true');
var upload_icon=false;
jQuery(document).ready(function() {
    jQuery('#upload_button').click(function() {
        jQuery( "#googlemap" ).hide();
        upload_icon =true;
        formfieldID=jQuery(this).prev().attr("id");
        formfield = jQuery("#"+formfieldID).attr('name');
        tb_show('', 'media-upload.php?type=image&post_id=1&TB_iframe=true&flash=0&backdrop=true&height=200');
        if(upload_icon==true){
            var oldFunc = window.send_to_editor;
            window.send_to_editor = function(html) {
                imgurl = jQuery('img', html).attr('src');
                jQuery("#"+formfieldID).val(imgurl);
                tb_remove();
                jQuery( "#googlemap" ).show();
                window.send_to_editor = oldFunc;
            }
        }
        jQuery('#TB_closeWindowButton').click(function() {
            jQuery( "#googlemap" ).show();
        });
        upload_icon=false;
    });
    jQuery('#TB_closeWindowButton').click(function() {
        jQuery( "#harita" ).show();
    });
})
(function() {
     /* Register the buttons */
     tinymce.create('tinymce.plugins.MyButtons', {
          init : function(ed, url) {
               /**
               * Inserts shortcode content
               */
			     ed.addButton( 'btn_standart', {
                    title : 'Publish Your Predefined Map',
                    image : '/wp-content/plugins/oneclick-google-map/includes/images/wp-samurai-logo-tinymce-image.gif',
                    cmd: 'btn_standart_cmd'
               });
               ed.addCommand( 'btn_standart_cmd', function() {
                   
                    var shortcode = '[oneclick-easy-gmap]';
                    ed.execCommand('mceInsertContent', false, shortcode);
               });
            
               /**
               * Adds HTML tag to selected content
               */
                   ed.addButton( 'btn_multi', {
                    title : 'Publish Custom Location Map',
                    image : '/wp-content/plugins/oneclick-google-map/includes/images/wp-samurai-logo-tinymce-image2.gif',
                    onclick : function() {
                          tb_show('Get Custom Google Content Enabled MAP', 'admin-ajax.php?action=get_location&height=590&width=600');
                    }
               });
			   
			        ed.addButton( 'btn_icon', {
                    title : 'Include Custom Icon',
                    image : '/wp-content/plugins/oneclick-google-map/includes/images/wp-samurai-logo-tinymce-image3.gif',
                    onclick : function() {
                          tb_show('Include Custom Icon/Logos for Content Google Map', 'media-upload.php?type=image&post_id=1&TB_iframe=true&flash=0&backdrop=true&height=200');
                      window.send_to_editor = function(html) {
        url = jQuery(html).attr('href');
		var shortcodeblockstart = "icon='";
		var shortcode_end = "' ";
		var imageurl= shortcodeblockstart+url+shortcode_end;
  
                    ed.execCommand('mceInsertContent', false,  imageurl);
        tb_remove();
    };
    return false;
					
					}
               });
			   
          },
          createControl : function(n, cm) {
               return  0;
          },
     });
     /* Start the buttons */
     tinymce.PluginManager.add( 'wp_samurai_register_tinymce_buttons', tinymce.plugins.MyButtons );
})();
           function initialize() {
                var mapOptions = {
                    zoom: 14,
                    center: new google.maps.LatLng(<?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['coordinate1']; ?>,<?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['coordinate2']; ?>),
                    mapTypeControl: <?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['mapTypeControl']; ?>,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                        position: google.maps.ControlPosition.TOP_RIGHT
                    },
                    panControl: <?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['panControl']; ?>,
                    panControlOptions: {

                        position: google.maps.ControlPosition.RIGHT_TOP
                    },
                    zoomControl: <?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['zoomControl']; ?>,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL,
                        position: google.maps.ControlPosition.RIGHT_TOP
                    },
                    scaleControl: false,
                    streetViewControl: <?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['streetViewControl']; ?>,
                    streetViewControlOptions: {
                        position: google.maps.ControlPosition.LEFT_TOP
                    }
                }

                var map = new google.maps.Map(document.getElementById('harita'),
                    mapOptions);

                var image = '<?php bloginfo('stylesheet_directory'); ?>/images/justice.png';

                var myLatLng = new google.maps.LatLng(<?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['coordinate1']; ?>,<?php $ayarlarim = get_option( 'site_ayar' );   echo $ayarlarim['coordinate2']; ?>);


                var hotel = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    icon: image,
                    divid: "hotel"
                });

            }
            google.maps.event.addDomListener(window, 'load', initialize);
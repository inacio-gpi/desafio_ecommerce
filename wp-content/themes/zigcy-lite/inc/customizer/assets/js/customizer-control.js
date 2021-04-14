(function() {
    wp.customize.bind( 'ready', function() {

        wp.customize( 'zigcy_lite_slider_type', function( setting ) {
            wp.customize.control( 'zigcy_lite_slider_category', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_slider_excerpts', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });


            wp.customize.control( 'zigcy_lite_area_one_image', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_one_title', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_one_subtitle', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_one_price_title', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_one_price_title_link', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_two_image', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_two_title', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_two_subtitle', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_two_button_text', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'zigcy_lite_area_two_button_link', function( control ) {
                var visibility = function() {
                    if ( 'cat' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

        });

        //smart slider
        wp.customize( 'zigcy_lite_slider_type', function( setting ) {
            wp.customize.control( 'zigcy_lite_smart_slider', function( control ) {
                var visibility = function() {
                    if ( 'ss3' === setting.get() ) {
                        control.container.removeClass( 'zigcy-lite-control-hide' );
                    } else {
                        control.container.addClass( 'zigcy-lite-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });
        });


    });
})( jQuery );
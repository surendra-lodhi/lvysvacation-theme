<?php
    // Exit if accessed directly
    if ( !defined( 'ABSPATH' ) ) exit;

    /**
    * Escape Tags & Slashes
    *
    * Handles escapping the slashes and tags
    */
    function lvysvacationrentals_escape_attr($data) {
        return !empty( $data ) ? esc_attr( stripslashes( $data ) ) : '';
    }

    /**
    * Strip Slashes From Array
    */
    function lvysvacationrentals_escape_slashes_deep($data = array(),$flag=true) {

        if($flag != true) {
             $data = lvysvacationrentals_nohtml_kses($data);
        }
        $data = stripslashes_deep($data);
        return $data;
    }

    /**
    * Strip Html Tags 
    * 
    * It will sanitize text input (strip html tags, and escape characters)
    */
    function lvysvacationrentals_nohtml_kses($data = array()) {

        if ( is_array($data) ) {
            $data = array_map(array($this,'lvysvacationrentals_nohtml_kses'), $data);
        } elseif ( is_string( $data ) ) {
            $data = wp_filter_nohtml_kses($data);
        }
       return $data;
    }

    /**
     * Display Short Content By Character
     */
    function lvysvacationrentals_excerpt_char( $content, $length = 40 ) {

        $text = '';
        if( !empty( $content ) ) {
            $text = strip_shortcodes( $content );
            $text = str_replace(']]>', ']]&gt;', $text);
            $text = strip_tags($text);
            $excerpt_more = apply_filters('excerpt_more', ' ' . ' ...');
            $text = substr($text, 0, $length);
            $text = $text . $excerpt_more;
        }
        return $text;
    }

    /**
     * search in posts and pages
     */
    function lvysvacationrentals_filter_search( $query ) {
        if( !is_admin() && $query->is_search ) {
            $query->set( 'post_type', array( LVYSVACATIONRENTALS_POST_POST_TYPE, LVYSVACATIONRENTALS_PAGE_POST_TYPE ) );
        }
        return $query;
    }
    add_filter( 'pre_get_posts', 'lvysvacationrentals_filter_search' );


    /*
     * Remove wp logo from admin bar
     */
    function lvysvacationrentals_remove_wp_logo() {
        global $wp_admin_bar;

        if( class_exists('acf') ) {
            $wp_help  = get_field( 'lvysvacationrentals_options_wp_help', 'option' );
            if( empty( $wp_help ) ) {
                $wp_admin_bar->remove_menu('wp-logo');
            }
        }
    }
    add_action( 'wp_before_admin_bar_render', 'lvysvacationrentals_remove_wp_logo' );
    
    /*
     * Custom login logo
     */
    function lvysvacationrentals_custom_login_logo() {
        if( class_exists('acf') ) {
            $wp_login_logo      = get_field( 'lvysvacationrentals_options_login_logo', 'option' );
            $wp_login_w         = get_field( 'lvysvacationrentals_options_login_logo_w', 'option' );
            $wp_login_h         = get_field( 'lvysvacationrentals_options_login_logo_h', 'option' );
            $wp_login_bg        = get_field( 'lvysvacationrentals_options_login_bg', 'option' );
            $wp_login_btn_c     = get_field( 'lvysvacationrentals_options_login_btn_color', 'option' );
            $wp_login_btn_c_h   = get_field( 'lvysvacationrentals_options_login_btn_color_h', 'option' );
            if( !empty( $wp_login_logo ) ) {
    ?>
            <style type="text/css">
                .login h1 a {
                    background-image: url('<?php echo $wp_login_logo; ?>') !important;
                    background-size: <?php echo $wp_login_w.'px'; ?> auto !important;
                    height: <?php echo $wp_login_h.'px'; ?> !important;
                    width: <?php echo $wp_login_w.'px'; ?> !important;
                }
            </style>
    <?php
            }
            if( !empty( $wp_login_bg ) ){
    ?>
            <style type="text/css">
                body.login{ background: #133759 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
                body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
                body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
            </style>
    <?php
            }
        }
    }
    add_action( 'login_enqueue_scripts', 'lvysvacationrentals_custom_login_logo' );
    
    /*
     * Change custom login page url
     */
    function lvysvacationrentals_loginpage_custom_link() {
        $site_url = esc_url( home_url( '/' ) );
        return $site_url;
    }
    add_filter( 'login_headerurl', 'lvysvacationrentals_loginpage_custom_link' );
    
    /*
     * Change title on logo
     */
    function lvysvacationrentals_change_title_on_logo() {
        $site_title = get_bloginfo( 'name' );
        return $site_title;
    }
    // add_filter( 'login_headertitle', 'lvysvacationrentals_change_title_on_logo' );
    
    /*
     * Change admin your favicon
     */
    function lvysvacationrentals_admin_favicon() {
        if( class_exists('acf') ) {
            $favicon_url        = get_field( 'lvysvacationrentals_options_wp_favicon', 'option' );
            if( !empty( $favicon_url ) ){
                echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
            }
        }
    }
    add_action('login_head', 'lvysvacationrentals_admin_favicon');
    add_action('admin_head', 'lvysvacationrentals_admin_favicon');

    /*
     * add filter to add shortcode in widget
     */
    add_filter( 'widget_text', 'do_shortcode' );
    function remove_hb_availability_calendar() {


        /*  Wrapper      */
        remove_action(
            'mphb_render_single_room_type_wrapper_start',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                '_renderPageWrapperStart',
            ),
            10
        );
        remove_action(
            'mphb_render_single_room_type_wrapper_end',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                '_renderPageWrapperEnd',
            ),
            10
        );


        /*  Content  */
        remove_action(
            'mphb_render_single_room_type_content',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                'renderTitle',
            ),
            10
        );
        remove_action(
            'mphb_render_single_room_type_content',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                'renderFeaturedImage',
            ),
            20
        );
        remove_action('mphb_render_single_room_type_content',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                'renderAttributes',
            ),
            50
        );
        remove_action('mphb_render_single_room_type_content',
            array(
                '\MPHB\Views\SingleRoomTypeView',
                'renderCalendar',
            ),
            60
        );
        

        /*  Calendar     */
        remove_action('mphb_render_single_room_type_before_calendar',array(
                '\MPHB\Views\SingleRoomTypeView',
                '_renderCalendarTitle',
            ),
            10);


        // /* */
        remove_action( 'mphb_sc_checkout_form', array( '\MPHB\Views\Shortcodes\CheckoutView', 'renderPriceBreakdown' ), 30 );
        remove_action( 'mphb_sc_checkout_form', array( '\MPHB\Views\Shortcodes\CheckoutView', 'renderCustomerDetails' ), 40, 3 );

        add_action( 'mphb_sc_checkout_form', 'lvys_startform_before', 5 );  
        add_action( 'mphb_sc_checkout_form', 'lvys_renderCustomerDetails_before', 36);
        add_action( 'mphb_sc_checkout_form', 'lvys_endform_before', 70);
        add_action( 'mphb_sc_checkout_form', 'lvys_renderCustomerDetails', 40, 3 );
        
    }
    add_action('init', 'remove_hb_availability_calendar');
    
    function lvys_startform_before($booking){
        echo '<div class="row boook-conform-step-wrap"><div class="col-md-5">
                <div class="your-details">';
    }  
    function echogeneratePriceBreakdown($booking){
        $priceBreakdown = $booking->getPriceBreakdown();
        return echogeneratePriceBreakdownArray( $priceBreakdown );
    }
    function echogeneratePriceBreakdownArray($priceBreakdown, $atts = array() ){
        $atts = array_merge(
            array(
                'title_expandable' => true,
                'coupon_removable' => true,
                'force_unfold'     => false,
            ),
            $atts
        );

        ob_start();

        if ( ! empty( $priceBreakdown ) ) :

            $hasServices = false !== array_search(
                true,
                array_map(
                    function( $roomBreakdown ) {
                        return isset( $roomBreakdown['services'] ) && ! empty( $roomBreakdown['services']['list'] );
                    },
                    $priceBreakdown['rooms']
                )
            );

            $useThreeColumns = $hasServices;

            $unfoldByDefault = MPHB()->settings()->main()->isPriceBreakdownUnfoldedByDefault();
            if ( $atts['force_unfold'] ) {
                $unfoldByDefault = true;
            } elseif ( is_admin() && ! MPHB()->isAjax() ) {
                $unfoldByDefault = false;
            }
            $foldedClass   = $unfoldByDefault ? '' : 'mphb-hide';
            $unfoldedClass = $unfoldByDefault ? 'mphb-hide' : '';
            ?>
            <table class="mphb-price-breakdown" cellspacing="0">
                <tbody>
                    <?php
                        $accommodationTaxesTotal = 0;
                        $serviceTaxesTotal       = 0;
                        $feeTaxesTotal           = 0;
                    foreach ( $priceBreakdown['rooms'] as $key => $roomBreakdown ) :
                        ?>
                        <?php

                        if ( isset( $roomBreakdown['room'] ) ) :
                            ?>
                            <!-- <tr class="mphb-price-breakdown-booking mphb-price-breakdown-group">
                                <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
                                    <?php
                                    $title = sprintf( _x( '#%d %s', 'Accommodation type in price breakdown table. Example: #1 Double Room', 'motopress-hotel-booking' ), $key + 1, $roomBreakdown['room']['type'] );

                                    if ( $atts['title_expandable'] ) {
                                        $title = '<a href="#" class="mphb-price-breakdown-accommodation mphb-price-breakdown-expand" title="' . __( 'Expand', 'motopress-hotel-booking' ) . '">'
                                            . '<span class="mphb-inner-icon ' . esc_attr( $unfoldedClass ) . '">&plus;</span>'
                                            . '<span class="mphb-inner-icon ' . esc_attr( $foldedClass ) . '">&minus;</span>'
                                            . $title
                                            . '</a>';
                                    }
                                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo $title;
                                    ?>
                                    <div class="mphb-price-breakdown-rate <?php echo esc_attr( $foldedClass ); ?>"><?php echo esc_html( sprintf( __( 'Rate: %s', 'motopress-hotel-booking' ), $roomBreakdown['room']['rate'] ) ); ?></div>
                                </td>
                                <td class="mphb-table-price-column">
                                <?php
                                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                echo mphb_format_price( $roomBreakdown['total'] );
                                ?>
                                    </td>
                            </tr> -->
                            <?php /* if ( MPHB()->settings()->main()->isAdultsAllowed() ) { ?>
                                <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-" . ( MPHB()->settings()->main()->isChildrenAllowed() ? 'adults' : 'guests' ) ); ?>">
                                    <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
                                                            <?php
                                                            if ( MPHB()->settings()->main()->isChildrenAllowed() ) {
                                                                esc_html_e( 'Adults', 'motopress-hotel-booking' );
                                                            } else {
                                                                esc_html_e( 'Guests', 'motopress-hotel-booking' );
                                                            }
                                                            ?>
                                    </td>
                                    <td><?php echo esc_html( $roomBreakdown['room']['adults'] ); ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ( $roomBreakdown['room']['children_capacity'] > 0 && MPHB()->settings()->main()->isChildrenAllowed() ) { ?>
                                <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-children" ); ?>">
                                    <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Children', 'motopress-hotel-booking' ); ?></td>
                                    <td><?php echo esc_html( $roomBreakdown['room']['children'] ); ?></td>
                                </tr>
                            <?php }  ?>
                            <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-nights" ); ?>">
                                <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Nights', 'motopress-hotel-booking' ); ?></td>
                                <td><?php echo count( $roomBreakdown['room']['list'] ); ?></td>
                            </tr>

                            <?php */ foreach ( $roomBreakdown['room']['list'] as $date => $datePrice ) :
                                        $ivy_roomprice = mphb_format_price( $datePrice );
                                        break;
                                    endforeach;  ?>
                            <?php if ( $roomBreakdown['room']['discount'] > 0 ) { ?>
                                <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-accommodation-discount" ); ?>">
                                    <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Accommodation Discount', 'motopress-hotel-booking' ); ?></th>
                                    <th class="mphb-table-price-column">
                                        <?php
                                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        echo mphb_format_price( -$roomBreakdown['room']['discount'] );
                                        ?>
                                    </th>
                                </tr>
                            <?php } ?>
                            <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-dates" ); ?>">
                                <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo $ivy_roomprice . ' x '. count( $roomBreakdown['room']['list'] ). ' night ' ; ?></td>
                                <td class="mphb-table-price-column"><?php echo mphb_format_price( $roomBreakdown['room']['discount_total'] ); ?></td>
                            </tr>
                            <?php if ( isset( $roomBreakdown['fees'] ) && ! empty( $roomBreakdown['fees']['list'] ) ) { ?>
                                <?php foreach ( $roomBreakdown['fees']['list'] as $fee ) { ?>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fee" ); ?>">
                                        <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo esc_html( $fee['label'] ); ?></td>
                                        <td class="mphb-table-price-column">
                                        <?php
                                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            echo mphb_format_price( $fee['price'] );
                                        ?>
                                            </td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $roomBreakdown['fees']['discount'] > 0 ) { ?>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fees-subtotal" ); ?>">
                                        <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Fees Subtotal', 'motopress-hotel-booking' ); ?></th>
                                        <th class="mphb-table-price-column">
                                            <?php
                                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            echo mphb_format_price( $roomBreakdown['fees']['total'] );
                                            ?>
                                        </th>
                                    </tr>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fees-discount" ); ?>">
                                        <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Fees Discount', 'motopress-hotel-booking' ); ?></th>
                                        <th class="mphb-table-price-column">
                                            <?php
                                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            echo mphb_format_price( -$roomBreakdown['fees']['discount'] );
                                            ?>
                                        </th>
                                    </tr>
                                <?php } ?>

                                <?php
                                if ( isset( $roomBreakdown['taxes']['fees'] ) && ! empty( $roomBreakdown['taxes']['fees']['list'] ) ) {
                                    ?>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fee-taxes" ); ?>">
                                        <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Fee Taxes', 'motopress-hotel-booking' ); ?></th>
                                        <th class="mphb-table-price-column"><?php esc_html_e( 'Amount', 'motopress-hotel-booking' ); ?></th>
                                    </tr>
                                    <?php foreach ( $roomBreakdown['taxes']['fees']['list'] as $feeTax ) { ?>
                                        <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fee-tax" ); ?>">
                                            <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo esc_html( $feeTax['label'] ); ?></td>
                                            <td class="mphb-table-price-column">
                                            <?php
                                                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                echo mphb_format_price( $feeTax['price'] );
                                            ?>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-fee-taxes-total" ); ?>">
                                        <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php esc_html_e( 'Fee Taxes Total', 'motopress-hotel-booking' ); ?></th>
                                        <th class="mphb-table-price-column">
                                            <?php
                                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            echo mphb_format_price( $roomBreakdown['taxes']['fees']['total'] );
                                            ?>
                                        </th>
                                    </tr>
                                    <?php
                                }
                                $feeTaxesTotal += $roomBreakdown['taxes']['fees']['total'];
                                ?>
                            <?php } ?>
                            <?php if ( isset( $roomBreakdown['taxes']['room'] ) && ! empty( $roomBreakdown['taxes']['room']['list'] ) ) { ?>
                                <?php foreach ( $roomBreakdown['taxes']['room']['list'] as $roomTax ) { ?>
                                    <tr class="<?php echo esc_attr( "{$foldedClass} mphb-price-breakdown-accommodation-tax" ); ?>">
                                        <td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo esc_html( $roomTax['label'] ); ?></td>
                                        <td class="mphb-table-price-column">
                                        <?php
                                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            echo mphb_format_price( $roomTax['price'] );
                                        ?>
                                            </td>
                                    </tr>
                                <?php } ?>
                                <?php
                                $accommodationTaxesTotal += $roomBreakdown['taxes']['room']['total'];
                            }
                            ?>

                            

                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <?php if ( ! empty( $priceBreakdown['coupon'] ) ) : ?>
                        <tr class="mphb-price-breakdown-coupon">
                            <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo esc_html( sprintf( __( 'Coupon: %s', 'motopress-hotel-booking' ), $priceBreakdown['coupon']['code'] ) ); ?></th>
                            <td class="mphb-table-price-column">
                                <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                echo mphb_format_price( -1 * $priceBreakdown['coupon']['discount'] );
                                ?>

                                <?php if ( $atts['coupon_removable'] ) { ?>
                                    <a href="#" class="mphb-remove-coupon"><?php esc_html_e( 'Remove', 'motopress-hotel-booking' ); ?></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                    endif;
                    $taxesBreakdown = '';
                    ob_start();
                    if ( $accommodationTaxesTotal > 0 || $feeTaxesTotal > 0 || $serviceTaxesTotal ) :
                        ?>
                        <?php
                    endif;
                    $taxesBreakdown = ob_get_contents();
                    ob_end_clean();

                    /**
                     * @since 3.9.8
                     *
                     * @param string $taxesBreakdown
                     * @param array $priceBreakdown
                     * @param float $accommodationTaxesTotal
                     * @param float $feeTaxesTotal
                     * @param float $serviceTaxesTotal
                     */
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo apply_filters( 'mphb_get_taxes_breakdown', $taxesBreakdown, $priceBreakdown, $accommodationTaxesTotal, $feeTaxesTotal, $serviceTaxesTotal );
                    ?>
                    <tr class="mphb-price-breakdown-total">
                        <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
                            <?php esc_html_e( 'Total', 'motopress-hotel-booking' ); ?>
                        </th>
                        <th class="mphb-table-price-column">
                            <?php
                            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            echo mphb_format_price( $priceBreakdown['total'] );
                            ?>
                        </th>
                    </tr>
                    <?php if ( ! empty( $priceBreakdown['deposit'] ) ) : ?>
                        <tr class="mphb-price-breakdown-deposit">
                            <th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
                                <?php esc_html_e( 'Deposit', 'motopress-hotel-booking' ); ?>
                            </th>
                            <th class="mphb-table-price-column">
                                <?php
                                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                echo mphb_format_price( $priceBreakdown['deposit'] );
                                ?>
                            </th>
                        </tr>
                    <?php endif; ?>
                </tfoot>
            </table>
            <?php
        endif;
        return ob_get_clean();
    }
    function lvys_renderCustomerDetails_before($booking){ ?>
        <section id="mphb-price-details" class="mphb-room-price-breakdown-wrapper mphb-checkout-section">
       <?php  MPHB()->reservationRequest()->setupParameter( 'pricing_strategy', 'base-price' );
        echo echogeneratePriceBreakdown( $booking );
        MPHB()->reservationRequest()->resetDefaults( array( 'pricing_strategy' ) );



        ?>
        </section>
        <?php 

        echo '</div>
        <div class="contact-wrap"><h5>Need help with your booking?</h5><p>Give us a call on <a href="tel:+1 727-316-1428">+1 727-316-1428</a></p></div>
        <div class="payment-info-wrap"><h5>Your payment is safe and secure and your personal data is protected at all times.</h5></div>
        <div class="stripe-img-wrap"><img src="https://dev.topleftdesign.com/lvys-vacation-rentals/WP/wp-content/uploads/2024/07/stripe.png"></div>
        </div><div class="col-md-7">
                <div class="your-details">';
    }
    function lvys_endform_before(){
        echo '</div><div class="step-btn"><div class="step-1"><div class="btn-primary step-1-continue">Continue</div></div><div class="step-2"><div class="step-2-wrap"><div class="pink-color step-2-back">Back</div></div></div></div></div>';
    }

    function lvys_renderCustomerDetails( $booking, $roomDetails = null, $customer = null ) {

        $firstName = '';
        $lastName  = '';
        $email     = '';

        if ( empty( $customer ) && is_user_logged_in() ) {

            $user = wp_get_current_user();

            $firstName = get_user_meta( $user->ID, 'first_name', true );
            $lastName  = get_user_meta( $user->ID, 'last_name', true );
            $email     = $user->data->user_email;

        } elseif ( ! empty( $customer ) ) {

            $firstName = $customer->getFirstName();
            $lastName  = $customer->getLastName();
            $email     = $customer->getEmail();
        }

        $requiredAttr = 'required="required"';
        $requiredAbbr = '<abbr title="' . esc_attr__( 'Required', 'motopress-hotel-booking' ) . '">*</abbr>';

        if ( is_admin() && ! MPHB()->settings()->main()->isCustomerRequiredOnAdmin() ) {
            $requiredAttr = $requiredAbbr = '';
        }
        ?>
        <section id="mphb-customer-details" class="mphb-checkout-section mphb-customer-details">
            <h3 class="mphb-customer-details-title"><?php esc_html_e( 'Your Information', 'motopress-hotel-booking' ); ?></h3>
            <!-- <p class="mphb-required-fields-tip">
                <small>
                    <?php printf( esc_html__( 'Required fields are followed by %s', 'motopress-hotel-booking' ), '<abbr title="required">*</abbr>' ); ?>
                </small>
            </p> -->
            <h5>Contact details</h5>
            <?php do_action( 'mphb_sc_checkout_form_customer_details' ); ?>
            <p class="mphb-customer-name">
                <label for="mphb_first_name">
                    <?php esc_html_e( 'First Name', 'motopress-hotel-booking' ); ?>
                    <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAbbr;
                    ?>
                </label>
                <br />
                <input type="text" id="mphb_first_name" placeholder="First name" name="mphb_first_name" value="<?php echo esc_attr( $firstName ); ?>" 
                                                                                                 <?php
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                                                    echo $requiredAttr;
                                                                                                    ?>
                     />
            </p>
            <p class="mphb-customer-last-name">
                <label for="mphb_last_name">
                    <?php esc_html_e( 'Last Name', 'motopress-hotel-booking' ); ?>
                    <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAbbr;
                    ?>
                </label>
                <br />
                <input type="text" name="mphb_last_name" placeholder="Last name" id="mphb_last_name" value="<?php echo esc_attr( $lastName ); ?>" 
                                                                                               <?php
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                                                echo $requiredAttr;
                                                                                                ?>
                     />
            </p>
            <p class="mphb-customer-email">
                <label for="mphb_email">
                    <?php esc_html_e( 'Email', 'motopress-hotel-booking' ); ?>
                    <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAbbr;
                    ?>
                </label>
                <br />
                <input type="email" name="mphb_email" placeholder="Email address"
                <?php
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAttr;
                ?>
                     id="mphb_email" value="<?php echo esc_attr( $email ); ?>" />
            </p>
            <p class="mphb-customer-phone">
                <label for="mphb_phone">
                    <?php esc_html_e( 'Phone', 'motopress-hotel-booking' ); ?>
                    <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAbbr;
                    ?>
                </label>
                <br />
                <input type="text" name="mphb_phone" placeholder="Phone number"
                <?php
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $requiredAttr;
                ?>
                     id="mphb_phone" value="<?php echo $customer ? $customer->getPhone() : ''; ?>" />
            </p>
            <h5>Address</h5>
            <?php if ( MPHB()->settings()->main()->isRequireCountry() ) : ?>
                <?php $defaultCountry = MPHB()->settings()->main()->getDefaultCountry(); ?>
                <p class="mphb-customer-country">
                    <label for="mphb_country">
                        <?php esc_html_e( 'Country of residence', 'motopress-hotel-booking' ); ?>
                        <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAbbr;
                        ?>
                    </label>
                    <br />
                    <?php $defaultCountry = $customer ? strtoupper( $customer->getCountry() ) : $defaultCountry; ?>
                    <select name="mphb_country" 
                    <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAttr;
                    ?>
                         id="mphb_country">
                        <option value="" <?php selected( $defaultCountry, '' ); ?>></option>
                        <?php foreach ( MPHB()->settings()->main()->getCountriesBundle()->getCountriesList() as $countryCode => $countryLabel ) { ?>
                            <option value="<?php echo esc_attr( $countryCode ); ?>" <?php selected( $defaultCountry, $countryCode ); ?>>
                                <?php echo esc_html( $countryLabel ); ?>
                            </option>
                        <?php } ?>
                    </select>
                </p>
            <?php endif; // country ?>
            <?php if ( MPHB()->settings()->main()->isRequireFullAddress() ) : ?>
                <p class="mphb-customer-address1">
                    <label for="mphb_address1">
                        <?php esc_html_e( 'Address', 'motopress-hotel-booking' ); ?>
                        <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAbbr;
                        ?>
                    </label>
                    <br />
                    <input type="text" name="mphb_address1" placeholder="Address line"
                    <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAttr;
                    ?>
                         id="mphb_address1" value="<?php echo $customer ? $customer->getAddress1() : ''; ?>" />
                </p>
                <p class="mphb-customer-city">
                    <label for="mphb_city">
                        <?php esc_html_e( 'City', 'motopress-hotel-booking' ); ?>
                        <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAbbr;
                        ?>
                    </label>
                    <br />
                    <input type="text" name="mphb_city"  placeholder="City"
                    <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAttr;
                    ?>
                         id="mphb_city" value="<?php echo $customer ? $customer->getCity() : ''; ?>" />
                </p>
                <p class="mphb-customer-state">
                    <label for="mphb_state">
                        <?php esc_html_e( 'State / County', 'motopress-hotel-booking' ); ?>
                        <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAbbr;
                        ?>
                    </label>
                    <br />
                    <input type="text" name="mphb_state" placeholder="State"
                    <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAttr;
                    ?>
                         id="mphb_state" value="<?php echo $customer ? $customer->getState() : ''; ?>" />
                </p>
                <p class="mphb-customer-zip">
                    <label for="mphb_zip">
                        <?php esc_html_e( 'Zip code', 'motopress-hotel-booking' ); ?>
                        <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAbbr;
                        ?>
                    </label>
                    <br />
                    <input type="text" name="mphb_zip" placeholder="Zip code"
                    <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        echo $requiredAttr;
                    ?>
                         id="mphb_zip" value="<?php echo $customer ? $customer->getZip() : ''; ?>" />
                </p>
            <?php endif; // full address ?>
            <p class="mphb-customer-note">
                <label for="mphb_note"><?php esc_html_e( 'Notes', 'motopress-hotel-booking' ); ?></label><br />
                <textarea name="mphb_note" id="mphb_note" rows="4"></textarea>
            </p>

            <?php echoCreateCustomerAccountCheckbox(); ?>
        </section>
        <?php
    }

    function echoCreateCustomerAccountCheckbox() {

            $autoCreateNewAccount = MPHB()->settings()->main()->automaticallyCreateUser();
            $allowToCreateAccount = MPHB()->settings()->main()->allowCustomersCreateAccount();

            $allowToCreateAccount = $allowToCreateAccount && ! $autoCreateNewAccount && ! is_user_logged_in();

            if ( $allowToCreateAccount ) {
                ?>
                <p class="mphb-customer-create-account">
                    <input type="checkbox" 
                    id="mphb_create_new_account"
                    name="mphb_create_new_account"
                    value="1" />
                    <label for="mphb_create_new_account"><?php echo esc_html__( 'Create an account', 'motopress-hotel-booking' ); ?></label>
                </p>
                <?php
            }
        }


    add_action("wp_ajax_pma_around_gulfport_post_filter", "pma_around_gulfport_post_filter_fun");
    add_action('wp_ajax_nopriv_pma_around_gulfport_post_filter', 'pma_around_gulfport_post_filter_fun');

    function pma_around_gulfport_post_filter_fun() {
        $category = $_POST['category'];
        $paged = $_POST['paged'];
        $args = array(
            'post_type' => 'around_gulfport',
            'posts_per_page' => 6,
            'paged' => $paged,
        );
        if ($category != '' && $category != 'undefine') {
            $tax_query[] = array(
                'taxonomy' => 'around_gulfport_tax',
                'terms' => array($category),
                'field' => 'term_id',
            );
             $args['tax_query'] = $tax_query;
        }
       
        ob_start();
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
            while ($loop->have_posts()) {
                $loop->the_post();
                $google_map_link = get_field('google_map_link',get_the_ID());
                $contact_number = get_field('contact_number',get_the_ID());
                $feature_img = get_the_post_thumbnail_url();
                ?>
                <div class="near-places-lists">
                    <?php if(!empty( $feature_img)) { ?>
                        <div class="near-places-pic">
                            <img src="<?php echo $feature_img; ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                    <?php } ?>
                    <div class="near-places-content">
                        <h3><?php echo get_the_title(); ?></h3>
                        <?php the_content(); ?>
                        <ul class="contact-lists">
                            <?php if(!empty($google_map_link)) { ?>
                                <li><a href="<?php echo $google_map_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/map-icon.svg" alt="">Find on Google maps</a></li>
                            <?php } ?>
                            <?php if(!empty($contact_number)) { ?>
                                <li><a href="tel:<?php echo $contact_number; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon-outline.svg" alt="">Contact on <?php echo $contact_number; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="email-list">
                <div class="not-found"> Can't any Forum Found!</div>
            </div>
            <?php
        }
        $output_email = ob_get_contents();
        ob_end_clean();
        ob_start();
        $paginate_links = paginate_links(array(
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $loop->max_num_pages,
            'prev_text' => __('Previous'), 
            'next_text' => __('Next'),
        ));
        if ($paginate_links) {
            ?>
            <?php echo $paginate_links; ?>
            <?php
        }
        $output_pagination = ob_get_contents();
        ob_end_clean();
        echo json_encode(array('html' => $output_email, 'pagination' => $output_pagination));
        die();
    }


?>
<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


class Pisces_Widget_Contact_Info extends WP_Widget {

    public function __construct(){
        parent::__construct(
            'contact_info',
            esc_html__('[Pisces] - Contact Info', 'pisces'),
            array(
                'description' => esc_html__('Display contact information of your store', 'pisces')
            )
        );
    }

    public function widget($args, $instance){
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
        echo ($args['before_widget']);
        if ( ! empty( $instance['title'] ) ) {
            echo ($args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']);
        }
        echo '<div class="la-contact-info">';
        if(!empty($phone)){
            printf(
                '<div class="la-contact-item la-contact-phone"><span>%s</span></div>',
                esc_html($phone)
            );
        }
        if(!empty($email)){
            printf(
                '<div class="la-contact-item la-contact-email"><span>%s</span></div>',
                esc_html($email)
            );
        }
        if(!empty($address)){
            printf(
                '<div class="la-contact-item la-contact-address"><span>%s</span></div>',
                esc_html($address)
            );
        }
        echo '</div>';
        echo ($args['after_widget']);
    }
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'pisces' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_attr_e( 'Phone:', 'pisces' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'pisces' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_attr_e( 'Address:', 'pisces' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? $new_instance['phone'] : '';
        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? $new_instance['email'] : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? $new_instance['address'] : '';
        return $instance;
    }
}
<?php
class ContactDetailsWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        // widget actual processes
        $widget_ops = array('classname' => 'ContactDetailsWidget', 'description' => 'Displays Contact Details.');
        parent::__construct('ContactDetailsWidget', __('Contact Details'), $widget_ops);
    }

    public function widget($args, $instance)
    {
        $address = empty($instance['address']) ? '' : $instance['address'];
        $map_link = empty($instance['map_link']) ? '' : $instance['map_link'];
        $phone = empty($instance['phone']) ? '' : $instance['phone'];
        $email = empty($instance['email']) ? '' : $instance['email'];

        echo '<ul class="footer-contact-info">';
        // The fields output
        if (!empty($address)) {
            $anchor_before = $map_link ? '<a href="' . $map_link . '" target="_blank">' : '';
            $anchor_after = $map_link ? '</a>' : '';
            echo '<li>' . $anchor_before . '<i data-feather="map-pin"></i>' . $address . $anchor_after . '</li>';
        }
        if (!empty($email))
            echo '<li><i data-feather="mail"></i> Email: <a href="mailto:' . $email . '">' . $email . '</a></li>';
        if (!empty($phone))
            echo '<li><i data-feather="phone-call"></i> Phone: <a href="tel:' . preg_replace('/\D/', '', $phone) . '">' . $phone . '</a></li>';
        // After widget code, if any
        echo '</ul>';
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        if (!empty($new_instance['address']))
            $instance['address'] = $new_instance['address'];
        if (!empty($new_instance['map_link']))
            $instance['map_link'] = $new_instance['map_link'];
        if (!empty($new_instance['phone']))
            $instance['phone'] = sanitize_text_field($new_instance['phone']);
        if (!empty($new_instance['email']))
            $instance['email'] = sanitize_text_field($new_instance['email']);
        return $instance;
    }

    public function form($instance)
    {

        // Extract the data from the instance variable
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $map_link = !empty($instance['map_link']) ? $instance['map_link'] : '';

        // Display the Contact fields
?>
        <!-- Widget address field START -->
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>">Address:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_html($address); ?>">
        </p>
        <!-- Widget address field END -->

        <!-- Widget address field START -->
        <p>
            <label for="<?php echo $this->get_field_id('map_link'); ?>">Google Map Link:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('map_link'); ?>" name="<?php echo $this->get_field_name('map_link'); ?>" type="text" value="<?php echo esc_html($map_link); ?>">
        </p>
        <!-- Widget address field END -->

        <!-- Widget phone number field START -->
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>">Phone Number:
                <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" placeholder="(___)-___-____" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
            </label>
        </p>
        <!-- Widget phone number field END -->

        <!-- Widget email field START -->
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Email:
                <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
            </label>
        </p>
        <!-- Widget email field END -->
<?php
    }
}

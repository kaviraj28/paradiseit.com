<?php
class ContactPageWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        // widget actual processes
        $widget_ops = array('classname' => 'ContactPageWidget', 'description' => 'Displays Contact Details.');
        parent::__construct('ContactPageWidget', __('Contact Page Details'), $widget_ops);
    }

    public function widget($args, $instance)
    {
        $address = empty($instance['address']) ? '' : $instance['address'];
        $map_link = empty($instance['map_link']) ? '' : $instance['map_link'];
        $phone_one = empty($instance['phone_one']) ? '' : $instance['phone_one'];
        $phone_two = empty($instance['phone_two']) ? '' : $instance['phone_two'];
        $email_one = empty($instance['email_one']) ? '' : $instance['email_one'];
        $email_two = empty($instance['email_two']) ? '' : $instance['email_two'];

        // The fields output

        if (!empty($email_one) || !empty($email_two)) { ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i data-feather="mail"></i>
                    </div>
                    <h3>Mail Here</h3>
                    <?php if ($email_one) { ?>
                        <p><a href="mailto:<?= $email_one ?>"><?= $email_one ?></a></p>
                    <?php }
                    if ($email_two) { ?>
                        <p><a href="mailto:<?= $email_two ?>"><?= $email_two ?></a></p>
                    <?php } ?>
                </div>
            </div>
        <?php }
        if (!empty($address)) {
            $anchor_before = $map_link ? '<a href="' . $map_link . '" target="_blank">' : '';
            $anchor_after = $map_link ? '</a>' : ''; ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i data-feather="map-pin"></i>
                    </div>
                    <h3>Visit Here</h3>
                    <p><?= $anchor_before . $address . $anchor_after ?></p>
                </div>
            </div>
        <?php }
        if (!empty($phone_one) || !empty($phone_two)) { ?>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="contact-info-box">
                    <div class="icon">
                        <i data-feather="phone"></i>
                    </div>
                    <h3>Call Here</h3>
                    <?php if ($phone_one) { ?>
                        <p><a href="<?= preg_replace('/\D/', '', $phone_one); ?>"><?= $phone_one; ?></a></p>
                    <?php }
                    if ($phone_two) { ?>
                        <p><a href="<?= preg_replace('/\D/', '', $phone_two); ?>"><?= $phone_two; ?></a></p>
                    <?php } ?>
                </div>
            </div>
        <?php } // After widget code, if any
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        if (!empty($new_instance['address']))
            $instance['address'] = $new_instance['address'];
        if (!empty($new_instance['map_link']))
            $instance['map_link'] = $new_instance['map_link'];
        if (!empty($new_instance['phone_one']))
            $instance['phone_one'] = sanitize_text_field($new_instance['phone_one']);
        if (!empty($new_instance['phone_two']))
            $instance['phone_two'] = sanitize_text_field($new_instance['phone_two']);
        if (!empty($new_instance['email_one']))
            $instance['email_one'] = sanitize_text_field($new_instance['email_one']);
        if (!empty($new_instance['email_two']))
            $instance['email_two'] = sanitize_text_field($new_instance['email_two']);
        return $instance;
    }

    public function form($instance)
    {

        // Extract the data from the instance variable
        $phone_one = !empty($instance['phone_one']) ? $instance['phone_one'] : '';
        $phone_two = !empty($instance['phone_two']) ? $instance['phone_two'] : '';
        $email_one = !empty($instance['email_one']) ? $instance['email_one'] : '';
        $email_two = !empty($instance['email_two']) ? $instance['email_two'] : '';
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

        <!-- Widget phone one number field START -->
        <p>
            <label for="<?php echo $this->get_field_id('phone_one'); ?>">Phone One Number:
                <input class="widefat" id="<?php echo $this->get_field_id('phone_one'); ?>" placeholder="(___)-___-____" name="<?php echo $this->get_field_name('phone_one'); ?>" type="text" value="<?php echo esc_attr($phone_one); ?>" />
            </label>
        </p>
        <!-- Widget phone one number field END -->

        <!-- Widget phone two number field START -->
        <p>
            <label for="<?php echo $this->get_field_id('phone_two'); ?>">Phone Two Number:
                <input class="widefat" id="<?php echo $this->get_field_id('phone_two'); ?>" placeholder="(___)-___-____" name="<?php echo $this->get_field_name('phone_two'); ?>" type="text" value="<?php echo esc_attr($phone_two); ?>" />
            </label>
        </p>
        <!-- Widget phone two number field END -->

        <!-- Widget email_one field START -->
        <p>
            <label for="<?php echo $this->get_field_id('email_one'); ?>">Email_one:
                <input class="widefat" id="<?php echo $this->get_field_id('email_one'); ?>" name="<?php echo $this->get_field_name('email_one'); ?>" type="text" value="<?php echo esc_attr($email_one); ?>" />
            </label>
        </p>
        <!-- Widget email_one field END -->

        <!-- Widget email two field START -->
        <p>
            <label for="<?php echo $this->get_field_id('email_two'); ?>">Email Two:
                <input class="widefat" id="<?php echo $this->get_field_id('email_two'); ?>" name="<?php echo $this->get_field_name('email_two'); ?>" type="text" value="<?php echo esc_attr($email_two); ?>" />
            </label>
        </p>
        <!-- Widget email two field END -->
<?php
    }
}

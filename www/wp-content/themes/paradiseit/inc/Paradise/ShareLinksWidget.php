<?php
class ShareLinksWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        // widget actual processes
        $widget_ops = array('classname' => 'ShareLinksWidget', 'description' => 'Displays Share Link Details.');
        parent::__construct('ShareLinksWidget', __('Share Link Details'), $widget_ops);
    }

    public function widget($args, $instance)
    {
        $social_detail = array(
            array($instance['facebook'], 'facebook'),
            array($instance['twitter'], 'twitter'),
            array($instance['instagram'], 'instagram'),
            array($instance['linkedin'], 'linkedin'),
        );

        echo '<ul class="social-links">';
        // The fields output
        for ($i = 0; $i < count($social_detail); $i++) {
            if (!empty($social_detail[$i][0])) {
                echo '<li><a href="' . $social_detail[$i][0] . '" class="' . $social_detail[$i][1] . '" target="_blank"><i data-feather="' . $social_detail[$i][1] . '"></i></a></li>';
            }
        }
        // After widget code, if any
        echo '</ul>';
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        if (!empty($new_instance['facebook']))
            $instance['facebook'] = $new_instance['facebook'];
        if (!empty($new_instance['twitter']))
            $instance['twitter'] = $new_instance['twitter'];
        if (!empty($new_instance['instagram']))
            $instance['instagram'] = $new_instance['instagram'];
        if (!empty($new_instance['linkedin']))
            $instance['linkedin'] = $new_instance['linkedin'];
        return $instance;
    }

    public function form($instance)
    {

        // Extract the data from the instance variable
        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';
        $linkedin = !empty($instance['linkedin']) ? $instance['linkedin'] : '';

        // Display the Contact fields
?>
        <!-- Widget facebook field START -->
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_html($facebook); ?>">
        </p>
        <!-- Widget facebook field END -->

        <!-- Widget facebook field START -->
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_html($twitter); ?>">
        </p>
        <!-- Widget facebook field END -->

        <!-- Widget Instagram field START -->
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram:
                <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
            </label>
        </p>
        <!-- Widget Instagram field END -->

        <!-- Widget Linkedin field START -->
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin:
                <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
            </label>
        </p>
        <!-- Widget linkedin field END -->
<?php
    }
}

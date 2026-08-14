<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;
?>
<style>
    .mx-time-zone-clock-notification-wrapper {
        display: flex;
        padding: 20px;
        background-color: #fff;
        margin-top: 20px;
    }
</style>

<div class="mx-time-zone-clock-notification-wrapper">
    <div class="mx-time-zone-clock-notification-content">
        <h3><?php echo esc_html__('MX Time Zone Clocks plugin. How Does it work.', 'mx-time-zone-clock'); ?></h3>

        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/HoHkyK8kAdk?si=uJkXUlz6fzaI-CIK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    jQuery(function($) {
        $('.notice.mx-time-zone-clock-notification').on('click', 'button.notice-dismiss', function(event) {
            event.preventDefault();

            $.post(ajaxurl, {
                action: 'mx-time-zone-clock_how_it_works_notice_viewed'
            });
        });
    });
</script>
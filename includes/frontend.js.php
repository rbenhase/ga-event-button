/**
 * Add a Google Analytics event listener
 */

(function($) {
  $(document).ready(function() {
    if (typeof ga != "undefined") {    
      $(document).on("click", ".fl-module-ga-event-button[data-node='<?php echo $id; ?>']", function() {        
        ga('send', 'event', {
          eventCategory: '<?php echo $settings->ga_category; ?>',
          eventAction: '<?php echo $settings->ga_action; ?>',
          <?php if ( !empty( $settings->ga_value ) ): ?>
          eventLabel: '<?php echo $settings->ga_label; ?>',
          <?php endif; ?>
          <?php if ( !empty( $settings->ga_value ) ): ?>
          eventValue: <?php echo intval($settings->ga_value); ?>,
          <?php endif; ?>
          transport: 'beacon'
        });

      });
    } else if (typeof console != "undefined") {
      console.warn("GA Event Tracking Button Error: Could not find a the Google Analytics tracking script (analytics.js) on this site. Event tracking will not work.");
    }
  });
})(jQuery);
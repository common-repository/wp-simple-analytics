<?php
/*
Plugin Name: WP-Simple-Analytics
Description: Use 'Google Analytics' to track visitors to your blog
Version: 0.1.0
Author: David Futcher (bobbo)
Author URI: http://bobbo.me.uk
*/

$analytics_key = "UA-1358926-3";

function analytics_add()
{
    echo $analytics_key;
    if (strlen(get_option(sa_analytics_key)) > 0) /* Make sure this is set up correctly */
    {
        echo "<!-- Google Analytics Start -->\n";
        echo '<script type="text/javascript">
              var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
              document.write(unescape("%3Cscript src=\'" + gaJsHost + google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
              </script>
              <script type="text/javascript">
              var pageTracker = _gat._getTracker("'.get_option(sa_analytics_key).'");
              pageTracker._initData();
              pageTracker._trackPageview();
</script>';
        echo "\n<!-- Google Analytics End -->\n\n";
    }
    else
    {
        echo "<!-- wp-simple-analytics plugin not setup correctly -->";
    }
}

/* Main function */
add_option("sa_analytics_key", $analytics_key, true);
add_action('wp_head', 'analytics_add');
?>

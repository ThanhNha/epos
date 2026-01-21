<?php
function epos360_add_poppins_font()
{
    if (is_page('epos360')) {
        add_action('wp_head', function () {
            echo '<style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            body { font-family: "Poppins", sans-serif; }
            </style>';
        });
    }
}
add_action('wp', 'epos360_add_poppins_font');

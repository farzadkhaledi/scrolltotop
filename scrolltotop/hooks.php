<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

add_hook('ClientAreaHeadOutput', 1, function($vars) {
    $bgcolor = (\WHMCS\Config\Setting::getValue('FKSCROLLBGCOLOR')) ? \WHMCS\Config\Setting::getValue('FKSCROLLBGCOLOR') : '#4caf50';
    $hovercolor = (\WHMCS\Config\Setting::getValue('FKSCROLLHOVERCOLOR')) ? \WHMCS\Config\Setting::getValue('FKSCROLLHOVERCOLOR') : '#4caf50';
    $style = '<style>.material-scrolltop{ background-color: ' . $bgcolor . '; }
        .material-scrolltop:hover { background-color: ' . $hovercolor . '; }</style>';
    return '<link rel="stylesheet" href="' . $vars['systemurl'] . '/modules/addons/scrolltotop/assets/material-scrolltop.css" />' . $style;
});

add_hook('ClientAreaFooterOutput', 1, function($vars) {

    return '<script src="' . $vars['systemurl'] . '/modules/addons/scrolltotop/assets/material-scrolltop.js"></script>
<button class="material-scrolltop" type="button"></button>
<script>
  $(\'body\').materialScrollTop();
</script>';
});

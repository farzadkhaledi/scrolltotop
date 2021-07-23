<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function scrolltotop_config()
{
    $config = array(
        "name" => "Scroll to top",
        "description" => "Scroll to top module for WHMCS",
        "version" => "1.0",
        "author" => "<a href='https://khaledi.website'>Farzad Khaledi</a>",
        "language" => "english",
        "fields" => array());
    return $config;
}

function scrolltotop_activate()
{
    return array("status" => "success", "description" => "Scroll to top module for WHMCS has been activated.");
}

function scrolltotop_deactivate()
{
    return array("status" => "success", "description" => "Scroll to top module for WHMCS has been deactivated.");
}

function scrolltotop_output($vars)
{
    if (isset($_POST['save'])) {
        check_token("WHMCS.admin.default");
        \WHMCS\Config\Setting::setValue('FKSCROLLBGCOLOR', ((isset($_REQUEST['bgcolor']) && $_REQUEST['bgcolor'] != '') ? $_REQUEST['bgcolor'] : ''));
        \WHMCS\Config\Setting::setValue('FKSCROLLHOVERCOLOR', ((isset($_REQUEST['hovercolor']) && $_REQUEST['hovercolor'] != '') ? $_REQUEST['hovercolor'] : ''));
        redir('module=scrolltotop&saved=1');
    }
    if (isset($_REQUEST['saved'])) {
        echo '<div class="alert alert-success">Changes saved successfully.</div>';
    }

    global $CONFIG;
    echo '<form action="" method="post">
        <input type="hidden" name="save" value="1">
        <table class="form" width="100%" cellspacing="2" cellpadding="3" border="0">
        <tbody>
        <tr>
            <td class="fieldlabel">Button Background Color:</td>
            <td class="fieldarea">
                <input ' . ((\WHMCS\Config\Setting::getValue('FKSCROLLBGCOLOR')) ? 'value="' . \WHMCS\Config\Setting::getValue('FKSCROLLBGCOLOR') . '"' : '') . ' type="text" name="bgcolor" class="colorpicker">
                Enter scroll to top button background color</td>
        </tr>
        <tr>
            <td class="fieldlabel">Button Background Hover Color:</td>
            <td class="fieldarea">
                <input ' . ((\WHMCS\Config\Setting::getValue('FKSCROLLHOVERCOLOR')) ? 'value="' . \WHMCS\Config\Setting::getValue('FKSCROLLHOVERCOLOR') . '"' : '') . ' type="text" name="hovercolor" class="colorpicker">
                Enter scroll to top button hover color</td>
        </tr>

    </tbody></table>
    <div class="btn-container">
    <input id="saveChanges" type="submit" value="Save Changes" class="btn btn-primary">
</div></form>';

    echo '<script type="text/javascript" src="' . $CONFIG['SystemURL'] . '/assets/js/jquery.miniColors.js"></script>
        <link rel="stylesheet" type="text/css" href="' . $CONFIG['SystemURL'] . '/assets/css/jquery.miniColors.css" /><script>$(document).ready(function(){
$(".colorpicker").miniColors();
            });</script>';
}

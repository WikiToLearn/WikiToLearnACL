<?php
/*Entry point */
if (!defined('MEDIAWIKI')){
    die();
}
if(function_exists('wfLoadExtension')) {
    wfLoadExtension('WikiToLearnACL');

    wfWarn( "Deprecated entry point to WikiToLearnACL. Please use wfLoadExtension('WikiToLearnACL').");

}
else
{
    die("MediaWiki version 1.25+ is required to use the WikiToLearnACL extension");
}
?>

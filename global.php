<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2008 Harvey Kane <code@ragepank.com>
 * Copyright 2008 Michael Holt <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */


/*
// Example usage

if (class_exists('JOJO_Plugin_Jojo_rss_reader')) {
    $url = 'http://www.jojocms.org/blog/rss/';
    $numitems = 5;
    $smarty->assign('sidebar_rss', JOJO_Plugin_Jojo_rss_reader::getHtml($url, $numitems));
}
*/
if (class_exists('JOJO_Plugin_Jojo_rss_reader')) {
    $url = 'http://www.jojocms.org/blog/rss/';
    $numitems = 5;
    $smarty->assign('sidebar_rss', JOJO_Plugin_Jojo_rss_reader::getHtml($url, $numitems));
}
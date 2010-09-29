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

$feeds = Jojo::getOption('jojo_rss_reader_feeds', '');
if (!empty($feeds)) {
    $rssfeed = array();
    $feeds = explode('<br />', nl2br($feeds));
    $numitems = Jojo::getOption('jojo_rss_reader_snippet_number', 5);
    foreach ($feeds as $feed) {
        $rssfeeds[] = JOJO_Plugin_Jojo_rss_reader::getFeed(trim($feed), $numitems);
    }
    $smarty->assign('rssfeeds', $rssfeeds);    
}
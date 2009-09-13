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

class JOJO_Plugin_Jojo_rss_reader extends JOJO_Plugin
{
    /* returns HTML - modify jojo_rss_reader_sidebar.tpl to customize */
    function getHtml($url, $max=5)
    {
        global $smarty;
        $content = JOJO_Plugin_Jojo_rss_reader::getFeed($url, $max);
        $smarty->assign('jojo_rss_reader_content', $content);
        return $smarty->fetch('jojo_rss_reader_sidebar.tpl');
    }
    
    /* returns an array for looping through in Smarty */
    function getFeed($url, $max=5)
    {
        if (!defined('MAGPIE_DEBUG')) define('MAGPIE_DEBUG', 0);
        
        $cachelength = Jojo::getOption('jojo_rss_reader_cache_length');
        if (empty($cachelength)) $cachelength = 20;
        
        $time = JOJO::getOption('jojo_rss_reader_last_cache');
        if (empty($time) || Jojo::ctrlF5() || ($time < strtotime('-'.$cachelength.' minutes'))) {
            foreach (Jojo::listPlugins('external/magpie/rss_fetch.inc') as $pluginfile) {
                require_once($pluginfile);
                break;
            }
            
            $rss = fetch_rss($url);
            $n = min($max, count($rss->items));
            $content = array();
            for ($i = 0; $i < $n; $i++) {
              $rss->items[$i]['title']       = trim($rss->items[$i]['title']);
              $rss->items[$i]['description'] = trim($rss->items[$i]['description']);
              $content[]                     = $rss->items[$i];
            }
            /* save to cache */
            Jojo::insertQuery("REPLACE INTO {option} SET op_name='jojo_rss_reader_last_cache', op_value=?, op_category='system'", time());
            Jojo::insertQuery("REPLACE INTO {option} SET op_name='jojo_rss_reader_content', op_value=?, op_category='system'", serialize($content));
        } else {
            /* read from cache */
            $content = unserialize(Jojo::getOption('jojo_rss_reader_content'));
        }
        return $content;
    }
}
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

class Jojo_Plugin_Jojo_rss_reader extends Jojo_Plugin
{
    /* returns HTML - modify Jojo_rss_reader_sidebar.tpl to customize */
    function getHtml($url, $max=5)
    {
        global $smarty;
        $content = Jojo_Plugin_Jojo_rss_reader::getFeed($url, $max);
        $smarty->assign('jojo_rss_reader_content', $content);
        return $smarty->fetch('jojo_rss_reader_sidebar.tpl');
    }

    /* returns an array for looping through in Smarty */
    function getFeed($url, $max=5)
    {
        static $_cache;

        $cacheKey = 'rss-' . $url;
        $cacheKeyTime = 'rss-' . $url . '-time';
        $cachelength = 60*(Jojo::getOption('jojo_rss_reader_cache_length', 20));
        $now = time();
        $then = isset($_cache[$cacheKeyTime]) ? $_cache[$cacheKeyTime] : $now;
        $_cache[$cacheKeyTime] =  $then;

        $refresh = (boolean) (Jojo::ctrlF5() || ($now > ($then + $cachelength) ));

        /* Have we got a cached result? */
        if (isset($_cache[$cacheKey]) && !$refresh) {
            $feed = unserialize($_cache[$cacheKey]);
        } else {
            foreach (Jojo::listPlugins('external/rss_php.php') as $pluginfile) {
                require_once($pluginfile);
                break;
            }
            $rss = new rss_php;
            $rss->load($url);
            $feed = array();
            $rawfeed = $rss->getItems();
            if (is_array($rawfeed) && count($rawfeed)) {
                $feed['channel'] = $rss->getChannel();
                $feed['channel']['url'] = $url;
                foreach ($rawfeed as $k => $item) {
                    $feed['items'][$k]['title']       = isset($item['title']) ? trim(htmlspecialchars($item['title'], ENT_COMPAT, 'UTF-8', false)) : '';
                    $feed['items'][$k]['description'] = isset($item['description']) ? trim(htmlspecialchars($item['description'], ENT_COMPAT, 'UTF-8', false)) : '';
                    $feed['items'][$k]['link']        = isset($item['link']) ? $item['link'] : '';
                    $feed['items'][$k]['pubDate']     = isset($item['pubDate']) ? $item['pubDate'] : '';
                    $feed['items'][$k]['author']      = isset($item['author']) ? $item['author'] : '';
                }

                /* save to cache */
                $_cache[$cacheKey] =  serialize($feed);
                $_cache[$cacheKeyTime] =  $now;
           } else {
                return false;
           }
        }
        return $feed;
    }
}
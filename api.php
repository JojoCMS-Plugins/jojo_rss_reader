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

$_options[] = array(
    'id'          => 'jojo_rss_reader_feeds',
    'category'    => 'External RSS',
    'label'       => 'RSS Feeds',
    'description' => 'External RSS URLs - newline separated',
    'type'        => 'textarea',
    'rows'      => '3',
    'options'     => '',
    'default'     => 'http://www.jojocms.org/blog/rss/',
    'plugin'      => 'jojo_rss_reader'
);

$_options[] = array(
    'id'          => 'jojo_rss_reader_cache_length',
    'category'    => 'External RSS',
    'label'       => 'RSS cache length',
    'description' => 'Number of minutes to hold the RSS in cache',
    'type'        => 'integer',
    'default'     => '20',
    'options'     => '',
    'plugin'      => 'jojo_rss_reader'
);

$_options[] = array(
    'id'          => 'jojo_rss_reader_snippet_number',
    'category'    => 'External RSS',
    'label'       => 'RSS snippets',
    'description' => 'How many snippets to fetch from the RSS feeds.',
    'type'        => 'integer',
    'options'     => '',
    'default'     => '5',
    'plugin'      => 'jojo_rss_reader'
);
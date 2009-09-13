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
    'id'          => 'jojo_rss_reader_last_cache',
    'category'    => 'System',
    'label'       => 'RSS last cached',
    'description' => 'The last time external RSS content was fetched',
    'type'        => 'hidden',
    'default'     => '0',
    'options'     => '',
    'plugin'      => 'jojo_rss_reader'
);

$_options[] = array(
    'id'          => 'jojo_rss_reader_cache_length',
    'category'    => 'System',
    'label'       => 'RSS cache length',
    'description' => 'Number of minutes to hold the RSS in cache',
    'type'        => 'integer',
    'default'     => '20',
    'options'     => '',
    'plugin'      => 'jojo_rss_reader'
);

$_options[] = array(
    'id'          => 'jojo_rss_reader_content',
    'category'    => 'System',
    'label'       => 'RSS content',
    'description' => 'The content from the last RSS fetch.',
    'type'        => 'hidden',
    'default'     => '',
    'options'     => '',
    'plugin'      => 'jojo_rss_reader'
);
A simple script for displaying external RSS content in a sidebar.

Installation:

- Install the plugin.
- In the global.php of your theme, copy paste the following code (if global.php does not exist, create it)...

if (class_exists('JOJO_Plugin_Jojo_rss_reader')) {
    $url = 'http://www.jojocms.org/blog/rss/';
    $numitems = 5;
    $smarty->assign('sidebar_rss', JOJO_Plugin_Jojo_rss_reader::getHtml($url, $numitems));
}

- Modify the $url and $numitems variables in the above code to reflect your preferences.
- Add the Smarty variable {$sidebar_rss} into any template - usually template.tpl in your theme.
- Alternatively, to insert the RSS content into the content area, you can enter [[jojo_rss_reader_sidebar.tpl]] into a BB Code / WYSIWYG content box under "edit pages".

Feed content is cached for 20 minutes by default. This can be configured in the options. You can press CTRL-F5 on a page to ignore the cache and grab the content from the original source (handy for testing or when you change the feed address).

For further modifications to the layout, we recommend making a copy of jojo_rss_reader_sidebar.tpl in the templates folder of your theme and making your changes to the copy. This way your changes will be preserved when Jojo is updated.

This plugin is Alpha and may contain bugs. Please report via the forums (http://www.jojocms.org/forums/) or feel free to contribute updated code.
{if $jojo_rss_reader_content}
<ul>
{section name=r loop=$jojo_rss_reader_content}
  <li><a href="{$jojo_rss_reader_content[r].link}" title="{$jojo_rss_reader_content[r].description|truncate:70}" rel="nofollow">{$jojo_rss_reader_content[r].title}</a></li>
{/section}
</ul>
{/if}
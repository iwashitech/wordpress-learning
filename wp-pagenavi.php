<?php

function wd_pagination($html) {
  $out = '';
  $out = str_replace("<a","<li><a",$html);
  $out = str_replace("</a>","</a></li>",$out);
  $out = str_replace("<span","<li><span",$out);
  $out = str_replace("</span>","</span></li>",$out);
  $out = str_replace("<div class='wp-pagenavi'>","",$out);
  $out = str_replace("</div>","",$out);

  return '<div class="pagination"><ul>' . $out . '</ul></div>';
}

function wd_pagination_regex($html) {
  $out = '';
  $out = preg_replace("/<span(.+?)>(.+?)<\/span>/", "<li><span$1>$2</span></li>", $html);
  $out = preg_replace("/<a(.+?)>(.+?)<\/a>/", "<li><a$1>$2</a></li>", $out);
  $out = preg_replace("/<div class='wp-pagenavi' role='navigation'>(.+?)<\/div>/s", "$1", $out);

  return "<div class="pagination"><ul>{$out}</ul></div>";
}

add_filter( 'wp_pagenavi', 'wd_pagination', 10, 2 );

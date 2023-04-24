<?php

function my_bcn_remove_item($bcnObj){
  if (is_page()) {
    if( $bcnObj->trail[1] && $bcnObj->trail[1]->get_title()== '削除したいタイトル' ){
      unset($bcnObj->trail[1]);
      $bcnObj->add(new bcn_breadcrumb('STATICタイトル', '<li><a href="%link%">%htitle%</a></li>', [], 'https://www.example.jp', null, true));
      $bcnObj_tmp = clone $bcnObj->trail[0];
      $bcnObj->trail[0] = $bcnObj_tmp;
      
      return $bcnObj;
    }
  }
}

function my_bcn_remove_item_supports_multiple_successors($bcnObj){
  if( is_page() ){
    $current_index = array_reduce(range(0, count($bcnObj->trail)), function($acc, $i) use($bcnObj) {
      if ($bcnObj->trail[$i] && $bcnObj->trail[$i]->get_title()== '削除したいタイトル') {
        unset($bcnObj->trail[$i]);
        $acc = $i;
      }
      return $acc;
    }, 0);

    $bcnObj->add(new bcn_breadcrumb('STATICタイトル', '<li><a href="%link%">%htitle%</a></li>', [], 'https://www.example.jp', null, true));

    array_map(function($cur, $index) use ($bcnObj) {
      $bcnObj_tmp = clone $bcnObj->trail[0];
      $bcnObj->trail[0] = $bcnObj_tmp;
    }, range(0, $current_index-1), range(1, $current_index));

    return $bcnObj;
  }
}

add_action('bcn_after_fill', 'my_bcn_remove_item');

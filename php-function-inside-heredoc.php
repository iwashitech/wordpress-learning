<?php

$cb = function ($fn) { return $fn; };

echo <<<HTML
  <div class="hello-world">
    <p class="hello-world__txt">
      {$cb(strtoupper('hello world!'))}
    </p>
  </div>
HTML;
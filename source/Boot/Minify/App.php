<?php
 /**if (strpos(url(), "localhost")) {
   
     * 192.168.1.1
     * CSS
     
    $minCSS = new MatthiasMullie\Minify\CSS();
    $minCSS->add(__DIR__ . "/../../../shared/styles/boot.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/style.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/message.css");

    //theme CSS
 //   $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css");
   // foreach ($cssDir as $css) {
    //    $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
    //    if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            //$minCSS->add($cssFile);
     //   }
  //  }

  //Minify CSS
   $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/style.css");

*/
    /**
     * JS
     
    $minJS = new MatthiasMullie\Minify\JS();
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/scripts.js");
    //theme CSS
  //  $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js");
  //  foreach ($jsDir as $js) {
   //     $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/{$js}";
  //      if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
   //         $minJS->add($jsFile);
  //      }
   // }

    //Minify JS
  $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/scripts.js");
}*/
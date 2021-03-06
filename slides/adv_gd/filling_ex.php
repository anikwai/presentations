<?php

    define("WIDTH", 450);
    define("HEIGHT", 450);

    $piegraph_data = array (10, 5, 20, 40, 10, 15);
    
    $img = imagecreate(WIDTH, HEIGHT);
    
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);
    
    $center_x = (int)WIDTH/2;
    $center_y = (int)HEIGHT/2;
    
    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    $last_angle = 0;
    
    foreach($piegraph_data as $percentage) {
        $arclen = (360 * $percentage) / 100;
        imagefilledarc($img,
                       $center_x,
                       $center_y,
                       WIDTH-20,
                       HEIGHT-20,
                       $last_angle,
                       ($last_angle + $arclen),
                       imagecolorallocate($img, rand(0, 0xFF), rand(0, 0xFF), rand(0, 0xFF)),
                       IMG_ARC_PIE);
        $last_angle += $arclen;
    }

    header("Content-Type: image/png");
    imagepng($img);


?>
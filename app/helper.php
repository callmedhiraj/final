<?php


function imageUrl($path, $width = NULL, $height = NULL, $quality = NULL, $crop = NULL)
{

    if (!$width && !$height) {
        $url = env('IMAGE_URL') . $path;
    } else {
        $url = url('/') . '/timthumb.php?src=' . env('IMAGE_URL') . $path;
        if (isset($width)) {
            $url .= '&w=' . $width;
        }
        if (isset($height) && $height > 0) {
            $url .= '&h=' . $height;
        }
        if (isset($crop)) {
            $url .= '&zc=' . $crop;
        } else {
            $url .= '&zc=1';
        }
        if (isset($quality)) {
            $url .= '&q=' . $quality . '&s=1';
        } else {
            $url .= '&q=95&s=1';
        }
    }

    return $url;
}





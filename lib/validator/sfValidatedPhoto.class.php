<?php

/**
 * sfValidatedFile represents a validated uploaded photo and can generate the related thumbnails
 *
 * @author graphifox
 */
class sfValidatedPhoto extends sfValidatedFile {

    public function generateFilename() {
        return "uploaded" . $this->getExtension($this->getOriginalExtension());
    }

    // if width is less 555 then if height is greater than 400 then fix the height to 400 and calculate the ratio for the height (repeat)
    // if width is less 555 then if height is less than 400 then simply save the image without resizing
    // if both dimensions are bigger than the set ones then simply choose the smallest and then use its set size and calculator the other        
    public function resizePhoto($file_mode = 0666, $width = 555, $height = 400) {
        $photoInfo = getimagesize($this->getPath() . $this->generateFilename());

        if ($photoInfo) {
            $w = $photoInfo[0];
            $h = $photoInfo[1];
            $newHeight = "";
            $newWidth = "";

            if ($w < $h && $h > $height) {
                $newHeight = $height;
                $newWidth = ($height * $w) / $h;
            } elseif ($h > $w && $w > $width) {
                $newWidth = $width;
                $newHeight = ($width * $h) / $w;
            } elseif ($w <= $width && $h <= $height) {
                $newWidth = $w;
                $newHeight = $h;
            } elseif ($w <= $width && $h > $height) {
                $newWidth = ( $height * $h) / $w;
                $newHeight = $height;
            } elseif ($w > $width && $h <= $height) {
                $newWidth = $width;
                $newHeight = ($width * $w) / $h;
            } elseif ($w > $width && $h > $height) {
                if ($w > $h) {
                    $newWidth = ($height * $w) / $h;
                    $newHeight = $height;
                } else {
                    $newWidth = $width;
                    $newHeight = ($width * $h) / $w;
                }
            }

            $resized_photo = $this->getPath() . 'normal-resized' . $this->getExtension($this->getOriginalExtension());

            $thumbnail = new sfThumbnail($newWidth, $newHeight, false, true, 100, 'sfImageMagickAdapter');
            $thumbnail->loadFile($this->getPath() . $this->generateFilename());

            $thumbnail->save($resized_photo, $photoInfo["mime"]);
            chmod($resized_photo, $file_mode);
        }
    }

}
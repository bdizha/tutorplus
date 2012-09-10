<?php

/**
 * sfValidatedFile represents a validated uploaded photo and can generate the related thumbnails
 *
 * @author graphifox
 */
class sfValidatedPhoto extends sfValidatedFile
{

    public function generateFilename()
    {
        return "uploaded" . $this->getExtension($this->getOriginalExtension());
    }

    // if width is less 555 then if height is greater than 400 then fix the height to 400 and calculate the ratio for the height (repeat)
    // if width is less 555 then if height is less than 400 then simply save the image without resizing
    // if both dimensions are bigger than the set ones then simply choose the smallest and then use its set size and calculator the other        
    public function resizePhoto($file_mode = 0666, $width = 555, $height = 400)
    {
        $photo_info = getimagesize($this->getPath() . $this->generateFilename());
        
        if ($photo_info)
        {
            $w = $photo_info[0];
            $h = $photo_info[1];
            $new_height = "";
            $new_width = "";

            if ($w <= $width && $h <= $height)
            {
                $new_width = $w;
                $new_height = $h;
            }
            elseif ($w <= $width && $h > $height)
            {
                $new_width = ( $height * $h) / $w;
                $new_height = $height;
            }
            elseif ($w > $width && $h <= $height)
            {
                $new_width = $width;
                $new_height = ($width * $w) / $h;
            }
            elseif ($w > $width && $h > $height)
            {
                if ($w > $h)
                {
                    $new_width = ($height * $w) / $h;
                    $new_height = $height;
                }
                else
                { 
                    $new_width = $width;
                    $new_height = ($width * $h) / $w;
                }
            }

            $resized_photo = $this->getPath() . 'normal-resized' . $this->getExtension($this->getOriginalExtension());

            $thumbnail = new sfThumbnail($new_width, $new_height, false, true, 100, 'sfImageMagickAdapter');
            $thumbnail->loadFile($this->getPath() . $this->generateFilename());

            $thumbnail->save($resized_photo, $photo_info["mime"]);
            chmod($resized_photo, $file_mode);
        }
    }

}
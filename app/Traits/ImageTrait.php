<?php

namespace Stoneworking\Traits;

trait ImageTrait
{
    /**
     * Remove spaces and replace with dashes,
     * remove begining space, lowercase name,
     *
     * @param string $filename
     * @return string
     */
    public static function sanitizeName($filename)
    {
        $trimed = trim($filename);
        $lowercase = strtolower($trimed);
        $fileSanitized = str_replace(' ', '-', $lowercase);

        return $fileSanitized;
    }

    /**
     * Adds suffix to filename Example: image.jpg to image-thumbnail.jpg
     *
     * @param string $filename
     * @param string $fileExtension
     * @param string $suffix
     * @return string
     */
    public static function setSuffix($filename, $fileExtension, $suffix='')
    {
        return str_replace(".{$fileExtension}","-{$suffix}.{$fileExtension}",$filename);
    }

    /**
     * Remove extension to filename Example: image.jpg to image
     *
     * @param string $filename
     * @param string $fileExtension
     * @return string
     */
    public static function removeExtension($filename, $fileExtension)
    {
        return str_replace(".{$fileExtension}", '', $filename);
    }
}
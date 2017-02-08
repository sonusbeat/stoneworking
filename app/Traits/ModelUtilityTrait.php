<?php

namespace Stoneworking\Traits;

trait ModelUtilityTrait
{
    /**
     * Select resource by permalink
     *
     * @param string $permalink
     * @return Object
     */
    public static function selected($permalink)
    {
        return static::where('permalink','=',$permalink)->first();
    }

    /**
     * Convert names to url friendly to seo
     * Example: My page to my-page
     *
     * @param string $permalink
     * @return string
     */
    public static function urlFriendly($permalink, $dashes = true)
    {
        $remove_dashes = ($dashes) ? str_replace('-', '', $permalink) : $permalink;
        $space_removed = str_replace(' ', '-', $remove_dashes);
        $lowercase = strtolower($space_removed);

        return $lowercase;
    }
}
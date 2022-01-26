<?php

if (!function_exists('url_get_contents')) {
    /**
     * Uses cURL rather than file_get_contents to make a request to the specified URL.
     * Needed because file_get_contents has some issues
     *
     * @param string $url The URL to which we're making the request.
     * @return   string    $output    The result of the request.
     */
    function url_get_contents($url)
    {
        if (!function_exists('curl_init')) {
            die('The cURL library is not installed.');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}


if (! function_exists('hash_url')) {
    /**
     * Generate a hashed URL to a file (needed as a workaround to enable font preloads(
     *
     * @param string $url The URL which should be hashed
     * @return   string    The URL with a hash
     */
    function hash_url($url)
    {
        return "$url?".hash_file('md4', public_path($url));
    }
}

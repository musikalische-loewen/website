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

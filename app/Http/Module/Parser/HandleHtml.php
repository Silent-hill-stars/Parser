<?php


namespace App\Http\Module\Parser;


abstract class HandleHtml
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string[]
     */
    private $pattern;

    /**
     * @param $url
     * @return array
     */
    protected function getConnectUrl($url):array
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [
            'content' => $content,
            'status' => $status
        ];
    }

    /**
     * @param $content
     * @param $pattern
     * @return array
     */
    protected function getResultSearchPattern($content, $pattern):array
    {
        preg_match_all($pattern, $content, $matches);

        return $matches;
    }
}

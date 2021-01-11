<?php


namespace App\Http\Module\Parser;


interface InterfaceParser
{
    /**
     * @return Parser
     */
    public static function getInstance():Parser;

    /**
     * @param $url
     * @param $namePattern
     * @param null $pattern
     * @return array|bool
     */
    public function init($url, $namePattern, $pattern=null);
}

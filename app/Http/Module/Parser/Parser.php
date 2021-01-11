<?php


namespace App\Http\Module\Parser;


class Parser extends HandleHtml implements InterfaceParser
{
    /**
     * @var Parser
     */
    private static $instance;

    /**
     * @var string[]
     */
    protected $pattern;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    /**
     * @return Parser
     */
    public static function getInstance():Parser
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        }

        return self::$instance = new self;
    }

    /**
     * @param $namePattern
     * @param $pattern
     */
    protected function setPattern($namePattern, $pattern):void
    {
        $this->pattern[$namePattern] = $pattern;
    }

    /**
     * @param $namePattern
     * @return string|bool
     */
    protected function getPattern($namePattern):string
    {
        return $this->pattern[$namePattern]?:false;
    }

    protected function setRegularDopDomain()
    {

    }

    /**
     * @param $url
     * @param $namePattern
     * @param $pattern
     * @return string
     */
    private function handleRequestController($url, $namePattern, $pattern):string
    {
        $this->url = $url;

        if (is_null($pattern)){
            return $this->pattern[$namePattern];
        }

        $this->setPattern($namePattern, $pattern);

        return $this->pattern[$namePattern];
    }

    /**
     * @param $link
     * @return false|int
     */
    protected function checkDomain($link)
    {
        return preg_match("~$this->url~", $link);
    }

    protected function parse($url, $usesPattern)
    {

    }

    /**
     * @param $url
     * @param $namePattern
     * @param null $pattern
     * @return array|bool
     */
    public function init($url, $namePattern, $pattern=null)
    {
        $usesPattern = $this->handleRequestController($url, $namePattern, $pattern);
        $url = $this->url;

        return $this->parse($url, $usesPattern);

    }
}

<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Request\Validate;
use App\Http\Module\Parser\Parser;

class ParseController extends Controller
{
    /**
     * @param Validate $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function action(Validate $request):\Illuminate\Http\JsonResponse
    {
        $domain = $request->input('domain');
        $parser = Parser::getInstance()->init($domain, 'link', "/https?:\/\/?[\w-]{1,32}\.[\w-]{1,32}[^\s@][^\"'><]*/");

        $this->data = $parser;
        return $this->response();
    }
}

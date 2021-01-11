<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($status = 200):\Illuminate\Http\JsonResponse
    {
        return response()->json($this->data, $status);
    }
}

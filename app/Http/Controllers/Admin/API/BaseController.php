<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Responses\BaseApiResponse;

abstract class BaseController extends Controller
{
    protected BaseApiResponse $response;

    public function __construct()
    {
        $this->response = new BaseApiResponse();
    }
}

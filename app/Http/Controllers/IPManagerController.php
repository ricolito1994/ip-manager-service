<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IPAddress;
use Illuminate\Http\JsonResponse;

class IPManagerController extends Controller
{
    //
    public function index(Request $request): JsonResponse 
    {
        try {
            return response() -> json ([
                "message" => "Successes.",
                "success" => true
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }


    public function find(int $index): JsonResponse 
    {
        try {
            return response() -> json ([
                "message" => "Success.",
                "success" => true
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }

    public function create (Request $request): JsonResponse  
    {
        try {
            return response() -> json ([
                "message" => "Success.",
                "success" => true
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }

    public function update(IPAddress $ip, Request $request): JsonResponse 
    {
        try {
            return response() -> json ([
                "message" => "Success.",
                "success" => true
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }

    public function kill (IPAddress $ip) 
    {
        try {
            return response() -> json ([
                "message" => "Success.",
                "success" => true
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }
}

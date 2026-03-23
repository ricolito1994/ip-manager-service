<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IPAddressRequest;
use App\Models\IPAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IPManagerController extends Controller
{
    //
    public function index(Request $request): JsonResponse 
    {
        try {
            $ipaddress = IPAddress::filter($request)
                ->orderBy('updated_at','desc')
                ->paginate(10);
            return response() -> json ([
                "data" => $ipaddress,
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


    public function find(int $id): JsonResponse 
    {
        try {
            $ipaddress = IPAddress::findOrFail($id);
            return response() -> json ([
                "message" => "Success.",
                "success" => true,
                "data" => $ipaddress
            ], 200);
        } catch (\Exception $e) {
            return response() -> json ([
                "message" => "Something went wrong.",
                "reason" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }

    public function create (IPAddressRequest $request): JsonResponse  
    {
        try {
            $data = $request->validated();

            IPAddress::updateOrCreate([
                "ip_address" => $data['ip_address']
            ], $data);
            
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

    public function update(IPAddressRequest $request, IPAddress $ip): JsonResponse 
    {
        try {
            $ip->update($request->validated());
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
            $ip->delete();
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

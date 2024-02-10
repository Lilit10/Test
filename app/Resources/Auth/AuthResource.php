<?php

namespace App\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request):array
    {
        return[
            'token_type' => $this->resource['token_type'],
            'expires_in' => $this->resource['expires_in'],
            'access_token' => $this->resource['access_token'],
            'refresh_token' => $this->resource['refresh_token']
        ];
    }
}

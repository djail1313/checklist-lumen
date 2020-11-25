<?php


namespace App\Http\Requests\Templates;


use Illuminate\Http\Request;

class CreateRequest extends Request
{

    public function getData()
    {
        return request()->query();
    }



}

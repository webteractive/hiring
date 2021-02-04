<?php

namespace App;

use Illuminate\Support\Arr;

class Company
{
    protected $details;

    public function __construct() {
        $this->details = json_decode(file_get_contents(config('app.company')), true);
    }

    public function get($key)
    {
        return Arr::get($this->details, $key);
    }

    public function addressLine1()
    {
        return $this->get('address.line1');
    }

    public function address($key)
    {
        return $this->get("address.{$key}");
    }
}
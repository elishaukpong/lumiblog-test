<?php

namespace App\Service;

use App\Models\Url;

class CompositionService
{

    private static $lastId = null;
    private $data = [];

    private function __construct(string $uri)
    {
        if(self::$lastId === null) {
            self::$lastId = Url::first();
        }
//      try to use cookies sent from the front end
    }

    public static function initiate(string $uri): self
    {
        return new self($uri);
    }

    public function findNextVersionToShow(): int
    {
        return 1;
    }

    public function retrieve($value, $fallback = '')
    {

        if(! $this->$value){
            return $fallback;
        }

        return $this->$value;

    }

    public function __get($attribute)
    {
        if(! array_key_exists($attribute, $this->data)){
            return false;
        }

        return $this->data[$attribute];
    }
}

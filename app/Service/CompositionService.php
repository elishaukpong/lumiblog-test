<?php

namespace App\Service;

use App\Models\Url;
use App\Models\VariantComposition;

class CompositionService
{

    protected string $uri;
    protected VariantComposition $variant;
    private Url $urlRecord;

    private function __construct(string $uri)
    {
        $this->uri = $uri;
        $this->urlRecord = Url::wherePath($this->uri)->first();
        $this->variant = $this->getVersionToShow();

        $this->urlRecord->recordLastVisited($this->variant);
    }

    public static function initiate(string $uri): self
    {
        return new self($uri);
    }

    private function getVersionToShow(): VariantComposition
    {
        if($this->urlRecord->isFirstVisit()) {
            return $this->urlRecord->compositions()->first();
        }

        return $this->urlRecord->compositions()
            ->where('id','>', $this->urlRecord->last_id)
            ->first()
            ?? $this->urlRecord->compositions()->first();
    }

    public function __get($attribute)
    {
        $attribute = "{$attribute}_id";

        if(! property_exists($this->variant->composition_values, $attribute)){
            return false;
        }

        return $this->variant->composition_values->$attribute;
    }

    //    public function retrieve($value, $fallback = '')
//    {
//        if(! $this->$value){
//            return $fallback;
//        }
//
//        return $this->$value;
//
//    }

}

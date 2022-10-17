<?php

namespace App\Service;

use App\Models\Url;
use App\Models\VariantComposition;

class CompositionService
{

    protected string $uri;
    protected VariantComposition $variant;
    private $data = [];
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

    public function getVersionIdToShow(): int
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

    private function getVersionToShow()
    {

        if($this->urlRecord->isFirstVisit()) {
            return $this->urlRecord->compositions()->first();
        }

        return $this->urlRecord->compositions()
            ->whereId($this->getVersionIdToShow())
            ->first();
    }
}

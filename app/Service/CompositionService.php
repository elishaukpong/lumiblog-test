<?php

namespace App\Service;

use App\Models\Url;
use App\Models\UserComposition;
use App\Models\VariantComposition;
use Illuminate\Http\Request;

class CompositionService
{

    protected string $uri;
    protected ?VariantComposition $variant;
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

    public static function persistVariant(Request $request)
    {
        ;
        UserComposition::create([
            'composition_id' => '',
            'user_tag' => $request->header('x-fingerprint')
        ]);


    }

    private function getVersionToShow(): ?VariantComposition
    {

        if($this->urlRecord->isFirstVisit()) {
            $variant = $this->urlRecord->compositions()->first();

            $this->setSessionDataFor($variant);
            return $variant;
        }

        if($sessionData = $this->sessionHasPersistedVariant()){
            return $this->urlRecord->compositions()
                ->whereId($sessionData['variant_id'])
                ->first();
        }

        $variant =  $this->urlRecord->compositions()
            ->where('id','>', $this->urlRecord->last_id)
            ->first()
            ?? $this->urlRecord->compositions()->first();

        $this->setSessionDataFor($variant);
        return $variant;

    }

    public function __get($attribute)
    {
        $attribute = "{$attribute}_id";

        if(! property_exists($this->variant->composition_values, $attribute)){
            return false;
        }

        return $this->variant->composition_values->$attribute;
    }

    /**
     * @param $variant
     * @return void
     */
    public function setSessionDataFor(?VariantComposition $variant): void
    {
        if(is_null($variant)){
            return;
        }
        $composition = collect(request()->session()->get('composition'));

        $composition->add([
            'token' => request()->session()->get('_token'),
            'variant_id' => $variant->id,
            'url_id' => $this->urlRecord->id
        ]);

        request()->session()->put('composition', $composition->toArray());
    }

    private function sessionHasPersistedVariant()
    {
        if(! request()->session()->has('composition')) {
            return false;
        }

        return collect(request()->session()->get('composition'))
            ->first(fn($composition) => $composition['url_id'] === $this->urlRecord->id);
    }

}

//todo explore google analytics user_id

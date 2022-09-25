<?php

namespace App\Http\Services;

use App\Http\Controllers\Todo\Enumerations\TodoStatusEnum;
use ReflectionClass;

class EnumerationService
{
    public function enumerationsToArray($enumerations)
    {
           $enumerationValues = new ReflectionClass($enumerations);
           $toArray = [];
           foreach ($enumerationValues->getConstants() as $key => $enumerationValue){
                $toArray[$enumerationValue] = $key;
           }
           return $toArray;
    }

    public function enumerationTranslator($translateKey, array $values = [])
    {
        return __('words.'.$translateKey, $values);

    }
}
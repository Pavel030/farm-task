<?php

namespace App;

/**
 *  Provides paths to farm, fair and warehouse data.
 */
class Path
{
    const PROJECT_ROOT = __DIR__;
    const ANIMAL_FAIR = self::PROJECT_ROOT . '\data\animals-fair.json';
    const ANIMAL_ON_FARM = self::PROJECT_ROOT . '\data\animals-on-farm.json';
    const WAREHOUSE = self::PROJECT_ROOT . '\data\warehouse.json';
}

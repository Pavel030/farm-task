<?php

namespace App;

use App\Services\AnimalsBuyer;
use App\Services\Milkmaid;
use App\Services\Shepherd;
use App\Services\Stockman;

/**
 *  FarmFacade hides the technical specification algorithm.
 */
class FarmFacade
{
    /**
     *  Actions performed:
     *  Calls static methods of farm employees in the order described in the task
     *
     * @return void
     */
    public static function run(): void
    {
        AnimalsBuyer::buyAnimals(['Cow' => 10, 'Chicken' => 20]);

        Shepherd::generateReport();

        Milkmaid::collectProducts();

        Stockman::generateReport();

        AnimalsBuyer::buyAnimals(['Pig' => 10, 'Duck' => 5]);

        Shepherd::generateReport();

        Milkmaid::collectProducts();

        Stockman::generateReport();

    }
}
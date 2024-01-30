<?php

namespace App\Services;

/**
 *  Class describes the functions of a milkmaid.
 *  She knows how to collect the products of any animal from the fair.
 *  She reports this to her boss using a standard report.
 */
class Shepherd extends Workers
{
    /**
     * Generates a report on the current count of animals on the farm.
     *
     * @return void
     */
    public static function generateReport(): void
    {
        $farm_data = static::getData(static::$farmDataPath);

        $report = "Chief, i'm Shepherd, this is all our animals:\n";

        foreach ($farm_data as $animal_name => $animals) {
            $total_animals = count($animals);
            $report .= "$animal_name: $total_animals\n";
        }
        echo $report;
    }
}


<?php

namespace App\Services;
/**
 *  Class describes the functions of a stockman.
 *  His only task is to report to the boss about the availability of goods in the warehouse.
 */
class Stockman extends Workers
{
    /**
     * Generates a report on the current stock in the warehouse.
     *
     * @return void
     */
    public static function generateReport(): void
    {
        $warehouse = static::getData(static::$warehousePath);
        $message = "Chief, i'm Stockman, this is all we have:\n";

        foreach ($warehouse as $product => $quantity) {
            $message .= "$product: $quantity\n";
        }
        echo $message;
    }
}


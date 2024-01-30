<?php

namespace App\Services;

/**
 *  Class describes the functions of a milkmaid.
 *  She knows how to collect the products of any animal from the fair.
 *  She reports this to her boss using a standard report.
 */
class Milkmaid extends Workers
{
    /**
     * Collects products from farm animals based on fair data and updates the warehouse.
     * The collection is simulated for a weekly period (7 days).
     * And gives a report to the boss.
     *
     * @return void
     */
    public static function collectProducts(): void
    {
        $fair_data  = static::getData(static::$fairDataPath);
        $farm_data = static::getData(static::$farmDataPath);
        $warehouse_data = static::getData(static::$warehousePath);

        foreach ($fair_data  as $animal_prototype) {
            $animal_name = $animal_prototype['species'];

            if (isset($farm_data[$animal_name])) {
                $total_product_quantity = 0;

                foreach ($farm_data[$animal_name] as $animal) {
                    $product_quantity = rand($animal_prototype['production_range'][0], $animal_prototype['production_range'][1]);
                    $total_product_quantity += $product_quantity;
                }

                if (isset($warehouse_data[$animal_prototype['product']])) {
                    $warehouse_data[$animal_prototype['product']] += 7 * $total_product_quantity;
                } else {
                    $warehouse_data[$animal_prototype['product']] = 7 * $total_product_quantity;
                }
            }
        }

        static::putData(static::$warehousePath, $warehouse_data);
        static::getProgressReport('milkmaid');
    }
}

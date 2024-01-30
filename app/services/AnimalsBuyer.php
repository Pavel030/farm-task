<?php

namespace App\Services;

/**
 *  Class describes the functions of an animal buyer.
 *  He goes to the fair and buys animals to order.
 *  He reports this to her boss using a standard report.
 */
class AnimalsBuyer extends Workers
{
    /**
     * Buys animals for the farm based on the specified quantities.
     *
     * @param array $animal_quantities An associative array where keys are animal type
     *                                 and values are the desired quantities.
     *
     * @return void
     */
    public static function buyAnimals(array $animal_quantities): void
    {
        $fair_data = static::getData(static::$fairDataPath);
        $farm_data = static::getData(static::$farmDataPath);

        foreach ($animal_quantities as $animal_name => $quantity) {
            foreach ($fair_data as $animal_prototype) {
                if ($animal_prototype['species'] === $animal_name) {
                    for ($i = 1; $i <= $quantity; $i++) {
                        $unique_id = self::generateUniqueId($farm_data, $animal_name);
                        $farm_data[$animal_name][] = ['id' => $unique_id];
                    }
                }
            }
        }
        static::putData(static::$farmDataPath, $farm_data);
        static::getProgressReport('animal buyer');
    }

    /**
     * Generates a unique ID for an animal based on existing IDs.
     *
     * @param array|null $farm_data The farm data containing information about existing animals.
     * @param string $animal_type The type of the animal for which to generate the unique ID.
     *
     * @return int|void The generated unique ID.
     */
    private static function generateUniqueId(?array $farm_data, string $animal_type)
    {
        if (is_array($farm_data) && count($farm_data) !== 0) {
            $existing_animals = $farm_data[$animal_type] ?? [];
            $used_ids = array_column($existing_animals, 'id');
            do {
                $new_id = mt_rand(1, PHP_INT_MAX);
            } while (in_array($new_id, $used_ids));
        } else {
            $new_id = mt_rand(1, PHP_INT_MAX);
        }
        return $new_id;
    }
}

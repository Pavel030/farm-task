<?php

namespace App\Services;

use App\Path;

/**
 *  FarmFacade hides the technical specification algorithm.
 */
class Workers
{
    protected static string $farmDataPath = Path::ANIMAL_ON_FARM;
    protected static string $fairDataPath = Path::ANIMAL_FAIR;
    protected static string $warehousePath = Path::WAREHOUSE;

    /**
     * Returns an array if data is successfully decoded from the source, or null if an error occurs.
     *
     * @param string $source The source file path to read data from.
     *
     * @return array|null
     */
    protected static function getData(string $source): ?array
    {
        return json_decode(file_get_contents($source), true);
    }

    /**
     * Calls static methods of farm employees in the order described in the task.
     *
     * @param string $path The target file path to write data to.
     * @param mixed $content The data to be encoded and written to the file.
     *
     * @return void
     */
    protected static function putData(string $path, mixed $content): void
    {
        file_put_contents($path, json_encode($content, JSON_PRETTY_PRINT));
    }

    /**
     * Creates a template report for workers who do not have a unique report form.
     *
     * @param string $worker The position of the worker.
     *
     * @return void
     */
    protected static function getProgressReport(string $worker): void
    {
        echo "Chief, I'm $worker, I did everything.\n";
    }

}
<?php

namespace App\Services\Common\Command;

use Illuminate\Support\Facades\Artisan;

class ArtisanService
{
    /**
     * Client form string container
     *
     * @var string $command
     */
    private string $command;

    /**
     * Set the string container
     */
    public function __construct(string $command)
    {
        $this->command = $command;
    }

    /**
     * Get data from database according routes
     *
     * @return array
     */
    public function getResponse(): array
    {
        switch ($this->command) {
            case 'clear-cache':
                $response = $this->clearCache();
                break;
            case 'clear-configuration':
                $response = $this->config();
                break;
            case 'optimize':
                $response = $this->optimize();
                break;
            case 'cache-icons':
                $response = $this->cacheIcons();
                break;
            case 'clear-cache-icons':
                $response = $this->clearCacheIcons();
                break;
        }

        if ($response["success"] === true) {
            $result = [
                'status' => 200,
                'message' => $response["message"],
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => 'Something went wrong!',
            ];
        }

        return $result;
    }

    /**
     * Execute the artisan command
     *
     * @return array
     */
    private function clearCache(): array
    {
        try {
            // Clear route cache
            Artisan::call('route:clear');

            // Optimize route cache
            Artisan::call('route:cache');

            // Clear view cache
            Artisan::call('view:clear');

            // Optimize view cache
            Artisan::call('view:cache');

            return ["success" => true, "message" => "Successfully cleared & created route view cache"];
        } catch (\Exception $e) {
            return "fail";
        }
    }

    /**
     * Execute the artisan command
     *
     * @return array
     */
    private function optimize(): array
    {
        Artisan::call('optimize');

        return ["success" => true, "message" => "Successfully cached the framework bootstrap files"];
    }

    /**
     * Execute the artisan command
     *
     * @return array
     */
    private function config(): array
    {
        Artisan::call('config:clear');

        return ["success" => true, "message" => "Configuration cache cleared successfully"];
    }

    /**
     * Execute the artisan command
     *
     * @return array
     */
    private function cacheIcons(): array
    {
        Artisan::call('icons:cache');

        return ["success" => true, "message" => "Successfully generated blade icons manifest file"];
    }

    /**
     * Execute the artisan command
     *
     * @return array
     */
    private function clearCacheIcons(): array
    {
        Artisan::call('icons:clear');

        return ["success" => true, "message" => "Successfully cleared blade icons manifest file!"];
    }
}

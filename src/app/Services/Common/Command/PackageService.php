<?php

namespace App\Services\Common\Command;

use Illuminate\Http\Request;

class PackageService
{
    /**
     * Client form string container
     *
     * @var Request $request
     */
    private Request $request;

    /**
     * Set the Request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get data from database according routes
     *
     * @return array
     */
    public function getResponse(): array
    {
        $response = $this->installPackage();

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
     * Execute the composer package require command
     *
     * @return array
     */
    private function installPackage()
    {
        // Get the package name from the request (you can implement security checks here)
        $packageName = $this->request->input('package_name');

        // Execute the composer require command
        $output = shell_exec('composer require ' . $packageName);

        return ["success" => true, "message" => "Successfully installed package: " . $packageName . "."];
    }
}

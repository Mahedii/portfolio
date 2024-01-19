<?php

namespace App\Services\v1\Measurement;

use Exception;
use App\Models\Unit\Unit;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UnitsService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    private $measurementUnits;

    /**
     * Set the request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get response
     *
     * @return array
     */
    public function getResponse(): array
    {
        // $validated = $this->validateData($this->request);

        // if ($validated) {
        //     $response = $this->cargoInfoAddData($this->request);
        // }

        $response = $this->checkCrudMethod($this->request->type);

        return $response;
    }

    /**
     * check crud method type
     *
     * @return array
     */
    private function checkCrudMethod($type)
    {
        $response = null;
        switch ($type) {
            case 'read':
                $response = $this->readMethod();
                break;
            case 'create':
                $response = $this->createMethod();
                break;
            case 'update':
                $response = $this->updateMethod();
                break;
            case 'delete':
                $response = $this->deleteMethod();
                break;
            case 'change-status':
                $response = $this->changeStatusMethod();
                break;
        }

        return $response;
    }

    /**
     * read Method
     *
     * @return array
     */
    private function readMethod()
    {
        try {
            if (isset($this->request->id) && $this->request->id !== null) {
                $result = [
                    'status' => 200,
                ];
            } else {
                $result = [
                    'status' => 200,
                    'measurementUnits' => Unit::get()
                ];
            }
            return $result;
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * create Method
     *
     * @return array
     */
    private function createMethod()
    {
        try {
            DB::transaction(function () {
                // Your existing code within the transaction
                $slug = $this->generateSlug($this->request->unit);

                Unit::create([
                    'unit_name' => $this->request->unit,
                    'slug' => $slug
                ]);
            });

            $result = [
                'status' => 200,
                'message' => "Measurement Unit " . $this->request->unit . " added successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Measurement Unit " . $this->request->unit . " could not be added",
            ];
        }

        return $result;
    }

    /**
     * update Method
     *
     * @return array
     */
    private function updateMethod()
    {
        try {
            DB::transaction(function () {
                $measurementUnits = Unit::find($this->request->id);
                $measurementUnits->unit_name = $this->request->unit;
                $measurementUnits->slug = $this->generateSlug($this->request->unit);

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($measurementUnits);
                // Log::info(json_encode($changesToSave));

                // Update the changed values only if there are changes to save
                if (!empty($changesToSave)) {
                    $measurementUnits->update($changesToSave);
                }
            });

            $result = [
                'status' => 200,
                'message' => "Measurement Unit " . $this->request->unit . " updated successfully",
            ];
        } catch (\Exception $e) {
            Log::error($e);
            $result = [
                'status' => 500,
                'message' => "Measurement Unit " . $this->request->unit . " could not be updated",
            ];
        }

        return $result;
    }

    /**
     * delete Method
     *
     * @return array
     */
    private function deleteMethod()
    {
        return [];
    }

    /**
     * change Status Method
     *
     * @return array
     */
    private function changeStatusMethod()
    {
        try {
            DB::transaction(function () {
                $measurementUnits = Unit::find($this->request->id);
                if ($measurementUnits) {
                    $status = ($measurementUnits->status == "1") ? "0" : "1";
                    $measurementUnits->update(["status" => $status]);
                }
            });

            $result = [
                'status' => 200,
                'message' => "Status updated successfully",
            ];
        } catch (\Exception $e) {
            Log::error($e);
            $result = [
                'status' => 500,
                'message' => "Status could not be updated",
            ];
        }

        return $result;
    }

    private function checkForDirtyData($model)
    {
        $changes = $model->getDirty();
        $changesToSave = [];

        foreach ($changes as $attribute => $value) {
            if ($value !== null && !empty($value)) {
                $changesToSave[$attribute] = $value;
            }
        }

        return $changesToSave;
    }

    /**
     * generate slug
     *
     * @return string
     */
    public static function generateSlug($name): string
    {
        $slug = Str::slug($name);

        if (Unit::where('slug', Str::slug($name))->exists()) {
            $original = $slug;

            $count = 1;

            while (Unit::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}

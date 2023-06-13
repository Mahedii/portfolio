<?php

namespace App\Services\Backend\Common\Ajax;

use App\Enums\Tables;
use App\Enums\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ValidationDataService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    /**
     * Set the request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the data validated according to its class
     *
     * @return array
     */
    public function getResponse(): array
    {
        $tableSecretKey = Crypt::decryptString($this->request->secret_key);

        // #### Method 1 ####
        // #### Get value from config/const.php ####
        foreach (config('const.Tables') as $key => $data) {
            // Check if the $tableSecretKey value matches with the const Tables key
            if ($tableSecretKey === $key) {
                // Get the value of const Requests key
                $requestClass = config('const.Requests.' . $key);
            }
        }

        return $this->ajaxValidation($requestClass);
    }

    /**
     * Perform AJAX validation for a single input
     *
     * @param string $requestClass
     * @return array
     */
    private function ajaxValidation(string $requestClass): array
    {
        $rules = [];
        $messages = [];
        $fieldName = $this->request->field;
        $value = $this->request->value;

        if (class_exists($requestClass)) {
            // Instantiate the form request class based on the specified $requestClass
            $formRequest = new $requestClass();

            if (method_exists($formRequest, 'rules')) {
                // Get the validation rules for the specified field
                $rules = $formRequest->rules();

                // Get the specific rule for the field
                $fieldRules = $rules[$fieldName] ?? [];

                // Create a temporary array with the validation rules for the specified field
                $tempRules = [$fieldName => $fieldRules];
            }

            if (method_exists($formRequest, 'messages')) {
                // Get the validation messages for the specified field
                $messages = $formRequest->messages();
            }

            // Create a temporary array with the validation messages for the specified field
            // $tempMessages = [$fieldName . '.' . $rules[$fieldName]];
        }
        // Create a validator instance for the specified field
        $validator = Validator::make([$fieldName => $value], $tempRules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            $errors = $validator->errors();

            $result = ['success' => false, 'errors' => $errors];
        } else {
            $result = ['success' => true];
        }

        // Validation passed, return success response
        return $result;
    }
}

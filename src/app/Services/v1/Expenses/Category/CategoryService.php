<?php

namespace App\Services\v1\Expenses\Category;

use Auth;
// use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Expenses\Category\Category;
use Illuminate\Support\Facades\Validator;

class CategoryService
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
                break;
            case 'delete':
                break;
        }

        return $response;
    }

    /**
     * read
     *
     * @return array
     */
    private function readMethod()
    {
        return [
            'status' => 200,
            'categories' => Category::select("*")->where('parent_id', null)->orderBy('id', 'desc')->get()
        ];
    }

    /**
     * create
     *
     * @return array
     */
    private function createMethod()
    {
        $slug = $this->generateSlug($this->request->category);
        $response = Category::create([
            'category_name' => $this->request->category,
            'slug' => $slug
        ]);

        if ($response) {
            $result = [
                'status' => 200,
                'message' => "Category " . $this->request->category . " added successfully",
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => "Category " . $this->request->category . " could not be added",
            ];
        }

        return $result;
    }

    /**
     * generate slug
     *
     * @return string
     */
    public static function generateSlug($name): string
    {
        $slug = Str::slug($name);

        if (Category::where('slug', Str::slug($name))->exists()) {
            $original = $slug;

            $count = 1;

            while (Category::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}

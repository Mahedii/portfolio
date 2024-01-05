<?php

namespace App\Services\v1\SubCategory;

use Auth;
// use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\Category\CategoryParentTree;

class SubCategoryService
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
        if ($this->request->id !== null) {
            return [
                'status' => 200,
                // 'subcategories' => SubCategory::with('category')->orderBy('id', 'desc')->get(),
                'subcategories' => Category::getSelectedSubcategoriesWithCategory($this->request->id)
            ];
        } else {
            return [
                'status' => 200,
                // 'subcategories' => SubCategory::with('category')->orderBy('id', 'desc')->get(),
                'subcategories' => Category::getSubcategoriesWithCategory()
            ];
        }
    }

    /**
     * create
     *
     * @return array
     */
    private function createMethod()
    {
        $slug = $this->generateSlug($this->request->subcategory);
        $createCategory = Category::create([
            'parent_id' => $this->request->category_id,
            'category_name' => $this->request->subcategory,
            'slug' => $slug
        ]);

        if ($createCategory) {
            $this->updateCategoryParentTree($createCategory->id, $this->request->parents);
            $result = [
                'status' => 200,
                'message' => "SubCategory " . $this->request->subcategory . " added successfully",
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => "Category " . $this->request->category . " could not be added",
            ];
        }

        return $result;
    }

    private function updateCategoryParentTree($categoryId, $newParentIds)
    {
        // Check if there are existing records for the given $categoryId
        $categoryParentTree = CategoryParentTree::where('category_id', $categoryId)->first();

        if ($categoryParentTree) {
            // // If records exist, concatenate existing parents with the new $newParentId
            // $parents = $categoryParentTree->parents . ',' . $newParentIds;

            // // Update the existing record
            // $categoryParentTree->update(['parents' => $parents]);
        } else {
            // If no records exist, create a new record with $newParentId
            CategoryParentTree::create([
                'parents' => $newParentIds,
                'category_id' => $categoryId,
            ]);
        }
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

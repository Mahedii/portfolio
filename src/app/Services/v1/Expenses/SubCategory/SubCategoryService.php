<?php

namespace App\Services\v1\Expenses\SubCategory;

use Auth;
// use Validator;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Expenses\Category\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Expenses\SubCategory\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\Expenses\Category\CategoryParentTree;

class SubCategoryService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    private $category;

    /**
     * Set the request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        // $this->category = new Category();
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
     * create Method
     *
     * @return array
     */
    private function createMethod()
    {
        try {
            DB::transaction(function () {
                // Your existing code within the transaction
                $slug = $this->generateSlug($this->request->subcategory);

                $createCategory = Category::create([
                    'parent_id' => $this->request->category_id,
                    'category_name' => $this->request->subcategory,
                    'slug' => $slug
                ]);

                // if ($createCategory) {
                //     $this->updateCategoryParentTree($createCategory->id, $this->request->parents);
                // } else {
                //     // If there's an issue with creating the category, throw an exception to roll back the transaction
                //     throw new Exception("Category creation failed");
                // }
            });

            $result = [
                'status' => 200,
                'message' => "SubCategory " . $this->request->subcategory . " added successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "SubCategory " . $this->request->subcategory . " could not be added",
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
                $category = Category::find($this->request->id);
                $category->parent_id = $this->request->category_id;
                $category->category_name = $this->request->subcategory;

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($category);
                // Log::info(json_encode($changesToSave));

                // Update the category only if there are changes to save
                if (!empty($changesToSave)) {
                    if (array_key_exists('category_name', $changesToSave)) {
                        $changesToSave["slug"] = $this->generateSlug($this->request->subcategory);
                    }

                    $updateCategory = Category::where('id', $this->request->id)->update($changesToSave);
                    // if ($updateCategory) {
                    //     $this->updateCategoryParentTree($this->request->id, $this->request->parents);
                    // } else {
                    //     // If there's an issue with updating the category, throw an exception to roll back the transaction
                    //     throw new Exception("Subcategory update failed");
                    // }
                }
            });

            $result = [
                'status' => 200,
                'message' => "SubCategory " . $this->request->subcategory . " updated successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "SubCategory " . $this->request->subcategory . " could not be updated",
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
        try {
            DB::transaction(function () {
                $category = Category::find($this->request->id);
                $deleteCategory = $category->delete();
                if (!$deleteCategory) {
                    // If there's an issue with deleting the category, throw an exception to roll back the transaction
                    throw new Exception("Subcategory " . $this->request->category_name . " delete failed");
                }
            });

            $result = [
                'status' => 200,
                'message' => "SubCategory " . $this->request->category_name . " deleted successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "SubCategory " . $this->request->id . " could not be deleted",
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

    private function updateCategoryParentTree($categoryId, $parentIds)
    {
        // Check if there are existing records for the given $categoryId
        $categoryParentTree = CategoryParentTree::where('category_id', $categoryId)->first();

        if ($categoryParentTree) {
            $categoryParentTree->parents = $parentIds;
            $categoryParentTree->category_id = $categoryId;

            // Check if any values have changed and are not null
            $changesToSave = $this->checkForDirtyData($categoryParentTree);
            if (!empty($changesToSave)) {
                // Update the existing record
                $categoryParentTree->update($changesToSave);
            }
        } else {
            // If no records exist, create a new record with $parentIds
            CategoryParentTree::create([
                'parents' => $parentIds,
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

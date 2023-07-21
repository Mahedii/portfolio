<?php

namespace App\Http\Controllers\Backend\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\Common\UpdateDataAndRedirectService;

class UpdateDataAndRedirectController extends Controller
{
    private $updateDataAndRedirectService;

    /**
     * Fetch expected data
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $urlPrefix = "Backend.pages.";
            $pathUrl = $urlPrefix . $request->route_path;
            $this->updateDataAndRedirectService = new UpdateDataAndRedirectService($request);
            $response = $this->updateDataAndRedirectService->getResponse();

            if ($response["status"] == 200) {
                if (view()->exists($pathUrl)) {
                    // return view($pathUrl)->with('crudMsg', 'Data Updated Successfully');
                    return redirect()->back()->with('crudMsg', 'Data Updated Successfully');
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

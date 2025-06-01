<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BusinessRepository;
class BusinessController extends Controller
{
    //
    public function view(Request $request) {
        try {
            return view("admin.business.index", []);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }

    public function list(Request $request) {
        try {
            $data = $request->all();
            $list = BusinessRepository::list($request);
            return $this->json("Fetch business successfully.", [
                "business" => $list,
            ]);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }

    public function delete(Request $request) {
        try {
            BusinessRepository::delete($request);
            return $this->json("Business delete successfully.", []);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }

    public function updateStatus(Request $request) {
        try {
            $data = $request->all();
            $business = BusinessRepository::updateStatus($data);
            return $this->json("Business status updated successfully.", [
                "business" => $business,
            ]);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }
}

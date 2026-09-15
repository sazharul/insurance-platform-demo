<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\CoverageArea;
use App\Models\ProductServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductAndServiceManagementController extends Controller {
    public function servicesCreate() {
        return view('backend.product.services.create');
    }

    public function servicesStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:product_services',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $service                          = new ProductServices();
        $service->en_service_name         = $request->en_service_name;
        $service->bn_service_name         = $request->bn_service_name;
        $service->en_title                = $request->en_title;
        $service->bn_title                = $request->bn_title;
        $service->en_short_description    = $request->en_short_description;
        $service->bn_short_description    = $request->bn_short_description;
        $service->hero_image              = ImageUpload::imageUpload($request->file('hero_image'), 'backend/img/hero-image/');
        $service->white_icon              = ImageUpload::imageUpload($request->file('white_icon'), 'backend/img/white-image/');
        $service->color_icon              = ImageUpload::imageUpload($request->file('color_icon'), 'backend/img/color-image/');
        $service->image                   = ImageUpload::imageUpload($request->file('image'), 'backend/img/images/');
        $service->insurance_process_image = ImageUpload::imageUpload($request->file('insurance_process_image'), 'backend/img/insurance-process-image/');
        $service->status                  = $request->status;
        $service->save();

        return redirect(route('admin.product_service.services.manage'))->with('message', 'Product Service Created Successfully');
    }

    public function index() {
        $data             = [];
        $data['services'] = ProductServices::latest()->get();

        return view('backend.product.services.index', $data);
    }

    public function edit($id) {
        $service = ProductServices::findOrFail($id);

        return view('backend.product.services.edit', [
            'service' => $service,
        ]);
    }

    public function delete(Request $request, $id) {
        $service                 = ProductServices::where('id', $id)->first();
        $image                   = public_path($service->image);
        $hero_image              = public_path($service->hero_image);
        $white_icon              = public_path($service->white_icon);
        $color_icon              = public_path($service->color_icon);
        $insurance_process_image = public_path($service->insurance_process_image);

        if (File::exists($image)) {
            File::delete($image);
        }

        if (File::exists($hero_image)) {
            File::delete($hero_image);
        }

        if (File::exists($white_icon)) {
            File::delete($white_icon);
        }

        if (File::exists($color_icon)) {
            File::delete($color_icon);
        }

        if (File::exists($insurance_process_image)) {
            File::delete($insurance_process_image);
        }

        $service->delete();

        return redirect(route('admin.product_service.services.manage'))->with('message', 'Product Service Deleted Successfully');
    }

    public function update(Request $request, $id) {
        $service                          = ProductServices::find($id);
            $service->en_service_name         = $request->en_service_name;
        $service->bn_service_name         = $request->bn_service_name;
        $service->en_title                = $request->en_title;
        $service->bn_title                = $request->bn_title;
        $service->en_short_description    = $request->en_short_description;
        $service->bn_short_description    = $request->bn_short_description;
        $service->hero_image              = ImageUpload::imageUpload($request->file('hero_image'), 'backend/img/hero-image/', isset($id) ? ProductServices::find($id)->hero_image : null);
        $service->white_icon              = ImageUpload::imageUpload($request->file('white_icon'), 'backend/img/white-image/', isset($id) ? ProductServices::find($id)->white_icon : null);
        $service->color_icon              = ImageUpload::imageUpload($request->file('color_icon'), 'backend/img/color-image/', isset($id) ? ProductServices::find($id)->color_icon : null);
        $service->image                   = ImageUpload::imageUpload($request->file('image'), 'backend/img/images/', isset($id) ? ProductServices::find($id)->image : null);
        $service->insurance_process_image = ImageUpload::imageUpload($request->file('insurance_process_image'), 'backend/img/insurance-process-image/', isset($id) ? ProductServices::find($id)->insurance_process_image : null);
        $service->status                  = $request->status;
        $service->save();

        return redirect(route('admin.product_service.services.manage'))->with('message', 'Product Service Updated Successfully');

    }

    public function coverageCreate() {
        $data                     = [];
        $data['product_services'] = ProductServices::all();

        return view('backend.product.coverage.create', $data);
    }

    public function coverageStore(Request $request) {
        $coverage                       = new CoverageArea();
        $coverage->product_service_id   = $request->product_service_id;
        $coverage->en_title             = $request->en_title;
        $coverage->bn_title             = $request->bn_title;
        $coverage->en_short_description = $request->en_short_description;
        $coverage->bn_short_description = $request->bn_short_description;
        $coverage->white_image          = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/white-image/');
        $coverage->color_image          = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/color-image/');
        $coverage->save();

        return redirect(route('admin.product_service.coverage.manage'))->with('message', 'Product Coverage Data Created Successfully');
    }

    public function coverageIndex() {
        $data              = [];
        $data['coverages'] = CoverageArea::latest()->get();

        return view('backend.product.coverage.index', $data);
    }

    public function coverageEdit($id) {
        $data                     = [];
        $data['product_services'] = ProductServices::all();
        $data['coverage']         = CoverageArea::find($id);

        return view('backend.product.coverage.edit', $data);
    }

    public function coverageUpdate(Request $request, $id) {
        $coverage                       = CoverageArea::findOrFail($id);
        $coverage->product_service_id   = $request->product_service_id;
        $coverage->en_title             = $request->en_title;
        $coverage->bn_title             = $request->bn_title;
        $coverage->en_short_description = $request->en_short_description;
        $coverage->bn_short_description = $request->bn_short_description;
        $coverage->white_image          = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/white-image/', isset($id) ? CoverageArea::find($id)->white_image : null);
        $coverage->color_image          = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/color-image/', isset($id) ? CoverageArea::find($id)->color_image : null);
        $coverage->save();

        return redirect(route('admin.product_service.coverage.manage'))->with('message', 'Product Coverage Data Updated Successfully');
    }

    public function coverageDelete(Request $request, $id) {
        $coverage    = CoverageArea::where('id', $id)->first();
        $white_image = public_path($coverage->white_image);
        $color_image = public_path($coverage->color_image);

        if (File::exists($white_image)) {
            File::delete($white_image);
        }

        if (File::exists($color_image)) {
            File::delete($color_image);
        }

        $coverage->delete();

        return redirect(route('admin.product_service.coverage.manage'))->with('message', 'Coverage Data Deleted Successfully');

    }

}

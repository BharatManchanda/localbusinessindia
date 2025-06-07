@include("landing.business.constant.index")
@extends('layouts.genernal')

@section('title', 'Business Create | Local Business India')
@section('import.header.files')
    <link rel="stylesheet" href="{{url('/assets/css/businessadd.css')}}">
@endsection
@section('content')
    <div class="container form-container p-5">
		<h2 class="page-title text-center">List Your Business</h2>
		<p class="page-subtitle text-center">Fill Your Details</p>

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="hidden" class="form-control" name="id" placeholder="Enter business name*" required>
                <input type="text" class="form-control" name="name" placeholder="Enter business name*" required oninput="createOrEdit.onChange('name', this.value)" >
                <span id="nameHelpInline" class="form-text text-danger"></span>
            </div>
            
            <div class="col-md-6 mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter business email*" required oninput="createOrEdit.onChange('email', this.value)">
                <span id="emailHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="tel" class="form-control" name="phone" placeholder="Enter Phone *" required oninput="createOrEdit.onChange('phone', this.value)">
                <span id="phoneHelpInline" class="form-text text-danger"></span>
            </div>
            
            <div class="col-md-6 mb-3">
                <input type="url" class="form-control" name="website" placeholder="Enter website" required oninput="createOrEdit.onChange('website', this.value)">
                <span id="websiteHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <select class="form-select form-control" name="category_id" required oninput="createOrEdit.onChange('category_id', this.value)">
                    <option value="" selected disabled>Business category *</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <span id="category_idHelpInline" class="form-text text-danger"></span>
            </div>
            
            <div class="col-md-6 mb-3">
                <select class="form-select form-control" name="sub_category_id" id="sub_category_id" required oninput="createOrEdit.onChange('sub_category_id', this.value)">
                    <option value="" selected disabled>Business Sub category *</option>
                </select>
                <span id="sub_category_idHelpInline" class="form-text text-danger"></span>
            </div>
            
            <div class="col-md-6 mb-3">
                <select class="form-select form-control" name="city" required oninput="createOrEdit.onChange('city', this.value)">
                    <option value="" selected disabled>Select city*</option>
                    <option value="bathinda">Bathinda</option>
                </select>
                <span id="cityHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 mb-3">
                <textarea class="form-control" placeholder="Enter business address here*" name="business_address" required oninput="createOrEdit.onChange('business_address', this.value)"></textarea>
                <span id="business_addressHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="url" class="form-control" name="instagram_url" placeholder="Enter Instagram page url" oninput="createOrEdit.onChange('instagram_url', this.value)">
                <span id="instagram_urlHelpInline" class="form-text text-danger"></span>
            </div>
            
            <div class="col-md-6 mb-3">
                <input type="url" class="form-control" name="facebook_url" placeholder="Enter facebook page url" oninput="createOrEdit.onChange('facebook_url', this.value)">
                <span id="facebook_urlHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 mb-3">
                <label class="upload-label d-block">Upload your business logo here <span class="upload-note">(logo must be
                    uploaded in either .jpg, .png, .png or .webp formats only)</span></label>
                <input type="file" class="form-control" name="business_logo" accept=".jpg,.jpeg,.png,.webp" oninput="createOrEdit.onChange('business_logo', this.files[0])">
                <span id="business_logoHelpInline" class="form-text text-danger"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="declaration" required onchange="createOrEdit.onChange('declaration', this.checked ? 1 : 0)">
                    <label class="form-check-label checkbox-text" for="declaration">
                        I hereby declare that the information I have submitted is true and accurate, to the best of
                        my knowledge. I also give Mother #Intech Pvt. Ltd. permission to list my business publicly
                        on all their platforms.
                    </label>
                    <span id="declarationHelpInline" class="form-text text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn submit-btn" id="save-btn" onclick="createOrEdit.onSubmit()">
                    <span id="create-or-edit-loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    Save
                </button>
            </div>
        </div>
	</div>
@endsection
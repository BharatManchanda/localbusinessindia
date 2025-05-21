<?php

namespace App\Repositories;

use App\Models\Business;
use Illuminate\Support\Str;

class BusinessRepository
{
    /**
     * Store a new business record.
     */
    public function save(array $data): Business {
        // Handle file upload
        // if (isset($data['business_logo']) && $data['business_logo']->isValid()) {
        //     $file = $data['business_logo'];
        //     $fileName = time() . '_' . Str::slug($data['name']) . '.' . $file->getClientOriginalExtension();
        //     $filePath = $file->storeAs('business_logos', $fileName, 'public');

        //     $data['logo_path'] = $filePath;
        // }
        
        // Generate a slug if not passed
        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Remove unnecessary fields
        unset($data['business_logo'], $data['declaration']);

        return Business::create($data);
    }
}

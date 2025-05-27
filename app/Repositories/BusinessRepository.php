<?php

namespace App\Repositories;

use App\Models\Business;

class BusinessRepository
{
    /**
     * Store a new business record.
     */
    public static function save(array $data): Business {
        $data['address'] = $data['business_address'] ?? null;

        if ($data['id'] && $data['id'] != null) {
            $business = Business::find($data['id']);
            $business->update($data);

            if (isset($data['business_logo']) && $data['business_logo']->isValid()) {
                $existingMedia = $business->media()->first();
                if ($existingMedia) {
                    MediaRepository::update($existingMedia, $data['business_logo'], 'business_logo');
                } else {
                    MediaRepository::create($data['business_logo'], $business, 'business_logo');
                }
            }
        } else {
            $business = Business::create($data);

            if (isset($data['business_logo']) && $data['business_logo']->isValid()) {
                MediaRepository::create($data['business_logo'], $business, 'business_logo');
            }
        }

        return $business;
    }

    public function getList($data) {
        $business = Business::pagininate(10);
        return $business;
    }
}

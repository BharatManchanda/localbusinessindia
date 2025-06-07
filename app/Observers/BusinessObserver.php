<?php

namespace App\Observers;

use App\Models\{User, Business};
use Illuminate\Support\Facades\Hash;

class BusinessObserver
{
    /**
     * Handle the Business "created" event.
     */
    public function created(Business $business): void {
        User::create([
            "name" => $business->name,
            "email" => $business->email,
            "role" => "business",
            "email_verified_at" => false,
            "password" => Hash::make($business->password ?? ""),
        ]);
    }

    /**
     * Handle the Business "updated" event.
     */
    public function updated(Business $business): void {
        //
    }

    /**
     * Handle the Business "deleted" event.
     */
    public function deleted(Business $business): void
    {
        //
    }

    /**
     * Handle the Business "restored" event.
     */
    public function restored(Business $business): void
    {
        //
    }

    /**
     * Handle the Business "force deleted" event.
     */
    public function forceDeleted(Business $business): void
    {
        //
    }
}

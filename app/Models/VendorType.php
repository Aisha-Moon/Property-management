<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    use HasFactory;

    protected $table='vendor_types';
    static public function get_record($request) {
        return self::select('vendor_types.*')
            ->orderBy('vendor_types.id', 'desc')
            ->where('is_delete', 0)
            ->get(); // Execute the query and return the results
    }


    static public function get_single($id){
        return self::find($id);
    }
}

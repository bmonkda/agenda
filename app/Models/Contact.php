<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    
    /* protected $fillable = [
        'first_name',
        'last_name',
        'organization_id',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country_id',
        'postal_code',
    ]; */

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    /* Query Scope */
    // se llama en ContactController como filter sin el scope al inicio
    public function scopefilter($query, $filters){
        $query->when($filters['search'] ?? null, function($query, $search){
            $query->where('first_name', 'LIKE', "%" . $search . "%")
                ->orWhere('last_name', 'LIKE', "%" . $search . "%")
                ->orWhere('city', 'LIKE', "%" . $search . "%")
                ->orWhere('phone', 'LIKE', "%" . $search . "%")
                ->orWhere('email', 'LIKE', "%" . $search . "%")
                ->orWhereHas('organization', function($query) use ($search){
                    $query->where('name', 'LIKE', "%" . $search . "%");
                });
        });
    }

}

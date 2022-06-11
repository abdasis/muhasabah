<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function contactType()
    {
        return $this->hasMany(ContactType::class);
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: function () {
                return "{$this->first_name} {$this->last_name}";
            }
        );
    }

    public function status(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->deleted_at == null ? 'Active' : 'Inactive';
            }
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}

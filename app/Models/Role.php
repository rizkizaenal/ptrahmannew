<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Define the table name if it's not plural of the model name
    protected $table = 'roles';

    // You can define the fillable properties
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class); // Define the relationship back to User
    }
}

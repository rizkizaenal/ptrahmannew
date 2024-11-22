<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins'; // Specify the table if it's not the plural of the model name

    protected $fillable = [
        'name', // Add your fields here
        'email',
        // Other fields...
    ];
}

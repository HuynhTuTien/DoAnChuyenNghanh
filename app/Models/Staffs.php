<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Staffs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'phone', 'address', 'position', 'salary'
    ];

    public static function createNewStaff($validatedData)
    {
        $imagePath = $validatedData['image']->store('images', 'public');
        $imageName = basename($imagePath);

        return self::create([
            'name' => $validatedData['name'],
            'image' => $imageName,
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'position' => $validatedData['position'],
            'salary' => $validatedData['salary'],
        ]);
    }

    public function updateNewStaff($validatedData)
    {
        if (isset($validatedData['image'])) {
            $imagePath = $validatedData['image']->store('images', 'public');
            $validatedData['image'] = basename($imagePath);
        }
        return $this->update($validatedData);
    }
}

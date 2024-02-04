<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed',
    ];

    public function toggleComplete(): bool
    {
        $this->completed = !$this->completed;
        return $this->save();
    }
}

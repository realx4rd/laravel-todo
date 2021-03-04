<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todo';
   	protected $fillable = ['name','author','status','priority','due_date'];
   	
   	//items
   	public function items()
   	{
   		return $this->hasMany(Item::class);
   	}



    protected $dates = ['due_date'];
   	protected $casts = [
   		'due_date' => 'date:Y-m-d'
   	];

}

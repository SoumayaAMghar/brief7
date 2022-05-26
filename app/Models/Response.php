<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable=[
        'response' ,
        'user_id' ,
        'ticket_id' ,
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

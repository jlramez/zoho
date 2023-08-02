<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'params';

    protected $fillable = ['id','code','redirect_url','client_id','client_secret','grant_type','refresh_token'];
	
}

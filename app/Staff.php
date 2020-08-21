<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    //model
    //ชื่อตารางในฐานข้อมูล
protected $table = "staffs";
//ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
protected $fillable = ["#","name","age","salary","phone","actions"];    
//Primary Key
 	protected $primaryKey = "id";
}

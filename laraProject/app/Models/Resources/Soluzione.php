<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Soluzione extends Model
{
     protected $table = 'soluzioni';
     protected $primaryKey = 'ID';
     public $timestamps = true;

     public function malfunzionamento(){
          return $this->belongsTo(Malfunzionamento::class, 'malfunzionamentoID');
      }
}

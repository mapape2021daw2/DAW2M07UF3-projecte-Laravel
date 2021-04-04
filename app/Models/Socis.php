<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socis extends Model{
    protected $fillable = [
        'nif', 
        'nom', 
        'cognoms', 
        'adreca', 
        'poblacio', 
        'comarca', 
        'telf_fixe', 
        'telf_mobil', 
        'correu',
        'quota',
        'aportacio'
    ];    
}
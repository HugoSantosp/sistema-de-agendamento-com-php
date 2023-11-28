<?php

namespace App\Entities;


class Unit extends MybaseEntity
{
     protected $casts = [
      'services' => '?json-array',
     ];

    


}

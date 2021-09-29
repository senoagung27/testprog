<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class IDuser extends Model
{
    use AutoNumberTrait;
    protected $guarded = [];
    protected $primaryKey = 'id_user';
    protected $primaryKey2 = 'id_petugas';
    public $incrementing = false;

    // public function getAutoNumberOption() {
    //     return [
    //         'id_user' => [
    //             'format' => 'P'.'?',
    //             'length' => 5
    //         ]
    //     ];
    // }

    public function getAutoNumberOptions()
    {
        return [
            'id_user' => [
                'format' => 'P?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }
    public function getAutoNumberOptions2()
    {
        return [
            'id_petugas' => [
                'format' => 'P?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }
}

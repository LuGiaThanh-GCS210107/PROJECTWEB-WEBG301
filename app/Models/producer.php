<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    public $id;
    public $name;

    function __construct()
    {
        $name = "";
    }
}

?>
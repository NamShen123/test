<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Course extends Model
{
    use HasFactory;

    protected $table = 'Course';

    


    const STATUS_ACTIVE = 'active';
    const STATUS_DEACTIVE = 'deactive';

    const STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_DEACTIVE
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code', 'name', 'start_date', 'end_date', 'status',
    ];



}
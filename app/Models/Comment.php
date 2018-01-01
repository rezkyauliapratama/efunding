<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models
 * @version January 1, 2018, 9:05 am UTC
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'article_id',
        'comment',
        'post_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'article_id' => 'integer',
        'comment' => 'string',
        'post_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'comment' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class, 'article_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChannelSourceModel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = 'channel_data_source';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'id',
        'channel_id',
        'url',
        'extra_data',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

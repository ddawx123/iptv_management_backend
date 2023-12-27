<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChannelModel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = 'channels';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'id',
        'title',
        'country',
        'province',
        'genre',
        'logo',
        'type',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * 播放源关联
     * @return HasMany
     */
    public function channel(): HasMany
    {
        return $this->hasMany(ChannelSourceModel::class, 'channel_id', 'id');
    }
}

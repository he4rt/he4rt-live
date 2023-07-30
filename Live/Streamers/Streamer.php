<?php

namespace Live\Streamers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Live\Integrations\StreamingPlatformEnum;

class Streamer extends Model
{
    use HasFactory;

    protected $table = 'streamers';

    protected $fillable = [
        'provider',
        'username',
        'avatar_url',
        'last_seen',
        'is_online'
    ];

    protected $casts = [
        'provider' => StreamingPlatformEnum::class,
        'is_online' => 'bool'
    ];

    protected static function newFactory(): StreamerFactory
    {
        return StreamerFactory::new();
    }
}

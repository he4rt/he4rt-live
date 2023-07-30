<?php

namespace Live\Streamers;

use Illuminate\Database\Eloquent\Factories\Factory;

class StreamerFactory extends Factory
{
    protected $model = Streamer::class;
    public function definition(): array
    {
        return [
            'provider',
            'username',
            'avatar_url',
            'last_seen'
        ];
    }
}

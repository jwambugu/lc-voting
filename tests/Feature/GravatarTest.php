<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'JWambugu',
            'email' => 'ajay@test.com'
        ]);

        $gravatarURL = $user->getAvatar();
        $expectedGravatarURL = 'https://www.gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png';

        $this->assertEquals($expectedGravatarURL, $gravatarURL);

        $response = Http::get($gravatarURL);
        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_z()
    {
        $user = User::factory()->create([
            'name' => 'JWambugu',
            'email' => 'zjay@test.com'
        ]);

        $gravatarURL = $user->getAvatar();
        $expectedGravatarURL = 'https://www.gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png';

        $this->assertEquals($expectedGravatarURL, $gravatarURL);

        $response = Http::get($gravatarURL);
        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_0()
    {
        $user = User::factory()->create([
            'name' => 'JWambugu',
            'email' => '0jay@test.com'
        ]);

        $gravatarURL = $user->getAvatar();
        $expectedGravatarURL = 'https://www.gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png';

        $this->assertEquals($expectedGravatarURL, $gravatarURL);

        $response = Http::get($gravatarURL);
        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_9()
    {
        $user = User::factory()->create([
            'name' => 'JWambugu',
            'email' => '9jay@test.com'
        ]);

        $gravatarURL = $user->getAvatar();
        $expectedGravatarURL = 'https://www.gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png';

        $this->assertEquals($expectedGravatarURL, $gravatarURL);

        $response = Http::get($gravatarURL);
        $this->assertTrue($response->successful());
    }
}

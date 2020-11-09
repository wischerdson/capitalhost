<?php

namespace Tests\Feature\Guest\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\User;

class SignInTest extends TestCase
{	
	public function testSignInPageShowing()
	{
		$response = $this->get(route('account.home'));
		$response->assertStatus(200);
		$response->assertViewIs('guest.templates.sign-in');
	}

	public function testCanUserSignInWithCorrectCredentials()
	{
		$user = factory(User::class)->create();

		$response = $this->post('https://cp.'.env('APP_URL').'/auth/sign-in', [
			'email' => $user->email,
			'password' => $user->password
		]);

		$response->assertStatus(200);
		$this->assertEquals($response['status'], 'success');
		$this->assertAuthenticatedAs($user, 'user');
	}

	/**
	 * @dataProvider credentialsProvider
	 */
	public function testCanNotUserSignInWithIncorrectCredentials($email, $password)
	{
		$response = $this->post('https://cp.'.env('APP_URL').'/auth/sign-in', [
			'email' => $email,
			'password' => $password
		]);

		$this->assertEquals($response['status'], 'error');
		$this->assertEquals($response['code'], 13031);

		$response->assertStatus(200);
	}

	public function credentialsProvider()
	{
		return [
			['example@email.com', Str::random()],
			[null, null],
			['', '']
		];
	}
}

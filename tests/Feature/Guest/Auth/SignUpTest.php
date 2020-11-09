<?php

namespace Tests\Feature\Guest\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use Faker\Factory;
use Auth;

class SignUpTest extends TestCase
{
	public function testAuthenticatedUserCanNotViewSignUpPage()
	{
		$user = factory(User::class)->create();
		$response = $this->actingAs($user, 'user')->get(route('guest.auth.sign-up.index'));
		$response->assertRedirect(route('account.home'));
	}

	public function testSignUpPageShowing()
	{
		$response = $this->get(route('guest.auth.sign-up.index'));
		$response->assertStatus(200);
		$response->assertViewIs('guest.templates.sign-up');
	}

	public function testCanUserSignUp()
	{
		$user = factory(User::class)->make()->makeVisible('password');

		$response = $this->post(route('guest.auth.sign-up.store'), $user->toArray());
		$response->assertStatus(200);
		$this->assertEquals($response['status'], 'success');

		$user = User::where('email', $user->email)->find($response['user_id']);
		$this->assertNotNull($user);
	}

	public function testCanNotUserSignUpWithExistingData()
	{
		$existingUser = factory(User::class)->create();
		$user = factory(User::class)->make([
			'email' => $existingUser->email
		]);

		$response = $this->post(route('guest.auth.sign-up.store'), $user->toArray());
		$response->assertStatus(200);
		$this->assertEquals($response['status'], 'error');
		$this->assertEquals($response['code'], 13030);

		$user = factory(User::class)->make([
			'company' => $existingUser->company
		]);

		$response = $this->post(route('guest.auth.sign-up.store'), $user->toArray());
		$response->assertStatus(200);
		$this->assertEquals($response['status'], 'error');
		$this->assertEquals($response['code'], 13033);
	}

	public function testCanUserSignUpWithLogo()
	{
		$logo = UploadedFile::fake()->image('cats.jpg', 300, 500, 'cats');
		$user = factory(User::class)->make()->makeVisible('password');
		$user->logo = $logo;

		$response = $this->post(route('guest.auth.sign-up.store'), $user->toArray());
		$response->assertStatus(200);

		$savedUser = User::find($response['user_id']);
		$this->assertNotNull($savedUser);
		$this->assertNotNull($savedUser->logo);
	}

	public function testUCFirstLetterUserFullName()
	{
		$faker = Factory::create();
		$user = factory(User::class)->make([
			'first_name' => strtolower($faker->firstName),
			'last_name' => strtolower($faker->lastName),
		]);

		$this->assertSame($user->first_name[0], strtoupper($user->first_name[0]));
		$this->assertSame($user->last_name[0], strtoupper($user->last_name[0]));
	}
}

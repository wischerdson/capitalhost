<?php

namespace Tests\Feature\Guest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
	public function testHomePageShowing()
	{
		$response = $this->get(route('guest.home'));
		$response->assertStatus(200);
		$response->assertViewHas('plansCategories');
		$response->assertViewIs('guest.templates.home');
	}
}

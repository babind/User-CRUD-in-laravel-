<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'name'=>$faker->name(),
				'email'=>$faker->email(),
				'password'=>$faker->numerify('hello###'),
				'street_address'=>$faker->streetAddress(),
				'city'=>$faker->city(),
				'state'=>$faker->state(),
				'zip_code'=>$faker->postcode(),
				'country'=>$faker->country(),
				'mobile_number'=>$faker->phoneNumber(),
				'verification_code'=>$faker->md5(),
				'is_verified'=>$faker->boolean()
				

			]);
		}
	}

}
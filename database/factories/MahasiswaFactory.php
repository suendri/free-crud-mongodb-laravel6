<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mahasiswa;
use Faker\Generator as Faker;

$factory->define(Mahasiswa::class, function (Faker $faker) {
	return [
		'mhsw_nim' => $faker->creditCardNumber,
		'mhsw_nama' => $faker->name,
		'mhsw_alamat' => $faker->address,
		'mhsw_prodi' => $faker->sentence($nbWords = 3, $variableNbWords = true),
	];
});

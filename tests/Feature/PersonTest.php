<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    public function testPerson()
    {
        $person = new Person();
        $person->first_name = "Marcell";
        $person->last_name = "Budi";
        $person->save();

        self::assertEquals("MARCELL Budi", $person->full_name);

        $person->full_name = "Suyud Setiawan";
        $person->save();

        self::assertEquals("SUYUD", $person->first_name);
        self::assertEquals("Setiawan", $person->last_name);
    }

    public function testAttributeCasting()
    {
        $person = new Person();
        $person->first_name = "Marcell";
        $person->last_name = "Budi";
        $person->save();

        self::assertNotNull($person->created_at);
        self::assertNotNull($person->updated_at);
        self::assertInstanceOf(Carbon::class, $person->created_at);
        self::assertInstanceOf(Carbon::class, $person->updated_at);
    }

    public function testCustomCasts()
    {
        $person = new Person();
        $person->first_name = "Marcell";
        $person->last_name = "Budi";
        $person->address = new Address("Jalan Belum Jadi", "Jakarta", "Indonesia", "11111");
        $person->save();

        self::assertNotNull($person->created_at);
        self::assertNotNull($person->updated_at);
        self::assertInstanceOf(Carbon::class, $person->created_at);
        self::assertInstanceOf(Carbon::class, $person->updated_at);
        self::assertEquals("Jalan Belum Jadi", $person->address->street);
        self::assertEquals("Jakarta", $person->address->city);
        self::assertEquals("Indonesia", $person->address->country);
        self::assertEquals("11111", $person->address->postal_code);
    }
}


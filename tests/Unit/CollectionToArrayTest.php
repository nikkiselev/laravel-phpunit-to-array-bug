<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollectionToArrayTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_converts_nested_objects_that_are_an_instance_of_arrayable_to_an_array()
    {
        factory(User::class)->create();

        $users = User::get();

        // passed
        $this->assertInstanceOf(Arrayable::class, $users[0]);

        // Failed asserting that App\User Object is of type "array"
        $this->assertIsArray($users->toArray()[0]);

        // passed
        $this->assertIsArray($users->toArray()[0]->toArray());
    }
}

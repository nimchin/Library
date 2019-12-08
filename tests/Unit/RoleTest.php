<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Role;

class RoleTest extends TestCase
{
    public function testOne()
    {
        $result = Role::getRoleById(1);
        $this->assertTrue(is_string($result));
    }
    public function testTwo()
    {
        $result = Role::getRoleById('test');
        $this->assertFalse($result);
    }
}

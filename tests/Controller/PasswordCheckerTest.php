<?php

namespace App\Tests;
use PHPUnit\Framework\TestCase;
use App\PasswordChecker ;

class PasswordCheckerTest extends TestCase
{

    public function testPasswordOk(): void{

        $test = new PasswordChecker("AZERTYUIOPQS");
        $result = $test->checkLength() ;
        $this->assertTrue($result);

    }

    public function testPasswordNotOk(): void{

        $test = new PasswordChecker("AZERTYUIOP");
        $result = $test->checkLength() ;
        $this->assertFalse($result);

    }



}
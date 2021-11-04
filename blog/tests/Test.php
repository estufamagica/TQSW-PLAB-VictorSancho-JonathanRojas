<?php

namespace Tests;

use Jonap\TqswPlabVictorSanchoJonathanRojas\src\Model\DB;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    //Register
    public function testIncorrectPasswordRegister() {

        $stub = $this->createMock(DB::class);

        $stub->method('insert')
            ->willReturn('');

        $this->assertSame('false', $stub->register());
    }
    public function testIfExistsEmailRegister() {}
    public function testNotValidEmail() {}
    public function testRegistroCorrecto() {}
    public function testConfirmarPasswordRegistro() {}
    public function testRegistroVacioMostrarError() {}


    //Login
    public function testContrasenaIncorrectaLogin() {}
    public function testEmailIncorrectoLogin() {}
    public function testEmailCorrectoPeroContraseñaIncorrecta() {}
    public function testEmailInCorrectoPeroContraseñaCorrecta() {} //No sabemos si hace falta
    public function testLoginVacioMostrarError() {}
    public function testComprovarCamposCorrectosYLogear() {}



}
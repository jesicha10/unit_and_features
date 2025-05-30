<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AgeCalculatorTest extends TestCase
{
    #[Test]
    public function age_form_page_can_be_accessed()
    {
        $response = $this->get('/age');
        $response->assertStatus(200);
        $response->assertSee('Tanggal Lahir'); // atau isi form kamu
    }

    #[Test]
    public function it_calculates_age_and_displays_result()
    {
        $response = $this->post('/age', [
            'birthdate' => '2000-01-01',
        ]);

        $response->assertStatus(200);
        $response->assertSee('tahun');
        $response->assertSee('bulan');
        $response->assertSee('hari');
    }

    #[Test]
    public function it_validates_empty_birthdate()
    {
        $response = $this->from('/age')->post('/age', [
            'birthdate' => '',
        ]);

        $response->assertRedirect('/age');
        $response->assertSessionHasErrors('birthdate');
    }
}

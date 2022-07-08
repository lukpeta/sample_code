<?php

namespace Tests\Feature;

use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->refreshDatabase();
        $this->userRepository = app(UserRepositoryInterface::class);
        $this->seed('DatabaseSeeder');
        $this->company = $this->userRepository->findBy('is_company', true);
    }

    public function testCompanyVewIsWorkingCorrectly()
    {
        $response = $this->get(route('company', $this->company->slug));
        $response->assertSeeText('Nadaj przesyłkę');
        $response->assertStatus(200);
    }

    public function testSendContactForm()
    {
        $this->actingAs($this->company);
        $response = $this->post(route('contactWithCompany', $this->company->slug), [
            'name' => $this->faker->text(150),
            'email' => $this->faker->email,
            'theme' => $this->faker->text(150),
            'message' => $this->faker->text(500)
        ]);

        $response->assertSessionHas('success', 'Wiadomość została wysłana poprawnie!');
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }

    public function testPackageOrderForm()
    {
        $user = $this->userRepository->findBy('is_company', false);
        $this->actingAs($user);

        $response = $this->post(route('orderPackage', $this->company->slug), [
            'order_name' => $this->faker->firstName,
            'order_surname' => $this->faker->lastName,
            'order_address' => $this->faker->address,
            'order_city' => $this->faker->city,
            'building_number' => $this->faker->buildingNumber,
            'order_email' => $this->faker->email,
            'shipping_method' => 1,
            'package_type' => 1,
            'package_size' => 1,
            'order_sending_parcel' => 'RUM001',
            'order_recipient_parcel' => 'RUM001',
            'shipping_company' => 1,
            'user_id' => 1,
            'order_phone' => '111223344',
            'order_post_code' => $this->faker->postcode,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}

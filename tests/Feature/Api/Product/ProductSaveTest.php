<?php

namespace Tests\Feature\Api\Product;

use App\Models\Product\Product;
use Tests\TestCase;

class ProductSaveTest extends TestCase
{
    public function test_save_creates_new_Product()
    {
        $data = Product::factory()->make()->toArray();
        unset($data['id']);

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product', $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
                'result',
                'request_uuid',
                'data' => [
                    'id',
                ],
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $data['name']
        ]);
    }

    public function test_save_Product()
    {
        $data = Product::factory()->make()->toArray();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product', $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
                'result',
                'request_uuid',
                'data' => [
                    'id',
                ],
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $data['name']
        ]);
    }

    public function test_save_validates_required_fields()
    {
        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product', []);

        $response->assertStatus(422)
            ->assertJsonStructure(['errors' => ['name']]);
    }
}

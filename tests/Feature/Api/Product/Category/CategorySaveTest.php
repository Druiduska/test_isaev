<?php

namespace Tests\Feature\Api\Product\Category;

use App\Models\Product\Category;
use Tests\TestCase;

class CategorySaveTest extends TestCase
{
    public function test_save_creates_new_category()
    {
        $data = Category::factory()->make()->toArray();
        unset($data['id']);

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product/category', $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
                'result',
                'request_uuid',
                'data' => [
                    'id',
                ],
            ]);

        $this->assertDatabaseHas('categories', [
            'name' => $data['name']
        ]);
    }

    public function test_save_category()
    {
        $data = Category::factory()->make()->toArray();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product/category', $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
                'result',
                'request_uuid',
                'data' => [
                    'id',
                ],
            ]);

        $this->assertDatabaseHas('categories', [
            'name' => $data['name']
        ]);
    }

    public function test_save_validates_required_fields()
    {
        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->postJson('/api/product/category', []);

        $response->assertStatus(422)
            ->assertJsonStructure(['errors' => ['name']]);
    }
}

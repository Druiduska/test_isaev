<?php

namespace Tests\Feature\Api\Product;

use App\Models\Product\Product;
use Tests\TestCase;
use function PHPUnit\Framework\assertCount;

class ProductIndexTest extends TestCase
{
    public function test_index_returns_paginated_categories()
    {
        Product::factory()->count(15)->create();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->getJson('/api/products');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'result',
            'request_uuid',
            'data' => [
                [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ],
            ],
            'pagination' => [
                'total', 'count', 'per_page', 'current_page', 'total_pages'
            ],

        ]);
    }

    public function test_index_applies_sorting_and_pagination()
    {
        Product::factory()->count(20)->create();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->getJson('/api/products?sort_field=name&sort_direction=1&per_page=5');

        $response->assertStatus(200)
            ->assertJsonPath('pagination.per_page', 5)
            ->assertJsonPath('pagination.current_page', 1);
    }

    public function test_index_applies_filter()
    {
        Product::factory()->count(20)->create();
        $name = Product::query()->inRandomOrder()->value('name');

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->getJson('/api/products?q[name]=' . $name);

        $response->assertStatus(200);

        $countEntity = Product::where('name', 'like', $name)->count();
        $data = $response->json()['data'];
        assertCount($countEntity, $data);
    }

}

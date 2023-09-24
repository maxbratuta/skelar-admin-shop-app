<?php

namespace Tests\Feature\Shop\Web;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Inertia\Testing\AssertableInertia;
use Infrastructure\Persistence\Eloquent\Models\Product;
use Tests\TestCase;

class ProductPageControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_product_show()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('shop.web.products.show', $product));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Shop/Product/Show'));
    }
}

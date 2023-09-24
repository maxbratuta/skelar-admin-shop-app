<?php

namespace Tests\Feature\Admin\Web;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Inertia\Testing\AssertableInertia;
use Infrastructure\Persistence\Eloquent\Models\Product;
use Infrastructure\Persistence\Eloquent\Models\User;
use Tests\TestCase;

class ProductPageControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_product_index_for_admin()
    {
        $admin = User::factory()->create([
            'role' => User::ADMIN_USER_ROLE
        ]);

        $response = $this->actingAs($admin)->get(route('admin.web.products.index'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Admin/Product/Index'));
    }

    public function test_product_show_for_admin()
    {
        $admin = User::factory()->create([
            'role' => User::ADMIN_USER_ROLE
        ]);

        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.web.products.show', $product));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Admin/Product/Show'));
    }

    public function test_product_edit_for_admin()
    {
        $admin = User::factory()->create([
            'role' => User::ADMIN_USER_ROLE
        ]);

        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.web.products.edit', $product));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Admin/Product/Edit'));
    }

    public function test_product_index_for_guest()
    {
        $response = $this->get(route('admin.web.products.index'));

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_product_show_for_guest()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('admin.web.products.show', $product));

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_product_edit_for_guest()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('admin.web.products.edit', $product));

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}

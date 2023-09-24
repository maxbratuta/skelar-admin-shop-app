<?php

namespace Tests\Feature\Admin\Web;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Inertia\Testing\AssertableInertia;
use Infrastructure\Persistence\Eloquent\Models\User;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_dashboard_index_for_admin()
    {
        $admin = User::factory()->create([
            'role' => User::ADMIN_USER_ROLE
        ]);

        $response = $this->actingAs($admin)->get(route('admin.web.dashboard.index'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Admin/Dashboard'));
    }

    public function test_dashboard_index_for_guest()
    {
        $response = $this->get(route('admin.web.dashboard.index'));

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}

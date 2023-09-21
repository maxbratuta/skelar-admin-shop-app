<script setup>
import {ref} from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    isAuthenticated: Boolean,
    isAdmin: Boolean
})
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('shop.web.home.index')">
                                    <BreezeApplicationLogo class="block h-9 w-auto"/>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <BreezeNavLink
                                    :href="route('shop.web.home.index')"
                                    :active="route().current('shop.web.home.index')">
                                    Home
                                </BreezeNavLink>

                                <BreezeNavLink
                                    v-if="isAdmin"
                                    :href="route('admin.web.home.index')"
                                    :active="route().current('admin.web.home.index')">
                                    Back Office
                                </BreezeNavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div v-if="isAuthenticated" class="ml-3 relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
                            </div>

                            <template v-else>
                                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                                    Log in
                                </Link>

                                <Link v-if="canRegister" :href="route('register')"
                                      class="ml-4 text-sm text-gray-700 underline">
                                    Register
                                </Link>
                            </template>
                        </div>

                        <!--                            <template v-if="isAuthenticated">-->
                        <!--                                &lt;!&ndash; Settings Dropdown &ndash;&gt;-->
                        <!--                                <div class="ml-3 relative">-->
                        <!--                                    <BreezeDropdown align="right" width="48">-->
                        <!--                                        <template #trigger>-->
                        <!--                                        <span class="inline-flex rounded-md">-->
                        <!--                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">-->
                        <!--                                                {{ $page.props.auth.user.name }}-->

                        <!--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
                        <!--                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />-->
                        <!--                                                </svg>-->
                        <!--                                            </button>-->
                        <!--                                        </span>-->
                        <!--                                        </template>-->

                        <!--                                        <template #content>-->
                        <!--                                            <BreezeDropdownLink :href="route('logout')" method="post" as="button">-->
                        <!--                                                Log Out-->
                        <!--                                            </BreezeDropdownLink>-->
                        <!--                                        </template>-->
                        <!--                                    </BreezeDropdown>-->
                        <!--                                </div>-->
                        <!--                            </template>-->

                        <!--                            <template v-else>-->
                        <!--                                <div>-->
                        <!--                                    <Link :href="route('login')" class="text-sm text-gray-700 underline">-->
                        <!--                                        Log in-->
                        <!--                                    </Link>-->

                        <!--                                    <Link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">-->
                        <!--                                        Register-->
                        <!--                                    </Link>-->
                        <!--                                </div>-->
                        <!--                            </template>-->
                        <!--                        </div>-->


                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}"
                     class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink
                            :href="route('shop.web.home.index')"
                            :active="route().current('shop.web.home.index')">
                            Home
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <template v-if="isAuthenticated">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </BreezeResponsiveNavLink>
                            </div>
                        </template>

                        <template v-else>
                            <Link :href="route('login')" class="ml-4 text-sm text-gray-700 underline">
                                Log in
                            </Link>

                            <Link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                                Register
                            </Link>
                        </template>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="max-w-6xl mx-auto sm:px-6 lg:px-8 pt-8">
                <slot/>
            </main>
        </div>
    </div>

    <!--    -->
    <!--    <div>-->
    <!--        <header>-->
    <!--            <Link :href="route('shop.web.home.index')">-->
    <!--                <BreezeApplicationLogo class="block h-9" />-->
    <!--            </Link>-->
    <!--            <h1 class="bg-white py-4 text-center">-->
    <!--                <a href="#" class="text-xl font-bold text-gray-700 cursor-pointer">BUSINESS MODEL CANVAS</a>-->
    <!--            </h1>-->
    <!--            <nav class="mt-6">-->
    <!--                <ul class="flex justify-center  items-center space-x-4">-->
    <!--                    <li><a href="#" class="text-md font-semibold text-gray-600 hover:text-gray-800">Home3</a></li>-->
    <!--                    <li><a href="#" class="text-md font-semibold text-gray-600 hover:text-gray-800">New Project</a></li>-->
    <!--                    <li><a href="#" class="text-md font-semibold text-gray-600 hover:text-gray-800">About</a></li>-->
    <!--                </ul>-->
    <!--            </nav>-->
    <!--        </header>-->

    <!--        <div>-->
    <!--            <div class="min-h-screen bg-gray-100">-->
    <!--                <nav class="bg-white border-b border-gray-100">-->
    <!--                    &lt;!&ndash; Primary Navigation Menu &ndash;&gt;-->
    <!--                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
    <!--                        <div class="flex justify-between h-16">-->
    <!--                            <div class="flex">-->
    <!--                                &lt;!&ndash; Logo &ndash;&gt;-->
    <!--                                <div class="shrink-0 flex items-center">-->
    <!--                                    <Link :href="route('shop.web.home.index')">-->
    <!--                                        <BreezeApplicationLogo class="block h-9 w-auto" />-->
    <!--                                    </Link>-->
    <!--                                </div>-->

    <!--                                &lt;!&ndash; Navigation Links &ndash;&gt;-->
    <!--                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">-->
    <!--                                    <BreezeNavLink :href="route('shop.web.home.index')" :active="route().current('shop.web.home.index')">-->
    <!--                                        Home-->
    <!--                                    </BreezeNavLink>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div-->
    <!--                                v-if="isAuthenticated"-->
    <!--                                class="hidden sm:flex sm:items-center sm:ml-6"-->
    <!--                            >-->
    <!--                                &lt;!&ndash; Settings Dropdown &ndash;&gt;-->
    <!--                                <div class="ml-3 relative">-->
    <!--                                    <BreezeDropdown align="right" width="48">-->
    <!--                                        <template #trigger>-->
    <!--                                        <span class="inline-flex rounded-md">-->
    <!--                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">-->
    <!--                                                {{ $page.props.auth.user.name }}-->

    <!--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
    <!--                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />-->
    <!--                                                </svg>-->
    <!--                                            </button>-->
    <!--                                        </span>-->
    <!--                                        </template>-->

    <!--                                        <template #content>-->
    <!--                                            <BreezeDropdownLink :href="route('logout')" method="post" as="button">-->
    <!--                                                Log Out-->
    <!--                                            </BreezeDropdownLink>-->
    <!--                                        </template>-->
    <!--                                    </BreezeDropdown>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            &lt;!&ndash; Hamburger &ndash;&gt;-->
    <!--                            <div class="-mr-2 flex items-center sm:hidden">-->
    <!--                                <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">-->
    <!--                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">-->
    <!--                                        <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />-->
    <!--                                        <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />-->
    <!--                                    </svg>-->
    <!--                                </button>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Responsive Navigation Menu &ndash;&gt;-->
    <!--                    <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">-->
    <!--                        <div class="pt-2 pb-3 space-y-1">-->
    <!--                            <BreezeResponsiveNavLink :href="route('shop.web.home.index')" :active="route().current('shop.web.home.index')">-->
    <!--                                Home-->
    <!--                            </BreezeResponsiveNavLink>-->
    <!--                        </div>-->


    <!--                        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">-->

    <!--                            <div-->
    <!--                                v-if="isAuthenticated"-->
    <!--                                class="pt-4 pb-1 border-t border-gray-200"-->
    <!--                            >-->
    <!--                                <div class="px-4">-->
    <!--                                    <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>-->
    <!--                                    <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>-->
    <!--                                </div>-->

    <!--                                <div class="mt-3 space-y-1">-->
    <!--                                    <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">-->
    <!--                                        Log Out-->
    <!--                                    </BreezeResponsiveNavLink>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div v-else>-->
    <!--                                <Link :href="route('login')" class="text-sm text-gray-700 underline">-->
    <!--                                    Log in-->
    <!--                                </Link>-->

    <!--                                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">-->
    <!--                                    Register-->
    <!--                                </Link>-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                    </div>-->
    <!--                </nav>-->

    <!--                &lt;!&ndash;            &lt;!&ndash; Page Heading &ndash;&gt;&ndash;&gt;-->
    <!--                &lt;!&ndash;            <header class="bg-white shadow" v-if="$slots.header">&ndash;&gt;-->
    <!--                &lt;!&ndash;                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">&ndash;&gt;-->
    <!--                &lt;!&ndash;                    <slot name="header" />&ndash;&gt;-->
    <!--                &lt;!&ndash;                </div>&ndash;&gt;-->
    <!--                &lt;!&ndash;            </header>&ndash;&gt;-->

    <!--                &lt;!&ndash; Page Content &ndash;&gt;-->
    <!--                <main>-->
    <!--                    <slot />-->
    <!--                </main>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

</template>
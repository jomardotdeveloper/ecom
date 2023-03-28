<div class="nk-sidebar-menu" data-simplebar>
    <ul class="nk-menu">
        <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">MAIN</h6>
        </li>
        <x-menu name="Dashboard" logo="icon ni ni-growth-fill" url="{{ route('dashboard') }}"/>
        <x-menu name="Categories" logo="icon ni ni-tile-thumb-fill" url="{{ route('categories.index') }}"/>
        <x-menu name="Customers" logo="icon ni ni-user-fill" url="{{ route('customers.index') }}"/>
        <x-menu name="Users" logo="icon ni ni-users-fill" url="{{ route('users.index') }}"/>
        <x-menu name="Products" logo="icon ni ni-card-view" url="{{ route('products.index') }}"/>
        <x-menu name="Inventory" logo="icon ni ni-layers-fill" url="{{ route('stocks.index') }}"/>
        <x-menu name="Orders" logo="icon ni ni-cc-alt2-fill" url="{{ route('orders.index') }}"/>
        <x-menu name="Payments" logo="icon ni ni-wallet-fill" url="{{ route('payments.index') }}"/>
        <x-menu name="Posts" logo="icon ni ni-blogger" url="{{ route('announcements.index') }}"/>
        
    </ul>
</div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <a href ="{{ route('backend-dashboard') }}" class="active"><i
                            data-feather="grid"></i><span>Dashboard</span></a>
                    <ul>
                        <li class="submenu"> </li>
                    </ul>
                </li>
                <li class="submenu-open">
                        @canany([
                                'view users',
                                'view categories',
                                'view product',
                                'view prices',
                                'view discounts',
                                'view roles & permissions'
                                ])
                                <h6 class="submenu-hdr">Inventory</h6>
                        @endcanany
                    <ul>
                        @canany(['view users'])
                                <li><a href="{{ route('users.index') }}"><i data-feather="user"></i><span>Users</span></a></li>
                        @endcanany
                        @canany(['view categories'])
                                <li><a href="{{ route('categories.index') }}"><i data-feather="file-text"></i><span>Categories</span></a></li>
                        @endcanany
                        @canany(['view product'])
                        <li><a href="{{ route('products.index') }}"><i data-feather="speaker"></i><span>Product Master</span></a></li>
                        @endcanany
                        @canany(['view prices'])
                        <li><a href="{{ route('prices.index') }}"><i data-feather="trending-down"></i><span>Price Master </span></a></li>
                        @endcanany
                        @canany(['view discounts'])
                        <li><a href="{{ route('discounts.index') }}"><i data-feather="codesandbox"></i><span>Discount Master</span></a></li>
                        @endcanany
                        <li><a href="{{ route('sales.index') }}"><i data-feather="box"></i><span>Sales Details</span></a></li>
                        <li><a href="{{ route('return.stock.index') }}"><i data-feather="box"></i><span>Return Stock Details</span></a></li>
                        <!-- <li><a href="#"><i data-feather="plus-square"></i><span>Purchase Details</span></a></li> -->
                        <li><a href="{{ route('customers.index') }}"><i data-feather="codepen"></i><span>Customer Master</span></a></li>
                        <li><a href="#"><i data-feather="tag"></i><span>Inventory Transfer</span></a></li>
                        @canany(['view roles & permissions'])
                        <li><a href="{{ route('roles-and-permissions.index') }}"><i data-feather="shield"></i><span>Roles & Permissions</span></a></li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
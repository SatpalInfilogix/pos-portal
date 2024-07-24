<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <a href ="{{ route('backend-dashboard') }}" class="active"><i
                            data-feather="grid"></i><span>Dashboard</span></a>
                    <ul>
                        <li class="submenu">
                            <!-- {{-- <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/html/template/index.html"
                                        class="active">Admin Dashboard</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/sales-dashboard.html">Sales
                                        Dashboard</a></li>
                            </ul> --}} -->
                        </li>
                        <!-- {{-- <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="smartphone"></i><span>Application</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chat.html">Chat</a>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/video-call.html">Video
                                                Call</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/audio-call.html">Audio
                                                Call</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/call-history.html">Call
                                                History</a></li>
                                    </ul>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/calendar.html">Calendar</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/email.html">Email</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/html/template/todo.html">To
                                        Do</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/notes.html">Notes</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/file-manager.html">File
                                        Manager</a></li>
                            </ul>
                        </li> --}} -->
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
                        {{-- <li><a href="https://dreamspos.dreamstechnologies.com/html/template/units.html"><i
                                    data-feather="speaker"></i><span>Units</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/varriant-attributes.html"><i
                                    data-feather="layers"></i><span>Variant Attributes</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/warranty.html"><i
                                    data-feather="bookmark"></i><span>Warranties</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/barcode.html"><i
                                    data-feather="align-justify"></i><span>Print Barcode</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/qrcode.html"><i
                                    data-feather="maximize"></i><span>Print QR Code</span></a></li> --}}
                    </ul>
                </li>
        {{-- 
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Stock</h6>
                    <ul>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/manage-stocks.html"><i
                                    data-feather="package"></i><span>Manage Stock</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/stock-adjustment.html"><i
                                    data-feather="clipboard"></i><span>Stock Adjustment</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/stock-transfer.html"><i
                                    data-feather="truck"></i><span>Stock Transfer</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Sales</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/sales-list.html"><i
                                    data-feather="shopping-cart"></i><span>Sales</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/invoice-report.html"><i
                                    data-feather="file-text"></i><span>Invoices</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/sales-returns.html"><i
                                    data-feather="copy"></i><span>Sales Return</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/quotation-list.html"><i
                                    data-feather="save"></i><span>Quotation</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/pos.html"><i
                                    data-feather="hard-drive"></i><span>POS</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Promo</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/coupons.html"><i
                                    data-feather="shopping-cart"></i><span>Coupons</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Purchases</h6>
                    <ul>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/purchase-list.html"><i
                                    data-feather="shopping-bag"></i><span>Purchases</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/purchase-order-report.html"><i
                                    data-feather="file-minus"></i><span>Purchase Order</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html"><i
                                    data-feather="refresh-cw"></i><span>Purchase Return</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Finance & Accounts</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="file-text"></i><span>Expenses</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/expense-list.html">Expenses</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/expense-category.html">Expense
                                        Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Peoples</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/customers.html"><i
                                    data-feather="user"></i><span>Customers</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/suppliers.html"><i
                                    data-feather="users"></i><span>Suppliers</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/store-list.html"><i
                                    data-feather="home"></i><span>Stores</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/warehouse.html"><i
                                    data-feather="archive"></i><span>Warehouses</span></a>
                        </li>
                    </ul>
                </li> 
                <li class="submenu-open">
                    <h6 class="submenu-hdr">HRM</h6>
                    <ul>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/employees-grid.html"><i
                                    data-feather="user"></i><span>Employees</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/department-grid.html"><i
                                    data-feather="users"></i><span>Departments</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/designation.html"><i
                                    data-feather="git-merge"></i><span>Designation</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/shift.html"><i
                                    data-feather="shuffle"></i><span>Shifts</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="book-open"></i><span>Attendence</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/attendance-employee.html">Employee</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/attendance-admin.html">Admin</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="calendar"></i><span>Leaves</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/leaves-admin.html">Admin
                                        Leaves</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/leaves-employee.html">Employee
                                        Leaves</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/leave-types.html">Leave
                                        Types</a></li>
                            </ul>
                        </li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/holidays.html"><i
                                    data-feather="credit-card"></i><span>Holidays</span></a>
                        </li>
                        <li class="submenu">
                            <a href="https://dreamspos.dreamstechnologies.com/html/template/payroll-list.html"><i
                                    data-feather="dollar-sign"></i><span>Payroll</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/payroll-list.html">Employee
                                        Salary</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/payslip.html">Payslip</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/sales-report.html"><i
                                    data-feather="bar-chart-2"></i><span>Sales Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/purchase-report.html"><i
                                    data-feather="pie-chart"></i><span>Purchase report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/inventory-report.html"><i
                                    data-feather="inbox"></i><span>Inventory Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/invoice-report.html"><i
                                    data-feather="file"></i><span>Invoice Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/supplier-report.html"><i
                                    data-feather="user-check"></i><span>Supplier Report</span></a></li>
                        <li><a href="{{ route('customers.index') }}"><i data-feather="user"></i><span>Customer Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/expense-report.html"><i
                                    data-feather="file"></i><span>Expense Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/income-report.html"><i
                                    data-feather="bar-chart"></i><span>Income Report</span></a></li>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/tax-reports.html"><i
                                    data-feather="database"></i><span>Tax Report</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/profit-and-loss.html"><i
                                    data-feather="pie-chart"></i><span>Profit & Loss</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/users.html"><i
                                    data-feather="user-check"></i><span>Users</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/roles-permissions.html"><i
                                    data-feather="shield"></i><span>Roles & Permissions</span></a></li>
                        <li><a
                                href="https://dreamspos.dreamstechnologies.com/html/template/delete-account.html"><i
                                    data-feather="lock"></i><span>Delete Account Request</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pages</h6>
                    <ul>
                        <li><a href="https://dreamspos.dreamstechnologies.com/html/template/profile.html"><i
                                    data-feather="user"></i><span>Profile</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="shield"></i><span>Authentication</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/signin.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/signin-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/signin-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/register.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/register-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/register-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                        Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                        Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/reset-password.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/reset-password-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/reset-password-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                        Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/email-verification.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/email-verification-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/email-verification-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                        Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification.html">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification-2.html">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification-3.html">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/lock-screen.html">Lock
                                        Screen</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="file-minus"></i><span>Error
                                    Pages</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/error-404.html">404
                                        Error </a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/error-500.html">500
                                        Error </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="map"></i><span>Places</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/countries.html">Countries</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/states.html">States</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://dreamspos.dreamstechnologies.com/html/template/blank-page.html"><i
                                    data-feather="file"></i><span>Blank Page</span> </a>
                        </li>
                        <li>
                            <a href="https://dreamspos.dreamstechnologies.com/html/template/coming-soon.html"><i
                                    data-feather="send"></i><span>Coming Soon</span> </a>
                        </li>
                        <li>
                            <a
                                href="https://dreamspos.dreamstechnologies.com/html/template/under-maintenance.html"><i
                                    data-feather="alert-triangle"></i><span>Under Maintenance</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="settings"></i><span>General
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/general-settings.html">Profile</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/security-settings.html">Security</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/notification.html">Notifications</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/connected-apps.html">Connected
                                        Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="globe"></i><span>Website
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/system-settings.html">System
                                        Settings</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/company-settings.html">Company
                                        Settings </a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/localization-settings.html">Localization</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/prefixes.html">Prefixes</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/preference.html">Preference</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/appearance.html">Appearance</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/social-authentication.html">Social
                                        Authentication</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/language-settings.html">Language</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="smartphone"></i>
                                <span>App Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/invoice-settings.html">Invoice</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/printer-settings.html">Printer</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/pos-settings.html">POS</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/custom-fields.html">Custom
                                        Fields</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="monitor"></i>
                                <span>System Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/email-settings.html">Email</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/sms-gateway.html">SMS
                                        Gateways</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/otp-settings.html">OTP</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/gdpr-settings.html">GDPR
                                        Cookies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="dollar-sign"></i>
                                <span>Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/payment-gateway-settings.html">Payment
                                        Gateway</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/bank-settings-grid.html">Bank
                                        Accounts</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/tax-rates.html">Tax
                                        Rates</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/currency-settings.html">Currencies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="hexagon"></i>
                                <span>Other Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/storage-settings.html">Storage</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ban-ip-address.html">Ban
                                        IP Address</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://dreamspos.dreamstechnologies.com/html/template/signin.html"><i
                                    data-feather="log-out"></i><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">UI Interface</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i data-feather="layers"></i><span>Base UI</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-alerts.html">Alerts</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-accordion.html">Accordion</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-avatar.html">Avatar</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-badges.html">Badges</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-borders.html">Border</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-buttons.html">Buttons</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-buttons-group.html">Button
                                        Group</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-breadcrumb.html">Breadcrumb</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-cards.html">Card</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-carousel.html">Carousel</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-colors.html">Colors</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-dropdowns.html">Dropdowns</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-grid.html">Grid</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-images.html">Images</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-lightbox.html">Lightbox</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-media.html">Media</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-modals.html">Modals</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-offcanvas.html">Offcanvas</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-pagination.html">Pagination</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-popovers.html">Popovers</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-progress.html">Progress</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-placeholders.html">Placeholders</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-rangeslider.html">Range
                                        Slider</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-spinner.html">Spinner</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-sweetalerts.html">Sweet
                                        Alerts</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-nav-tabs.html">Tabs</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-toasts.html">Toasts</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-tooltips.html">Tooltips</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-typography.html">Typography</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-video.html">Video</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i data-feather="layers"></i><span>Advanced UI</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-ribbon.html">Ribbon</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-clipboard.html">Clipboard</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-drag-drop.html">Drag
                                        & Drop</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-rangeslider.html">Range
                                        Slider</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-rating.html">Rating</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-text-editor.html">Text
                                        Editor</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-counter.html">Counter</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-scrollbar.html">Scrollbar</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-stickynote.html">Sticky
                                        Note</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/ui-timeline.html">Timeline</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i>
                                <span>Charts</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-apex.html">Apex
                                        Charts</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-c3.html">Chart
                                        C3</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-js.html">Chart
                                        Js</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-morris.html">Morris
                                        Charts</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-flot.html">Flot
                                        Charts</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/chart-peity.html">Peity
                                        Charts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="database"></i>
                                <span>Icons</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-fontawesome.html">Fontawesome
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-feather.html">Feather
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-ionic.html">Ionic
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-material.html">Material
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-pe7.html">Pe7
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-simpleline.html">Simpleline
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-themify.html">Themify
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-weather.html">Weather
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-typicon.html">Typicon
                                        Icons</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/icon-flag.html">Flag
                                        Icons</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i data-feather="edit"></i><span>Forms</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);">Form Elements<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-basic-inputs.html">Basic
                                                Inputs</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-checkbox-radios.html">Checkbox
                                                & Radios</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-input-groups.html">Input
                                                Groups</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-grid-gutters.html">Grid
                                                & Gutters</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-select.html">Form
                                                Select</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-mask.html">Input
                                                Masks</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-fileupload.html">File
                                                Uploads</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);">Layouts<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-horizontal.html">Horizontal
                                                Form</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-vertical.html">Vertical
                                                Form</a></li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/html/template/form-floating-labels.html">Floating
                                                Labels</a></li>
                                    </ul>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/form-validation.html">Form
                                        Validation</a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/form-select2.html">Select2</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/form-wizard.html">Form
                                        Wizard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="columns"></i><span>Tables</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/tables-basic.html">Basic
                                        Tables </a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/html/template/data-tables.html">Data
                                        Table </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Help</h6>
                    <ul>
                        <li><a href="javascript:void(0);"><i
                                    data-feather="file-text"></i><span>Documentation</span></a></li>
                        <li><a href="javascript:void(0);"><i data-feather="lock"></i><span>Changelog
                                    v2.0.7</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="file-minus"></i><span>Multi
                                    Level</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Level 1.1</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Level 2.1</a></li>
                                        <li class="submenu submenu-two submenu-three"><a
                                                href="javascript:void(0);">Level 2.2<span
                                                    class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                <li><a href="javascript:void(0);">Level 3.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> 
        --}}
            </ul>
        </div>
    </div>
</div>

<div class="sidebar horizontal-sidebar">
    <div id="sidebar-menu-3" class="sidebar-menu">
        <ul class="nav">
            <li class="submenu">
                <a href="https://dreamspos.dreamstechnologies.com/html/template/index.html"
                    class="active subdrop"><i data-feather="grid"></i><span> Main Menu</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="{{ route('backend-dashboard') }}" class="active subdrop"><span>Dashboard</span> <span
                                class="menu-arrow"></span></a>
                        {{-- <ul>
                            <li><a href="https://dreamspos.dreamstechnologies.com/html/template/index.html"
                                    class="active">Admin Dashboard</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/sales-dashboard.html">Sales
                                    Dashboard</a></li>
                        </ul> --}}
                    </li>
                    {{-- <li class="submenu">
                        <a href="javascript:void(0);"><span>Application</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chat.html">Chat</a>
                            </li>
                            <li class="submenu submenu-two"><a
                                    href="javascript:void(0);"><span>Call</span><span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/video-call.html">Video
                                            Call</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/audio-call.html">Audio
                                            Call</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/call-history.html">Call
                                            History</a></li>
                                </ul>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/calendar.html">Calendar</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/email.html">Email</a>
                            </li>
                            <li><a href="https://dreamspos.dreamstechnologies.com/html/template/todo.html">To
                                    Do</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/notes.html">Notes</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/file-manager.html">File
                                    Manager</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img
                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/product.svg"
                        alt="img"><span> Inventory
                    </span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a
                            href="#"><span>Products</span></a>
                    </li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/add-product.html"><span>Create
                                Product</span></a></li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/expired-products.html"><span>Expired
                                Products</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/low-stocks.html"><span>Low
                                Stocks</span></a></li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/category-list.html"><span>Category</span></a>
                    </li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/sub-categories.html"><span>Sub
                                Category</span></a></li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/brand-list.html"><span>Brands</span></a>
                    </li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/units.html"><span>Units</span></a>
                    </li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/varriant-attributes.html"><span>Variant
                                Attributes</span></a></li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/warranty.html"><span>Warranties</span></a>
                    </li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/barcode.html"><span>Print
                                Barcode</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/qrcode.html"><span>Print
                                QR Code</span></a></li>
                </ul>
            </li>
            {{-- <li class="submenu">
                <a href="javascript:void(0);"><img
                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/purchase1.svg"
                        alt="img"><span>Sales &amp; Purchase</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/sales-list.html"><span>Sales</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/invoice-report.html"><span>Invoices</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/sales-returns.html"><span>Sales
                                        Return</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/quotation-list.html"><span>Quotation</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/pos.html"><span>POS</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/coupons.html"><span>Coupons</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Purchase</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/purchase-list.html"><span>Purchases</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/purchase-order-report.html"><span>Purchase
                                        Order</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/purchase-returns.html"><span>Purchase
                                        Return</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/manage-stocks.html"><span>Manage
                                        Stock</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/stock-adjustment.html"><span>Stock
                                        Adjustment</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/stock-transfer.html"><span>Stock
                                        Transfer</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Expenses</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/expense-list.html">Expenses</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/expense-category.html">Expense
                                    Category</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img
                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/users1.svg"
                        alt="img"><span>User Management</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>People</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/customers.html"><span>Customers</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/suppliers.html"><span>Suppliers</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/store-list.html"><span>Stores</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/warehouse.html"><span>Warehouses</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Roles &amp; Permissions</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/roles-permissions.html"><span>Roles
                                        & Permissions</span></a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/delete-account.html"><span>Delete
                                        Account Request</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Base UI</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-alerts.html">Alerts</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-accordion.html">Accordion</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-avatar.html">Avatar</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-badges.html">Badges</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-borders.html">Border</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-buttons.html">Buttons</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-buttons-group.html">Button
                                    Group</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-breadcrumb.html">Breadcrumb</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-cards.html">Card</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-carousel.html">Carousel</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-colors.html">Colors</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-dropdowns.html">Dropdowns</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-grid.html">Grid</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-images.html">Images</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-lightbox.html">Lightbox</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-media.html">Media</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-modals.html">Modals</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-offcanvas.html">Offcanvas</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-pagination.html">Pagination</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-popovers.html">Popovers</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-progress.html">Progress</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-placeholders.html">Placeholders</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-rangeslider.html">Range
                                    Slider</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-spinner.html">Spinner</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-sweetalerts.html">Sweet
                                    Alerts</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-nav-tabs.html">Tabs</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-toasts.html">Toasts</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-tooltips.html">Tooltips</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-typography.html">Typography</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-video.html">Video</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Advanced UI</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-ribbon.html">Ribbon</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-clipboard.html">Clipboard</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-drag-drop.html">Drag
                                    & Drop</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-rangeslider.html">Range
                                    Slider</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-rating.html">Rating</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-text-editor.html">Text
                                    Editor</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-counter.html">Counter</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-scrollbar.html">Scrollbar</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-stickynote.html">Sticky
                                    Note</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ui-timeline.html">Timeline</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Charts</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-apex.html">Apex
                                    Charts</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-c3.html">Chart
                                    C3</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-js.html">Chart
                                    Js</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-morris.html">Morris
                                    Charts</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-flot.html">Flot
                                    Charts</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/chart-peity.html">Peity
                                    Charts</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Primary Icons</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-fontawesome.html">Fontawesome
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-feather.html">Feather
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-ionic.html">Ionic
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-material.html">Material
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-pe7.html">Pe7
                                    Icons</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Secondary Icons</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-simpleline.html">Simpleline
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-themify.html">Themify
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-weather.html">Weather
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-typicon.html">Typicon
                                    Icons</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/icon-flag.html">Flag
                                    Icons</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span> Forms</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);"><span>Form Elements</span><span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-basic-inputs.html">Basic
                                            Inputs</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-checkbox-radios.html">Checkbox
                                            & Radios</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-input-groups.html">Input
                                            Groups</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-grid-gutters.html">Grid
                                            & Gutters</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-select.html">Form
                                            Select</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-mask.html">Input
                                            Masks</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-fileupload.html">File
                                            Uploads</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);"><span> Layouts</span><span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-horizontal.html">Horizontal
                                            Form</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-vertical.html">Vertical
                                            Form</a></li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/form-floating-labels.html">Floating
                                            Labels</a></li>
                                </ul>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/form-validation.html">Form
                                    Validation</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/form-select2.html">Select2</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/form-wizard.html">Form
                                    Wizard</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Tables</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/tables-basic.html">Basic
                                    Tables </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/data-tables.html">Data
                                    Table </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="user"></i><span>Profile</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/profile.html"><span>Profile</span></a>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Authentication</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/signin.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/signin-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/signin-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/register.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/register-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/register-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                    Password<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/forgot-password-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                    Password<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/reset-password.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/reset-password-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/reset-password-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                    Verification<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/email-verification.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/email-verification-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/email-verification-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                    Verification<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification.html">Cover</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification-2.html">Illustration</a>
                                    </li>
                                    <li><a
                                            href="https://dreamspos.dreamstechnologies.com/html/template/two-step-verification-3.html">Basic</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/lock-screen.html">Lock
                                    Screen</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/error-404.html">404
                                    Error </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/error-500.html">500
                                    Error </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/blank-page.html"><span>Blank
                                        Page</span> </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/coming-soon.html"><span>Coming
                                        Soon</span> </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/under-maintenance.html"><span>Under
                                        Maintenance</span> </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Places</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/countries.html">Countries</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/states.html">States</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Employees</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/employees-grid.html"><span>Employees</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/department-grid.html"><span>Departments</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/designation.html"><span>Designation</span></a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/shift.html"><span>Shifts</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Attendence</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/attendance-employee.html">Employee
                                    Attendence</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/attendance-admin.html">Admin
                                    Attendence</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Leaves &amp; Holidays</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/leaves-admin.html">Admin
                                    Leaves</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/leaves-employee.html">Employee
                                    Leaves</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/leave-types.html">Leave
                                    Types</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/holidays.html"><span>Holidays</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="https://dreamspos.dreamstechnologies.com/html/template/payroll-list.html"><span>Payroll</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/payroll-list.html">Employee
                                    Salary</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/payslip.html">Payslip</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img
                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/printer.svg"
                        alt="img"><span>Reports</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/sales-report.html"><span>Sales
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/purchase-report.html"><span>Purchase
                                report</span></a></li>
                    <li><a
                            href="https://dreamspos.dreamstechnologies.com/html/template/inventory-report.html"><span>Inventory
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/invoice-report.html"><span>Invoice
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/supplier-report.html"><span>Supplier
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/customer-report.html"><span>Customer
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/expense-report.html"><span>Expense
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/income-report.html"><span>Income
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/tax-reports.html"><span>Tax
                                Report</span></a></li>
                    <li><a href="https://dreamspos.dreamstechnologies.com/html/template/profit-and-loss.html"><span>Profit
                                & Loss</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img
                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/settings.svg"
                        alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>General Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/general-settings.html">Profile</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/security-settings.html">Security</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/notification.html">Notifications</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/connected-apps.html">Connected
                                    Apps</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Website Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/system-settings.html">System
                                    Settings</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/company-settings.html">Company
                                    Settings </a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/localization-settings.html">Localization</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/prefixes.html">Prefixes</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/preference.html">Preference</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/appearance.html">Appearance</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/social-authentication.html">Social
                                    Authentication</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/language-settings.html">Language</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>App Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/invoice-settings.html">Invoice</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/printer-settings.html">Printer</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/pos-settings.html">POS</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/custom-fields.html">Custom
                                    Fields</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>System Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/email-settings.html">Email</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/sms-gateway.html">SMS
                                    Gateways</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/otp-settings.html">OTP</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/gdpr-settings.html">GDPR
                                    Cookies</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Financial Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/payment-gateway-settings.html">Payment
                                    Gateway</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/bank-settings-grid.html">Bank
                                    Accounts</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/tax-rates.html">Tax
                                    Rates</a></li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/currency-settings.html">Currencies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Other Settings</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/storage-settings.html">Storage</a>
                            </li>
                            <li><a
                                    href="https://dreamspos.dreamstechnologies.com/html/template/ban-ip-address.html">Ban
                                    IP Address</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                    <li><a href="javascript:void(0);"><span>Changelog v2.0.7</span></a></li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Multi Level</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="javascript:void(0);">Level 1.1</a></li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Level 2.1</a></li>
                                    <li class="submenu submenu-two submenu-three"><a
                                            href="javascript:void(0);">Level 2.2<span
                                                class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 3.1</a></li>
                                            <li><a href="javascript:void(0);">Level 3.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>

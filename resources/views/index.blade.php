<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos Admin Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo logo-normal">
                    <img src="assets/img/logo.png" alt>
                </a>
                <a href="index.html" class="logo logo-white">
                    <img src="assets/img/logo-white.png" alt>
                </a>
                <a href="index.html" class="logo-small">
                    <img src="assets/img/logo-small.png" alt>
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                    <i data-feather="chevrons-left" class="feather-16"></i>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item nav-searchinputs">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#" class="dropdown">
                            <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable"
                                data-bs-toggle="dropdown" data-bs-auto-close="false">
                                <input type="text" placeholder="Search">
                                <div class="search-addon">
                                    <span><i data-feather="x-circle" class="feather-14"></i></span>
                                </div>
                            </div>
                            <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuClickable">
                                <div class="search-info">
                                    <h6><span><i data-feather="search" class="feather-16"></i></span>Recent Searches
                                    </h6>
                                    <ul class="search-tags">
                                        <li><a href="javascript:void(0);">Products</a></li>
                                        <li><a href="javascript:void(0);">Sales</a></li>
                                        <li><a href="javascript:void(0);">Applications</a></li>
                                    </ul>
                                </div>
                                <div class="search-info">
                                    <h6><span><i data-feather="help-circle" class="feather-16"></i></span>Help</h6>
                                    <p>How to Change Product Volume from 0 to 200 on Inventory management</p>
                                    <p>Change Product Name</p>
                                </div>
                                <div class="search-info">
                                    <h6><span><i data-feather="user" class="feather-16"></i></span>Customers</h6>
                                    <ul class="customers">
                                        <li><a href="javascript:void(0);">Aron Varu<img
                                                    src="assets/img/profiles/avator1.jpg" alt class="img-fluid"></a>
                                        </li>
                                        <li><a href="javascript:void(0);">Jonita<img
                                                    src="assets/img/profiles/avatar-01.jpg" alt class="img-fluid"></a>
                                        </li>
                                        <li><a href="javascript:void(0);">Aaron<img
                                                    src="assets/img/profiles/avatar-10.jpg" alt class="img-fluid"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


             {{--   <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link select-store"
                        data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-letter">
                                <img src="assets/img/store/store-01.png" alt="Store Logo" class="img-fluid">
                            </span>
                            <span class="user-detail">
                                <span class="user-name">Select Store</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/store/store-01.png" alt="Store Logo" class="img-fluid"> Grocery
                            Alpha
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/store/store-02.png" alt="Store Logo" class="img-fluid"> Grocery Apex
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/store/store-03.png" alt="Store Logo" class="img-fluid"> Grocery Bevy
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/store/store-04.png" alt="Store Logo" class="img-fluid"> Grocery Eden
                        </a>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
                        role="button">
                        <img src="assets/img/flags/us.png" alt="Language" class="img-fluid">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item active">
                            <img src="assets/img/flags/us.png" alt height="16"> English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/fr.png" alt height="16"> French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/es.png" alt height="16"> Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/img/flags/de.png" alt height="16"> German
                        </a>
                    </div>
                </li>

                <li class="nav-item nav-item-box">
                    <a href="javascript:void(0);" id="btnFullscreen">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
                <li class="nav-item nav-item-box">
                    <a href="email.html">
                        <i data-feather="mail"></i>
                        <span class="badge rounded-pill">1</span>
                    </a>
                </li>

                <li class="nav-item dropdown nav-item-box">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i data-feather="bell"></i><span class="badge rounded-pill">2</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt src="assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added
                                                    new task <span class="noti-title">Patient appointment
                                                        booking</span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt src="assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Tarah
                                                        Shropshire</span>
                                                    changed the task name <span class="noti-title">Appointment booking
                                                        with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt src="assets/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                                    added <span class="noti-title">Domenic Houston</span> and <span
                                                        class="noti-title">Claire Mapes</span> to project <span
                                                        class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt src="assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                                    completed task <span class="noti-title">Patient and Doctor video
                                                        conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins
                                                        ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt src="assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Bernardo
                                                        Galaviz</span>
                                                    added new task <span class="noti-title">Private chat module</span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li> --}}

                <li class="nav-item nav-item-box">
                    <a href="general-settings.html"><i data-feather="settings"></i></a>
                </li>
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-letter">
                                <img src="assets/img/profiles/avator1.jpg" alt class="img-fluid">
                            </span>
                            <span class="user-detail">
                                <span class="user-name">John Smilga</span>
                                <span class="user-role">Super Admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt>
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>John Smilga</h6>
                                    <h5>Super Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i>
                                My
                                Profile</a>
                            <a class="dropdown-item" href="general-settings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="signin.html"><img
                                    src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="general-settings.html">Settings</a>
                    <a class="dropdown-item" href="signin.html">Logout</a>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Main</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="grid"></i><span>Dashboard</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="index.html">Admin Dashboard</a></li>
                                        <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="smartphone"></i><span>Application</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chat.html">Chat</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span
                                                    class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="video-call.html">Video Call</a></li>
                                                <li><a href="audio-call.html">Audio Call</a></li>
                                                <li><a href="call-history.html">Call History</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                        <li><a href="email.html">Email</a></li>
                                        <li><a href="todo.html">To Do</a></li>
                                        <li><a href="notes.html">Notes</a></li>
                                        <li><a href="file-manager.html">File Manager</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Inventory</h6>
                            <ul>
                                <li class="active"><a href="product-list.html"><i
                                            data-feather="box"></i><span>Products</span></a></li>
                                <li><a href="add-product.html"><i data-feather="plus-square"></i><span>Create
                                            Product</span></a></li>
                                <li><a href="expired-products.html"><i data-feather="codesandbox"></i><span>Expired
                                            Products</span></a></li>
                                <li><a href="low-stocks.html"><i data-feather="trending-down"></i><span>Low
                                            Stocks</span></a></li>
                                <li><a href="category-list.html"><i
                                            data-feather="codepen"></i><span>Category</span></a></li>
                                <li><a href="sub-categories.html"><i data-feather="speaker"></i><span>Sub
                                            Category</span></a></li>
                                <li><a href="brand-list.html"><i data-feather="tag"></i><span>Brands</span></a></li>
                                <li><a href="units.html"><i data-feather="speaker"></i><span>Units</span></a></li>
                                <li><a href="varriant-attributes.html"><i data-feather="layers"></i><span>Variant
                                            Attributes</span></a></li>
                                <li><a href="warranty.html"><i data-feather="bookmark"></i><span>Warranties</span></a>
                                </li>
                                <li><a href="barcode.html"><i data-feather="align-justify"></i><span>Print
                                            Barcode</span></a></li>
                                <li><a href="qrcode.html"><i data-feather="maximize"></i><span>Print QR
                                            Code</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Stock</h6>
                            <ul>
                                <li><a href="manage-stocks.html"><i data-feather="package"></i><span>Manage
                                            Stock</span></a></li>
                                <li><a href="stock-adjustment.html"><i data-feather="clipboard"></i><span>Stock
                                            Adjustment</span></a></li>
                                <li><a href="stock-transfer.html"><i data-feather="truck"></i><span>Stock
                                            Transfer</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Sales</h6>
                            <ul>
                                <li><a href="sales-list.html"><i
                                            data-feather="shopping-cart"></i><span>Sales</span></a></li>
                                <li><a href="invoice-report.html"><i
                                            data-feather="file-text"></i><span>Invoices</span></a></li>
                                <li><a href="sales-returns.html"><i data-feather="copy"></i><span>Sales
                                            Return</span></a></li>
                                <li><a href="quotation-list.html"><i
                                            data-feather="save"></i><span>Quotation</span></a></li>
                                <li><a href="pos.html"><i data-feather="hard-drive"></i><span>POS</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Promo</h6>
                            <ul>
                                <li><a href="coupons.html"><i
                                            data-feather="shopping-cart"></i><span>Coupons</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Purchases</h6>
                            <ul>
                                <li><a href="purchase-list.html"><i
                                            data-feather="shopping-bag"></i><span>Purchases</span></a></li>
                                <li><a href="purchase-order-report.html"><i
                                            data-feather="file-minus"></i><span>Purchase Order</span></a></li>
                                <li><a href="purchase-returns.html"><i data-feather="refresh-cw"></i><span>Purchase
                                            Return</span></a></li>
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
                                        <li><a href="expense-list.html">Expenses</a></li>
                                        <li><a href="expense-category.html">Expense Category</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Peoples</h6>
                            <ul>
                                <li><a href="customers.html"><i data-feather="user"></i><span>Customers</span></a>
                                </li>
                                <li><a href="suppliers.html"><i data-feather="users"></i><span>Suppliers</span></a>
                                </li>
                                <li><a href="store-list.html"><i data-feather="home"></i><span>Stores</span></a></li>
                                <li><a href="warehouse.html"><i data-feather="archive"></i><span>Warehouses</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">HRM</h6>
                            <ul>
                                <li><a href="employees-grid.html"><i
                                            data-feather="user"></i><span>Employees</span></a></li>
                                <li><a href="department-grid.html"><i
                                            data-feather="users"></i><span>Departments</span></a></li>
                                <li><a href="designation.html"><i
                                            data-feather="git-merge"></i><span>Designation</span></a></li>
                                <li><a href="shift.html"><i data-feather="shuffle"></i><span>Shifts</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="book-open"></i><span>Attendence</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="attendance-employee.html">Employee</a></li>
                                        <li><a href="attendance-admin.html">Admin</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="calendar"></i><span>Leaves</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                        <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                        <li><a href="leave-types.html">Leave Types</a></li>
                                    </ul>
                                </li>
                                <li><a href="holidays.html"><i
                                            data-feather="credit-card"></i><span>Holidays</span></a></li>
                                <li class="submenu">
                                    <a href="payroll-list.html"><i
                                            data-feather="dollar-sign"></i><span>Payroll</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="payroll-list.html">Employee Salary</a></li>
                                        <li><a href="payslip.html">Payslip</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Reports</h6>
                            <ul>
                                <li><a href="sales-report.html"><i data-feather="bar-chart-2"></i><span>Sales
                                            Report</span></a></li>
                                <li><a href="purchase-report.html"><i data-feather="pie-chart"></i><span>Purchase
                                            report</span></a></li>
                                <li><a href="inventory-report.html"><i data-feather="inbox"></i><span>Inventory
                                            Report</span></a></li>
                                <li><a href="invoice-report.html"><i data-feather="file"></i><span>Invoice
                                            Report</span></a></li>
                                <li><a href="supplier-report.html"><i data-feather="user-check"></i><span>Supplier
                                            Report</span></a></li>
                                <li><a href="customer-report.html"><i data-feather="user"></i><span>Customer
                                            Report</span></a></li>
                                <li><a href="expense-report.html"><i data-feather="file"></i><span>Expense
                                            Report</span></a></li>
                                <li><a href="income-report.html"><i data-feather="bar-chart"></i><span>Income
                                            Report</span></a></li>
                                <li><a href="tax-reports.html"><i data-feather="database"></i><span>Tax
                                            Report</span></a></li>
                                <li><a href="profit-and-loss.html"><i data-feather="pie-chart"></i><span>Profit &
                                            Loss</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">User Management</h6>
                            <ul>
                                <li><a href="users.html"><i data-feather="user-check"></i><span>Users</span></a></li>
                                <li><a href="roles-permissions.html"><i data-feather="shield"></i><span>Roles &
                                            Permissions</span></a></li>
                                <li><a href="delete-account.html"><i data-feather="lock"></i><span>Delete Account
                                            Request</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Pages</h6>
                            <ul>
                                <li><a href="profile.html"><i data-feather="user"></i><span>Profile</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="shield"></i><span>Authentication</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                                    class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="signin.html">Cover</a></li>
                                                <li><a href="signin-2.html">Illustration</a></li>
                                                <li><a href="signin-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                                    class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="register.html">Cover</a></li>
                                                <li><a href="register-2.html">Illustration</a></li>
                                                <li><a href="register-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                                Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="forgot-password.html">Cover</a></li>
                                                <li><a href="forgot-password-2.html">Illustration</a></li>
                                                <li><a href="forgot-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                                Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="reset-password.html">Cover</a></li>
                                                <li><a href="reset-password-2.html">Illustration</a></li>
                                                <li><a href="reset-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                                Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-verification.html">Cover</a></li>
                                                <li><a href="email-verification-2.html">Illustration</a></li>
                                                <li><a href="email-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                                Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="two-step-verification.html">Cover</a></li>
                                                <li><a href="two-step-verification-2.html">Illustration</a></li>
                                                <li><a href="two-step-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lock-screen.html">Lock Screen</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="file-minus"></i><span>Error
                                            Pages</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="error-404.html">404 Error </a></li>
                                        <li><a href="error-500.html">500 Error </a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="map"></i><span>Places</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="countries.html">Countries</a></li>
                                        <li><a href="states.html">States</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blank-page.html"><i data-feather="file"></i><span>Blank Page</span> </a>
                                </li>
                                <li>
                                    <a href="coming-soon.html"><i data-feather="send"></i><span>Coming Soon</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="under-maintenance.html"><i data-feather="alert-triangle"></i><span>Under
                                            Maintenance</span> </a>
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
                                        <li><a href="general-settings.html">Profile</a></li>
                                        <li><a href="security-settings.html">Security</a></li>
                                        <li><a href="notification.html">Notifications</a></li>
                                        <li><a href="connected-apps.html">Connected Apps</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="globe"></i><span>Website
                                            Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="system-settings.html">System Settings</a></li>
                                        <li><a href="company-settings.html">Company Settings </a></li>
                                        <li><a href="localization-settings.html">Localization</a></li>
                                        <li><a href="prefixes.html">Prefixes</a></li>
                                        <li><a href="preference.html">Preference</a></li>
                                        <li><a href="appearance.html">Appearance</a></li>
                                        <li><a href="social-authentication.html">Social Authentication</a></li>
                                        <li><a href="language-settings.html">Language</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="smartphone"></i><span>App
                                            Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="invoice-settings.html">Invoice</a></li>
                                        <li><a href="printer-settings.html">Printer</a></li>
                                        <li><a href="pos-settings.html">POS</a></li>
                                        <li><a href="custom-fields.html">Custom Fields</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="monitor"></i><span>System
                                            Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="email-settings.html">Email</a></li>
                                        <li><a href="sms-gateway.html">SMS Gateways</a></li>
                                        <li><a href="otp-settings.html">OTP</a></li>
                                        <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="dollar-sign"></i><span>Financial
                                            Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                        <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                        <li><a href="tax-rates.html">Tax Rates</a></li>
                                        <li><a href="currency-settings.html">Currencies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="hexagon"></i><span>Other
                                            Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="storage-settings.html">Storage</a></li>
                                        <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="signin.html"><i data-feather="log-out"></i><span>Logout</span> </a>
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
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-accordion.html">Accordion</a></li>
                                        <li><a href="ui-avatar.html">Avatar</a></li>
                                        <li><a href="ui-badges.html">Badges</a></li>
                                        <li><a href="ui-borders.html">Border</a></li>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-buttons-group.html">Button Group</a></li>
                                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                        <li><a href="ui-cards.html">Card</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="ui-colors.html">Colors</a></li>
                                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
                                        <li><a href="ui-images.html">Images</a></li>
                                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                                        <li><a href="ui-media.html">Media</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                        <li><a href="ui-pagination.html">Pagination</a></li>
                                        <li><a href="ui-popovers.html">Popovers</a></li>
                                        <li><a href="ui-progress.html">Progress</a></li>
                                        <li><a href="ui-placeholders.html">Placeholders</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-spinner.html">Spinner</a></li>
                                        <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                        <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                        <li><a href="ui-toasts.html">Toasts</a></li>
                                        <li><a href="ui-tooltips.html">Tooltips</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-video.html">Video</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
                                        <i data-feather="layers"></i><span>Advanced UI</span><span
                                            class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="ui-ribbon.html">Ribbon</a></li>
                                        <li><a href="ui-clipboard.html">Clipboard</a></li>
                                        <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-rating.html">Rating</a></li>
                                        <li><a href="ui-text-editor.html">Text Editor</a></li>
                                        <li><a href="ui-counter.html">Counter</a></li>
                                        <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                        <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                        <li><a href="ui-timeline.html">Timeline</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="bar-chart-2"></i><span>Charts</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chart-apex.html">Apex Charts</a></li>
                                        <li><a href="chart-c3.html">Chart C3</a></li>
                                        <li><a href="chart-js.html">Chart Js</a></li>
                                        <li><a href="chart-morris.html">Morris Charts</a></li>
                                        <li><a href="chart-flot.html">Flot Charts</a></li>
                                        <li><a href="chart-peity.html">Peity Charts</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="database"></i><span>Icons</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                        <li><a href="icon-feather.html">Feather Icons</a></li>
                                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                        <li><a href="icon-material.html">Material Icons</a></li>
                                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                        <li><a href="icon-themify.html">Themify Icons</a></li>
                                        <li><a href="icon-weather.html">Weather Icons</a></li>
                                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                        <li><a href="icon-flag.html">Flag Icons</a></li>
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
                                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                                <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                                <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                                <li><a href="form-select.html">Form Select</a></li>
                                                <li><a href="form-mask.html">Input Masks</a></li>
                                                <li><a href="form-fileupload.html">File Uploads</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);">Layouts<span
                                                    class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                                <li><a href="form-vertical.html">Vertical Form</a></li>
                                                <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="form-validation.html">Form Validation</a></li>
                                        <li><a href="form-select2.html">Select2</a></li>
                                        <li><a href="form-wizard.html">Form Wizard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i
                                            data-feather="columns"></i><span>Tables</span><span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="tables-basic.html">Basic Tables </a></li>
                                        <li><a href="data-tables.html">Data Table </a></li>
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
                    </ul>
                </div>
            </div>
        </div>


        <div class="sidebar collapsed-sidebar" id="collapsed-sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu-2" class="sidebar-menu sidebar-menu-three">
                    <aside id="aside" class="ui-aside">
                        <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#home" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/menu-icon.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link active" href="#messages" id="messages-tab"
                                    data-bs-toggle="tab" data-bs-target="#product" role="tab"
                                    aria-selected="false">
                                    <img src="assets/img/icons/product.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#profile" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#sales" role="tab" aria-selected="false">
                                    <img src="assets/img/icons/sales1.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#report" id="report-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/purchase1.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set" id="set-tab" data-bs-toggle="tab"
                                    data-bs-target="#user" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/users1.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set2" id="set-tab2" data-bs-toggle="tab"
                                    data-bs-target="#employee" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/calendars.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set3" id="set-tab3" data-bs-toggle="tab"
                                    data-bs-target="#report" role="tab" aria-selected="true">
                                    <img src="assets/img/icons/printer.svg" alt>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set4" id="set-tab4" data-bs-toggle="tab"
                                    data-bs-target="#document" role="tab" aria-selected="true">
                                    <i data-feather="user"></i>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set5" id="set-tab6" data-bs-toggle="tab"
                                    data-bs-target="#permission" role="tab" aria-selected="true">
                                    <i data-feather="file-text"></i>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tablinks nav-link" href="#set6" id="set-tab5" data-bs-toggle="tab"
                                    data-bs-target="#settings" role="tab" aria-selected="true">
                                    <i data-feather="settings"></i>
                                </a>
                            </li>

                        </ul>
                    </aside>
                    <div class="tab-content tab-content-four pt-2">
                        <ul class="tab-pane" id="home" aria-labelledby="home-tab">
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Dashboard</span> <span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="index.html">Admin Dashboard</a></li>
                                    <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Application</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chat.html">Chat</a></li>
                                    <li class="submenu submenu-two"><a
                                            href="javascript:void(0);"><span>Call</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="video-call.html">Video Call</a></li>
                                            <li><a href="audio-call.html">Audio Call</a></li>
                                            <li><a href="call-history.html">Call History</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="calendar.html">Calendar</a></li>
                                    <li><a href="email.html">Email</a></li>
                                    <li><a href="todo.html">To Do</a></li>
                                    <li><a href="notes.html">Notes</a></li>
                                    <li><a href="file-manager.html">File Manager</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane active" id="product" aria-labelledby="messages-tab">
                            <li><a href="product-list.html" class="active"><span>Products</span></a></li>
                            <li><a href="add-product.html"><span>Create Product</span></a></li>
                            <li><a href="expired-products.html"><span>Expired Products</span></a></li>
                            <li><a href="low-stocks.html"><span>Low Stocks</span></a></li>
                            <li><a href="category-list.html"><span>Category</span></a></li>
                            <li><a href="sub-categories.html"><span>Sub Category</span></a></li>
                            <li><a href="brand-list.html"><span>Brands</span></a></li>
                            <li><a href="units.html"><span>Units</span></a></li>
                            <li><a href="varriant-attributes.html"><span>Variant Attributes</span></a></li>
                            <li><a href="warranty.html"><span>Warranties</span></a></li>
                            <li><a href="barcode.html"><span>Print Barcode</span></a></li>
                            <li><a href="qrcode.html"><span>Print QR Code</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="sales" aria-labelledby="profile-tab">
                            <li><a href="sales-list.html"><span>Sales</span></a></li>
                            <li><a href="invoice-report.html"><span>Invoices</span></a></li>
                            <li><a href="sales-returns.html"><span>Sales Return</span></a></li>
                            <li><a href="quotation-list.html"><span>Quotation</span></a></li>
                            <li><a href="pos.html"><span>POS</span></a></li>
                            <li><a href="coupons.html"><span>Coupons</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="purchase" aria-labelledby="report-tab">
                            <li><a href="purchase-list.html"><span>Purchases</span></a></li>
                            <li><a href="purchase-order-report.html"><span>Purchase Order</span></a></li>
                            <li><a href="purchase-returns.html"><span>Purchase Return</span></a></li>
                            <li><a href="manage-stocks.html"><span>Manage Stock</span></a></li>
                            <li><a href="stock-adjustment.html"><span>Stock Adjustment</span></a></li>
                            <li><a href="stock-transfer.html"><span>Stock Transfer</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Expenses</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="expense-list.html">Expenses</a></li>
                                    <li><a href="expense-category.html">Expense Category</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="user" aria-labelledby="set-tab">
                            <li><a href="customers.html"><span>Customers</span></a></li>
                            <li><a href="suppliers.html"><span>Suppliers</span></a></li>
                            <li><a href="store-list.html"><span>Stores</span></a></li>
                            <li><a href="warehouse.html"><span>Warehouses</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="employee" aria-labelledby="set-tab2">
                            <li><a href="employees-grid.html"><span>Employees</span></a></li>
                            <li><a href="department-grid.html"><span>Departments</span></a></li>
                            <li><a href="designation.html"><span>Designation</span></a></li>
                            <li><a href="shift.html"><span>Shifts</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Attendence</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="attendance-employee.html">Employee Attendence</a></li>
                                    <li><a href="attendance-admin.html">Admin Attendence</a></li>
                                </ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Leaves</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                    <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                    <li><a href="leave-types.html">Leave Types</a></li>
                                </ul>
                            </li>
                            <li><a href="holidays.html"><span>Holidays</span></a></li>
                            <li class="submenu">
                                <a href="payroll-list.html"><span>Payroll</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payroll-list.html">Employee Salary</a></li>
                                    <li><a href="payslip.html">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="report" aria-labelledby="set-tab3">
                            <li><a href="sales-report.html"><span>Sales Report</span></a></li>
                            <li><a href="purchase-report.html"><span>Purchase report</span></a></li>
                            <li><a href="inventory-report.html"><span>Inventory Report</span></a></li>
                            <li><a href="invoice-report.html"><span>Invoice Report</span></a></li>
                            <li><a href="supplier-report.html"><span>Supplier Report</span></a></li>
                            <li><a href="customer-report.html"><span>Customer Report</span></a></li>
                            <li><a href="expense-report.html"><span>Expense Report</span></a></li>
                            <li><a href="income-report.html"><span>Income Report</span></a></li>
                            <li><a href="tax-reports.html"><span>Tax Report</span></a></li>
                            <li><a href="profit-and-loss.html"><span>Profit & Loss</span></a></li>
                        </ul>
                        <ul class="tab-pane" id="permission" aria-labelledby="set-tab4">
                            <li><a href="users.html"><span>Users</span></a></li>
                            <li><a href="roles-permissions.html"><span>Roles & Permissions</span></a></li>
                            <li><a href="delete-account.html"><span>Delete Account Request</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Base UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                    <li><a href="ui-accordion.html">Accordion</a></li>
                                    <li><a href="ui-avatar.html">Avatar</a></li>
                                    <li><a href="ui-badges.html">Badges</a></li>
                                    <li><a href="ui-borders.html">Border</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-buttons-group.html">Button Group</a></li>
                                    <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                    <li><a href="ui-cards.html">Card</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a></li>
                                    <li><a href="ui-colors.html">Colors</a></li>
                                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                    <li><a href="ui-grid.html">Grid</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-lightbox.html">Lightbox</a></li>
                                    <li><a href="ui-media.html">Media</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                    <li><a href="ui-pagination.html">Pagination</a></li>
                                    <li><a href="ui-popovers.html">Popovers</a></li>
                                    <li><a href="ui-progress.html">Progress</a></li>
                                    <li><a href="ui-placeholders.html">Placeholders</a></li>
                                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                    <li><a href="ui-spinner.html">Spinner</a></li>
                                    <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                    <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                    <li><a href="ui-toasts.html">Toasts</a></li>
                                    <li><a href="ui-tooltips.html">Tooltips</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-video.html">Video</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Advanced UI</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="ui-ribbon.html">Ribbon</a></li>
                                    <li><a href="ui-clipboard.html">Clipboard</a></li>
                                    <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                    <li><a href="ui-rating.html">Rating</a></li>
                                    <li><a href="ui-text-editor.html">Text Editor</a></li>
                                    <li><a href="ui-counter.html">Counter</a></li>
                                    <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                    <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                    <li><a href="ui-timeline.html">Timeline</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Charts</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chart-apex.html">Apex Charts</a></li>
                                    <li><a href="chart-c3.html">Chart C3</a></li>
                                    <li><a href="chart-js.html">Chart Js</a></li>
                                    <li><a href="chart-morris.html">Morris Charts</a></li>
                                    <li><a href="chart-flot.html">Flot Charts</a></li>
                                    <li><a href="chart-peity.html">Peity Charts</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Icons</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                    <li><a href="icon-feather.html">Feather Icons</a></li>
                                    <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                    <li><a href="icon-material.html">Material Icons</a></li>
                                    <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                    <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                    <li><a href="icon-themify.html">Themify Icons</a></li>
                                    <li><a href="icon-weather.html">Weather Icons</a></li>
                                    <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                    <li><a href="icon-flag.html">Flag Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <span>Forms</span><span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Form Elements<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                            <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                            <li><a href="form-input-groups.html">Input Groups</a></li>
                                            <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                            <li><a href="form-select.html">Form Select</a></li>
                                            <li><a href="form-mask.html">Input Masks</a></li>
                                            <li><a href="form-fileupload.html">File Uploads</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);">Layouts<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                            <li><a href="form-vertical.html">Vertical Form</a></li>
                                            <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-select2.html">Select2</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Tables</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="tables-basic.html">Basic Tables </a></li>
                                    <li><a href="data-tables.html">Data Table </a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="document" aria-labelledby="set-tab5">
                            <li><a href="profile.html"><span>Profile</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Authentication</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="signin.html">Cover</a></li>
                                            <li><a href="signin-2.html">Illustration</a></li>
                                            <li><a href="signin-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="register.html">Cover</a></li>
                                            <li><a href="register-2.html">Illustration</a></li>
                                            <li><a href="register-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="forgot-password.html">Cover</a></li>
                                            <li><a href="forgot-password-2.html">Illustration</a></li>
                                            <li><a href="forgot-password-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="reset-password.html">Cover</a></li>
                                            <li><a href="reset-password-2.html">Illustration</a></li>
                                            <li><a href="reset-password-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="email-verification.html">Cover</a></li>
                                            <li><a href="email-verification-2.html">Illustration</a></li>
                                            <li><a href="email-verification-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="two-step-verification.html">Cover</a></li>
                                            <li><a href="two-step-verification-2.html">Illustration</a></li>
                                            <li><a href="two-step-verification-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Error Pages</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="error-404.html">404 Error </a></li>
                                    <li><a href="error-500.html">500 Error </a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Places</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="countries.html">Countries</a></li>
                                    <li><a href="states.html">States</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blank-page.html"><span>Blank Page</span> </a>
                            </li>
                            <li>
                                <a href="coming-soon.html"><span>Coming Soon</span> </a>
                            </li>
                            <li>
                                <a href="under-maintenance.html"><span>Under Maintenance</span> </a>
                            </li>
                        </ul>
                        <ul class="tab-pane" id="settings" aria-labelledby="set-tab6">
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>General Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="general-settings.html">Profile</a></li>
                                    <li><a href="security-settings.html">Security</a></li>
                                    <li><a href="notification.html">Notifications</a></li>
                                    <li><a href="connected-apps.html">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Website Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="system-settings.html">System Settings</a></li>
                                    <li><a href="company-settings.html">Company Settings </a></li>
                                    <li><a href="localization-settings.html">Localization</a></li>
                                    <li><a href="prefixes.html">Prefixes</a></li>
                                    <li><a href="preference.html">Preference</a></li>
                                    <li><a href="appearance.html">Appearance</a></li>
                                    <li><a href="social-authentication.html">Social Authentication</a></li>
                                    <li><a href="language-settings.html">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>App Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="invoice-settings.html">Invoice</a></li>
                                    <li><a href="printer-settings.html">Printer</a></li>
                                    <li><a href="pos-settings.html">POS</a></li>
                                    <li><a href="custom-fields.html">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>System Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="email-settings.html">Email</a></li>
                                    <li><a href="sms-gateway.html">SMS Gateways</a></li>
                                    <li><a href="otp-settings.html">OTP</a></li>
                                    <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Financial Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                    <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                    <li><a href="tax-rates.html">Tax Rates</a></li>
                                    <li><a href="currency-settings.html">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Other Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="storage-settings.html">Storage</a></li>
                                    <li><a href="ban-ip-address.html">Ban IP Address</a></li>
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
                    </div>
                </div>
            </div>
        </div>


        <div class="sidebar horizontal-sidebar">
            <div id="sidebar-menu-3" class="sidebar-menu">
                <ul class="nav">
                    <li class="submenu">
                        <a href="index.html"><i data-feather="grid"></i><span> Main Menu</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Dashboard</span> <span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="index.html">Admin Dashboard</a></li>
                                    <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Application</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chat.html">Chat</a></li>
                                    <li class="submenu submenu-two"><a
                                            href="javascript:void(0);"><span>Call</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="video-call.html">Video Call</a></li>
                                            <li><a href="audio-call.html">Audio Call</a></li>
                                            <li><a href="call-history.html">Call History</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="calendar.html">Calendar</a></li>
                                    <li><a href="email.html">Email</a></li>
                                    <li><a href="todo.html">To Do</a></li>
                                    <li><a href="notes.html">Notes</a></li>
                                    <li><a href="file-manager.html">File Manager</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="active subdrop"><img
                                src="assets/img/icons/product.svg" alt="img"><span> Inventory </span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="product-list.html" class="active"><span>Products</span></a></li>
                            <li><a href="add-product.html"><span>Create Product</span></a></li>
                            <li><a href="expired-products.html"><span>Expired Products</span></a></li>
                            <li><a href="low-stocks.html"><span>Low Stocks</span></a></li>
                            <li><a href="category-list.html"><span>Category</span></a></li>
                            <li><a href="sub-categories.html"><span>Sub Category</span></a></li>
                            <li><a href="brand-list.html"><span>Brands</span></a></li>
                            <li><a href="units.html"><span>Units</span></a></li>
                            <li><a href="varriant-attributes.html"><span>Variant Attributes</span></a></li>
                            <li><a href="warranty.html"><span>Warranties</span></a></li>
                            <li><a href="barcode.html"><span>Print Barcode</span></a></li>
                            <li><a href="qrcode.html"><span>Print QR Code</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg"
                                alt="img"><span>Sales &amp; Purchase</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="sales-list.html"><span>Sales</span></a></li>
                                    <li><a href="invoice-report.html"><span>Invoices</span></a></li>
                                    <li><a href="sales-returns.html"><span>Sales Return</span></a></li>
                                    <li><a href="quotation-list.html"><span>Quotation</span></a></li>
                                    <li><a href="pos.html"><span>POS</span></a></li>
                                    <li><a href="coupons.html"><span>Coupons</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Purchase</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="purchase-list.html"><span>Purchases</span></a></li>
                                    <li><a href="purchase-order-report.html"><span>Purchase Order</span></a></li>
                                    <li><a href="purchase-returns.html"><span>Purchase Return</span></a></li>
                                    <li><a href="manage-stocks.html"><span>Manage Stock</span></a></li>
                                    <li><a href="stock-adjustment.html"><span>Stock Adjustment</span></a></li>
                                    <li><a href="stock-transfer.html"><span>Stock Transfer</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Expenses</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="expense-list.html">Expenses</a></li>
                                    <li><a href="expense-category.html">Expense Category</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg"
                                alt="img"><span>User Management</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>People</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="customers.html"><span>Customers</span></a></li>
                                    <li><a href="suppliers.html"><span>Suppliers</span></a></li>
                                    <li><a href="store-list.html"><span>Stores</span></a></li>
                                    <li><a href="warehouse.html"><span>Warehouses</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Roles &amp; Permissions</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="roles-permissions.html"><span>Roles & Permissions</span></a></li>
                                    <li><a href="delete-account.html"><span>Delete Account Request</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Base UI</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                    <li><a href="ui-accordion.html">Accordion</a></li>
                                    <li><a href="ui-avatar.html">Avatar</a></li>
                                    <li><a href="ui-badges.html">Badges</a></li>
                                    <li><a href="ui-borders.html">Border</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-buttons-group.html">Button Group</a></li>
                                    <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                    <li><a href="ui-cards.html">Card</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a></li>
                                    <li><a href="ui-colors.html">Colors</a></li>
                                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                    <li><a href="ui-grid.html">Grid</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-lightbox.html">Lightbox</a></li>
                                    <li><a href="ui-media.html">Media</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                    <li><a href="ui-pagination.html">Pagination</a></li>
                                    <li><a href="ui-popovers.html">Popovers</a></li>
                                    <li><a href="ui-progress.html">Progress</a></li>
                                    <li><a href="ui-placeholders.html">Placeholders</a></li>
                                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                    <li><a href="ui-spinner.html">Spinner</a></li>
                                    <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                    <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                    <li><a href="ui-toasts.html">Toasts</a></li>
                                    <li><a href="ui-tooltips.html">Tooltips</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-video.html">Video</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Advanced UI</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="ui-ribbon.html">Ribbon</a></li>
                                    <li><a href="ui-clipboard.html">Clipboard</a></li>
                                    <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                    <li><a href="ui-rating.html">Rating</a></li>
                                    <li><a href="ui-text-editor.html">Text Editor</a></li>
                                    <li><a href="ui-counter.html">Counter</a></li>
                                    <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                    <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                    <li><a href="ui-timeline.html">Timeline</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Charts</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="chart-apex.html">Apex Charts</a></li>
                                    <li><a href="chart-c3.html">Chart C3</a></li>
                                    <li><a href="chart-js.html">Chart Js</a></li>
                                    <li><a href="chart-morris.html">Morris Charts</a></li>
                                    <li><a href="chart-flot.html">Flot Charts</a></li>
                                    <li><a href="chart-peity.html">Peity Charts</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Primary Icons</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                    <li><a href="icon-feather.html">Feather Icons</a></li>
                                    <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                    <li><a href="icon-material.html">Material Icons</a></li>
                                    <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Secondary Icons</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                    <li><a href="icon-themify.html">Themify Icons</a></li>
                                    <li><a href="icon-weather.html">Weather Icons</a></li>
                                    <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                    <li><a href="icon-flag.html">Flag Icons</a></li>
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
                                            <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                            <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                            <li><a href="form-input-groups.html">Input Groups</a></li>
                                            <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                            <li><a href="form-select.html">Form Select</a></li>
                                            <li><a href="form-mask.html">Input Masks</a></li>
                                            <li><a href="form-fileupload.html">File Uploads</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two">
                                        <a href="javascript:void(0);"><span> Layouts</span><span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                            <li><a href="form-vertical.html">Vertical Form</a></li>
                                            <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-select2.html">Select2</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Tables</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="tables-basic.html">Basic Tables </a></li>
                                    <li><a href="data-tables.html">Data Table </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><i data-feather="user"></i><span>Profile</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="profile.html"><span>Profile</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Authentication</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="signin.html">Cover</a></li>
                                            <li><a href="signin-2.html">Illustration</a></li>
                                            <li><a href="signin-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                                class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="register.html">Cover</a></li>
                                            <li><a href="register-2.html">Illustration</a></li>
                                            <li><a href="register-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="forgot-password.html">Cover</a></li>
                                            <li><a href="forgot-password-2.html">Illustration</a></li>
                                            <li><a href="forgot-password-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                            Password<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="reset-password.html">Cover</a></li>
                                            <li><a href="reset-password-2.html">Illustration</a></li>
                                            <li><a href="reset-password-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="email-verification.html">Cover</a></li>
                                            <li><a href="email-verification-2.html">Illustration</a></li>
                                            <li><a href="email-verification-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                            Verification<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="two-step-verification.html">Cover</a></li>
                                            <li><a href="two-step-verification-2.html">Illustration</a></li>
                                            <li><a href="two-step-verification-3.html">Basic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="error-404.html">404 Error </a></li>
                                    <li><a href="error-500.html">500 Error </a></li>
                                    <li>
                                        <a href="blank-page.html"><span>Blank Page</span> </a>
                                    </li>
                                    <li>
                                        <a href="coming-soon.html"><span>Coming Soon</span> </a>
                                    </li>
                                    <li>
                                        <a href="under-maintenance.html"><span>Under Maintenance</span> </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Places</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="countries.html">Countries</a></li>
                                    <li><a href="states.html">States</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Employees</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="employees-grid.html"><span>Employees</span></a></li>
                                    <li><a href="department-grid.html"><span>Departments</span></a></li>
                                    <li><a href="designation.html"><span>Designation</span></a></li>
                                    <li><a href="shift.html"><span>Shifts</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Attendence</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="attendance-employee.html">Employee Attendence</a></li>
                                    <li><a href="attendance-admin.html">Admin Attendence</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Leaves &amp; Holidays</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                    <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                    <li><a href="leave-types.html">Leave Types</a></li>
                                    <li><a href="holidays.html"><span>Holidays</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="payroll-list.html"><span>Payroll</span><span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payroll-list.html">Employee Salary</a></li>
                                    <li><a href="payslip.html">Payslip</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/printer.svg"
                                alt="img"><span>Reports</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="sales-report.html"><span>Sales Report</span></a></li>
                            <li><a href="purchase-report.html"><span>Purchase report</span></a></li>
                            <li><a href="inventory-report.html"><span>Inventory Report</span></a></li>
                            <li><a href="invoice-report.html"><span>Invoice Report</span></a></li>
                            <li><a href="supplier-report.html"><span>Supplier Report</span></a></li>
                            <li><a href="customer-report.html"><span>Customer Report</span></a></li>
                            <li><a href="expense-report.html"><span>Expense Report</span></a></li>
                            <li><a href="income-report.html"><span>Income Report</span></a></li>
                            <li><a href="tax-reports.html"><span>Tax Report</span></a></li>
                            <li><a href="profit-and-loss.html"><span>Profit & Loss</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg"
                                alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>General Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="general-settings.html">Profile</a></li>
                                    <li><a href="security-settings.html">Security</a></li>
                                    <li><a href="notification.html">Notifications</a></li>
                                    <li><a href="connected-apps.html">Connected Apps</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Website Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="system-settings.html">System Settings</a></li>
                                    <li><a href="company-settings.html">Company Settings </a></li>
                                    <li><a href="localization-settings.html">Localization</a></li>
                                    <li><a href="prefixes.html">Prefixes</a></li>
                                    <li><a href="preference.html">Preference</a></li>
                                    <li><a href="appearance.html">Appearance</a></li>
                                    <li><a href="social-authentication.html">Social Authentication</a></li>
                                    <li><a href="language-settings.html">Language</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>App Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="invoice-settings.html">Invoice</a></li>
                                    <li><a href="printer-settings.html">Printer</a></li>
                                    <li><a href="pos-settings.html">POS</a></li>
                                    <li><a href="custom-fields.html">Custom Fields</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>System Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="email-settings.html">Email</a></li>
                                    <li><a href="sms-gateway.html">SMS Gateways</a></li>
                                    <li><a href="otp-settings.html">OTP</a></li>
                                    <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Financial Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                    <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                    <li><a href="tax-rates.html">Tax Rates</a></li>
                                    <li><a href="currency-settings.html">Currencies</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><span>Other Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="storage-settings.html">Storage</a></li>
                                    <li><a href="ban-ip-address.html">Ban IP Address</a></li>
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
                    </li>
                </ul>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="add-item d-flex">
                        <div class="page-title">
                            <h4>Product List</h4>
                            <h6>Manage your products</h6>
                        </div>
                    </div>
                    <ul class="table-top-head">
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                                    src="assets/img/icons/pdf.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                                    src="assets/img/icons/excel.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i
                                    data-feather="printer" class="feather-rotate-ccw"></i></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                    data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse"
                                id="collapse-header"><i data-feather="chevron-up"
                                    class="feather-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="page-btn">
                        <a href="add-product.html" class="btn btn-added"><i data-feather="plus-circle"
                                class="me-2"></i>Add New Product</a>
                    </div>
                    <div class="page-btn import">
                        <a href="#" class="btn btn-added color" data-bs-toggle="modal"
                            data-bs-target="#view-notes"><i data-feather="download" class="me-2"></i>Import
                            Product</a>
                    </div>
                </div>

                <div class="card table-list-card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn btn-searchset"><i
                                            data-feather="search" class="feather-search"></i></a>
                                </div>
                            </div>
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <i data-feather="filter" class="filter-icon"></i>
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="form-sort">
                                <i data-feather="sliders" class="info-img"></i>
                                <select class="select">
                                    <option>Sort by Date</option>
                                    <option>14 09 23</option>
                                    <option>11 09 23</option>
                                </select>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="box" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>
                                                            Lenovo 3rd Generation</option>
                                                        <option>Nike Jordan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="stop-circle" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Categroy</option>
                                                        <option>Laptop</option>
                                                        <option>Shoe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="git-merge" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="stop-circle" class="info-img"></i>
                                                    <select class="select">
                                                        <option>All Brand</option>
                                                        <option>Lenovo</option>
                                                        <option>Nike</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i class="fas fa-money-bill info-img"></i>
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>$12500.00</option>
                                                        <option>$12500.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                                            class="feather-search"></i> Search </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive product-list">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th>Qty</th>
                                        <th>Created by</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-01.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Lenovo 3rd Generation </a>
                                            </div>
                                        </td>
                                        <td>PT001 </td>
                                        <td>Laptop</td>
                                        <td>Lenovo</td>
                                        <td>$12500.00</td>
                                        <td>Pc</td>
                                        <td>100</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-30.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Arroon</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon  p-2" href="product-details.html">
                                                    <i data-feather="eye" class="feather-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-06.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Bold V3.2</a>
                                            </div>
                                        </td>
                                        <td>PT002</td>
                                        <td>Electronics</td>
                                        <td>Bolt</td>
                                        <td>$1600.00</td>
                                        <td>Pc</td>
                                        <td>140</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-13.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Kenneth</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-02.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Nike Jordan</a>
                                            </div>
                                        </td>
                                        <td>PT003</td>
                                        <td>Shoe</td>
                                        <td>Nike</td>
                                        <td>$6000.00</td>
                                        <td>Pc</td>
                                        <td>780</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-11.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Gooch</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-03.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Apple Series 5 Watch</a>
                                            </div>
                                        </td>
                                        <td>PT004</td>
                                        <td>Electronics</td>
                                        <td>Apple</td>
                                        <td>$25000.00</td>
                                        <td>Pc</td>
                                        <td>450</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-03.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Nathan</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-04.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Amazon Echo Dot</a>
                                            </div>
                                        </td>
                                        <td>PT005</td>
                                        <td>Speaker</td>
                                        <td>Amazon</td>
                                        <td>$1600.00</td>
                                        <td>Pc</td>
                                        <td>477</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-02.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Alice</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/stock-img-05.png" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Lobar Handy</a>
                                            </div>
                                        </td>
                                        <td>PT006</td>
                                        <td>Furnitures</td>
                                        <td>Woodmart</td>
                                        <td>$4521.00</td>
                                        <td>Kg</td>
                                        <td>145</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-05.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Robb</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-01.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Red Premium Handy</a>
                                            </div>
                                        </td>
                                        <td>PT007</td>
                                        <td>Bags</td>
                                        <td>Versace</td>
                                        <td>$2024.00</td>
                                        <td>Kg</td>
                                        <td>747</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-08.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Steven</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-02.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Iphone 14 Pro</a>
                                            </div>
                                        </td>
                                        <td>PT008</td>
                                        <td>Phone</td>
                                        <td>Iphone</td>
                                        <td>$1698.00</td>
                                        <td>Pc</td>
                                        <td>897</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-04.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Gravely</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-03.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Black Slim 200</a>
                                            </div>
                                        </td>
                                        <td>PT009</td>
                                        <td>Chairs</td>
                                        <td>Bently</td>
                                        <td>$6794.00</td>
                                        <td>Pc</td>
                                        <td>741</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-01.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Kevin</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="assets/img/products/expire-product-04.png"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Woodcraft Sandal</a>
                                            </div>
                                        </td>
                                        <td>PT010</td>
                                        <td>Bags</td>
                                        <td>Woodcraft</td>
                                        <td>$4547.00</td>
                                        <td>Kg</td>
                                        <td>148</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="assets/img/users/user-10.jpg" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Grillo</a>
                                            </div>
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon p-2" href="product-details.html">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="edit-product.html">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-end em-payrol-add" tabindex="-1" id="offcanvasRight-add">
        <div class="offcanvas-body p-0">
            <div class="page-wrapper-new">
                <div class="content">
                    <div class="page-header justify-content-between">
                        <div class="page-title">
                            <h4>Create New Product</h4>
                        </div>
                        <div class="page-btn">
                            <a href="javascript:void(0);" class="btn btn-added " data-bs-dismiss="offcanvas"><i
                                    data-feather="arrow-left" class="me-2"></i>Back to Product List</a>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div class="card-body add-product pb-0 ps-0 pe-0">
                            <div class="accordion-card-one accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingOne">
                                        <div class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-controls="collapseOne">
                                            <div class="addproduct-icon">
                                                <h5><i data-feather="info" class="add-info"></i><span>Product
                                                        Information</span></h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Store</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Computers</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Warehouse</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Computers</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Product Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Slug</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="form-group add-product list">
                                                        <label>SKU</label>
                                                        <input type="text" class="form-control list"
                                                            placeholder="Enter SKU">
                                                        <button type="submit" class="btn btn-primaryadd">
                                                            Generate Code
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="addservice-info">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label">Category</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-units-category"><i
                                                                        data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add
                                                                        New</span></a>
                                                            </div>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Computers</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label">Choose Category</label>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Computers</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label">Sub Category</label>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Computers</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-product-new">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label">Brand</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-units-brand"><i
                                                                        data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add
                                                                        new</span></a>
                                                            </div>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Nike</option>
                                                                <option>Bolt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label">Unit</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-unit"><i
                                                                        data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add
                                                                        New</span></a>
                                                            </div>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Kg</option>
                                                                <option>Pc</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label">Selling Type</label>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Computers</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Barcode Symbology</label>
                                                        <select class="select">
                                                            <option>Choose</option>
                                                            <option>Code34</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="form-group add-product list">
                                                        <label>Item Code</label>
                                                        <input type="text" class="form-control list"
                                                            placeholder="Please Enter Item Code">
                                                        <button type="submit" class="btn btn-primaryadd">
                                                            Generate Code
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group summer-description-box transfer mb-3">
                                                        <label>Description</label>
                                                        <div id="summernote3">
                                                        </div>
                                                        <p>Maximum 60 Characters</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card-one accordion" id="accordionExample2">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingTwo">
                                        <div class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-controls="collapseTwo">
                                            <div class="text-editor add-list">
                                                <div class="addproduct-icon list icon">
                                                    <h5><i data-feather="life-buoy"
                                                            class="add-info"></i><span>Pricing & Stocks</span></h5>
                                                    <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                            class="chevron-down-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                            <div class="form-group add-products">
                                                <label class="d-block">Product Type</label>
                                                <div class="single-pill-product">
                                                    <ul class="nav nav-pills" id="pills-tab1" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <span class="custom_radio me-4 mb-0 active"
                                                                id="pills-home-tab" data-bs-toggle="pill"
                                                                data-bs-target="#pills-home" role="tab"
                                                                aria-controls="pills-home" aria-selected="true">
                                                                <input type="radio" class="form-control"
                                                                    name="payment">
                                                                <span class="checkmark"></span> Single Product</span>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <span class="custom_radio me-2 mb-0"
                                                                id="pills-profile-tab" data-bs-toggle="pill"
                                                                data-bs-target="#pills-profile" role="tab"
                                                                aria-controls="pills-profile" aria-selected="false">
                                                                <input type="radio" class="form-control"
                                                                    name="sign">
                                                                <span class="checkmark"></span> Variable
                                                                Product</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home"
                                                    role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Quantity</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Tax Type</label>
                                                                <select class="select">
                                                                    <option>Choose</option>
                                                                    <option>Type</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Discount Type</label>
                                                                <select class="select">
                                                                    <option>Choose</option>
                                                                    <option>Type</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Discount Value</label>
                                                                <input type="text" placeholder="Choose">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Quantity Alert</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-card-one accordion"
                                                        id="accordionExample3">
                                                        <div class="accordion-item">
                                                            <div class="accordion-header" id="headingThree">
                                                                <div class="accordion-button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-controls="collapseThree">
                                                                    <div class="addproduct-icon list">
                                                                        <h5><i data-feather="image"
                                                                                class="add-info"></i><span>Images</span>
                                                                        </h5>
                                                                        <a href="javascript:void(0);"><i
                                                                                data-feather="chevron-down"
                                                                                class="chevron-down-add"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="collapseThree"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample3">
                                                                <div class="accordion-body">
                                                                    <div class="text-editor add-list add">
                                                                        <div class="col-lg-12">
                                                                            <div class="add-choosen">
                                                                                <div class="input-blocks">
                                                                                    <div class="image-upload">
                                                                                        <input type="file">
                                                                                        <div class="image-uploads">
                                                                                            <i data-feather="plus-circle"
                                                                                                class="plus-down-add"></i>
                                                                                            <h4>Add Images</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="phone-img">
                                                                                    <img src="assets/img/products/phone-add-2.png"
                                                                                        alt="image">
                                                                                    <a href="javascript:void(0);"><i
                                                                                            data-feather="x"
                                                                                            class="x-square-add remove-product"></i></a>
                                                                                </div>
                                                                                <div class="phone-img">
                                                                                    <img src="assets/img/products/phone-add-1.png"
                                                                                        alt="image">
                                                                                    <a href="javascript:void(0);"><i
                                                                                            data-feather="x"
                                                                                            class="x-square-add remove-product"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                    aria-labelledby="pills-profile-tab">
                                                    <div class="row select-color-add">
                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                            <div class="form-group add-product">
                                                                <label>Variant Attribute</label>
                                                                <div class="row">
                                                                    <div class="col-lg-10 col-sm-10 col-10">
                                                                        <select
                                                                            class="form-control variant-select select-option"
                                                                            id="colorSelect">
                                                                            <option>Choose</option>
                                                                            <option>Color</option>
                                                                            <option value="red">Red</option>
                                                                            <option value="black">Black</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                                        <div class="add-icon tab">
                                                                            <a class="btn btn-filter"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#add-units"><i
                                                                                    class="feather feather-plus-circle"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="selected-hide-color" id="input-show">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-blocks">
                                                                            <input class="input-tags form-control"
                                                                                id="inputBox" type="text"
                                                                                data-role="tagsinput"
                                                                                name="specialist"
                                                                                value="red, black">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group ">
                                                                            <a href="javascript:void(0);"
                                                                                class="remove-color"><i
                                                                                    class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body-table variant-table" id="variant-table">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Variantion</th>
                                                                        <th>Variant Value</th>
                                                                        <th>SKU</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                        <th class="no-sort">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="color">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="red">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="1234">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="product-quantity">
                                                                                <span class="quantity-btn">+<i
                                                                                        data-feather="plus-circle"
                                                                                        class="plus-circle"></i></span>
                                                                                <input type="text"
                                                                                    class="quntity-input"
                                                                                    value="2">
                                                                                <span class="quantity-btn"><i
                                                                                        data-feather="minus-circle"
                                                                                        class="feather-search"></i></span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="50000">
                                                                            </div>
                                                                        </td>
                                                                        <td class="action-table-data">
                                                                            <div class="edit-delete-action">
                                                                                <div class="input-block add-lists">
                                                                                    <label class="checkboxs">
                                                                                        <input type="checkbox"
                                                                                            checked>
                                                                                        <span
                                                                                            class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <a class="me-2 p-2"
                                                                                    href="javascript:void(0);"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#add-variation">
                                                                                    <i data-feather="plus"
                                                                                        class="feather-edit"></i>
                                                                                </a>
                                                                                <a class="confirm-text p-2"
                                                                                    href="javascript:void(0);"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#add-variation">
                                                                                    <i data-feather="trash-2"
                                                                                        class="feather-trash-2"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="color">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="black">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="2345">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="product-quantity">
                                                                                <span class="quantity-btn">+<i
                                                                                        data-feather="plus-circle"
                                                                                        class="plus-circle"></i></span>
                                                                                <input type="text"
                                                                                    class="quntity-input"
                                                                                    value="3">
                                                                                <span class="quantity-btn"><i
                                                                                        data-feather="minus-circle"
                                                                                        class="feather-search"></i></span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="add-product">
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    value="50000">
                                                                            </div>
                                                                        </td>
                                                                        <td class="action-table-data">
                                                                            <div class="edit-delete-action">
                                                                                <div class="input-block add-lists">
                                                                                    <label class="checkboxs">
                                                                                        <input type="checkbox"
                                                                                            checked>
                                                                                        <span
                                                                                            class="checkmarks"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <a class="me-2 p-2" href="#"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-units">
                                                                                    <i data-feather="plus"
                                                                                        class="feather-edit"></i>
                                                                                </a>
                                                                                <a class="confirm-text p-2"
                                                                                    href="javascript:void(0);">
                                                                                    <i data-feather="trash-2"
                                                                                        class="feather-trash-2"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card-one accordion" id="accordionExample4">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingFour">
                                        <div class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-controls="collapseFour">
                                            <div class="text-editor add-list">
                                                <div class="addproduct-icon list">
                                                    <h5><i data-feather="list" class="add-info"></i><span>Custom
                                                            Fields</span></h5>
                                                    <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                            class="chevron-down-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseFour" class="accordion-collapse collapse show"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                            <div class="text-editor add-list add">
                                                <div class="custom-filed">
                                                    <div class="input-block add-lists">
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>Warranties
                                                        </label>
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>Manufacturer
                                                        </label>
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>Expiry
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="form-group add-product">
                                                            <label>Discount Type</label>
                                                            <select class="select">
                                                                <option>Choose</option>
                                                                <option>Type</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="form-group add-product">
                                                            <label>Quantity Alert</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks">
                                                            <label>Manufactured Date</label>
                                                            <div class="input-groupicon calender-input">
                                                                <i data-feather="calendar" class="info-img"></i>
                                                                <input type="text" class="datetimepicker"
                                                                    placeholder="Choose Date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks">
                                                            <label>Expiry On</label>
                                                            <div class="input-groupicon calender-input">
                                                                <i data-feather="calendar" class="info-img"></i>
                                                                <input type="text" class="datetimepicker"
                                                                    placeholder="Choose Date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-addproduct mb-4">
                                <a href="product-list.html" class="btn btn-cancel">Reset</a>
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Save Product</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-units">
        <div class="modal-dialog modal-dialog-centered stock-adjust-modal">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add Variation Attribute</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Attribute Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Add Value</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="nav user-menu">
                                        <li class="nav-item nav-searchinputs">
                                            <div class="top-nav-search">
                                                <form action="#" class="dropdown">
                                                    <div class="searchinputs list dropdown-toggle"
                                                        id="dropdownMenuClickable2" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="false">
                                                        <input type="text" placeholder="Search">
                                                        <i data-feather="search" class="feather-16 icon"></i>
                                                        <div class="search-addon d-none">
                                                            <span><i data-feather="x-circle"
                                                                    class="feather-14"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu search-dropdown idea"
                                                        aria-labelledby="dropdownMenuClickable">
                                                        <div class="search-info">
                                                            <p>Black </p>
                                                            <p>Red</p>
                                                            <p>Green</p>
                                                            <p>S</p>
                                                            <p>M</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-footer-btn popup">
                                        <a href="javascript:void(0);" class="btn btn-cancel me-2">Cancel</a>
                                        <a href="javascript:void(0);" class="btn btn-submit">Create Adjustment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-units-category">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add New Category</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="units.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-units-brand">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add New Brand</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="units.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-unit">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add Unit</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="units.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-variation">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add Variation</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="modal-title-head people-cust-avatar">
                                <h6>Variant Thumbnail</h6>
                            </div>
                            <div class="new-employee-field">
                                <div class="profile-pic-upload">
                                    <div class="profile-pic">
                                        <span><i data-feather="plus-circle" class="plus-down-add"></i> Add
                                            Image</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="image-upload mb-0">
                                            <input type="file">
                                            <div class="image-uploads">
                                                <h4>Change Image</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Barcode Symbology</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Code34</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <div class="form-group add-product list">
                                            <label>Item Code</label>
                                            <input type="text" class="form-control list" value="455454478844">
                                            <button type="submit" class="btn btn-primaryadd">
                                                Generate Code
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group image-upload-down">
                                        <div class="image-upload download">
                                            <input type="file">
                                            <div class="image-uploads">
                                                <img src="assets/img/download-img.png" alt="img">
                                                <h4>Drag and drop a <span>file to upload</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-body">
                                        <div class="text-editor add-list add">
                                            <div class="col-lg-12">
                                                <div class="add-choosen mb-3">
                                                    <div class="phone-img ms-0">
                                                        <img src="assets/img/products/phone-add-2.png"
                                                            alt="image">
                                                        <a href="javascript:void(0);"><i data-feather="x"
                                                                class="x-square-add remove-product"></i></a>
                                                    </div>
                                                    <div class="phone-img">
                                                        <img src="assets/img/products/phone-add-1.png"
                                                            alt="image">
                                                        <a href="javascript:void(0);"><i data-feather="x"
                                                                class="x-square-add remove-product"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity Alert</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Tax Type</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Direct</option>
                                            <option>Indirect</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Tax </label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Income Tax</option>
                                            <option>Service Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-0">
                                    <div class="mb-3">
                                        <label class="form-label">Discount Type </label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Percentage</option>
                                            <option>Early Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-0">
                                    <div>
                                        <label class="form-label">Discount Value</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <a href="javascript:void(0);" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</a>
                                <a href="warehouse.html" class="btn btn-submit">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="view-notes">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Import Product</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="product-list.html">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <label>Product</label>
                                            <select class="select">
                                                <option>Choose</option>
                                                <option>Bold V3.2</option>
                                                <option>Nike Jordan</option>
                                                <option>Iphone 14 Pro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <label>Category</label>
                                            <select class="select">
                                                <option>Choose</option>
                                                <option>Laptop</option>
                                                <option>Electronics</option>
                                                <option>Shoe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <label>Satus</label>
                                            <select class="select">
                                                <option>Choose</option>
                                                <option>Lenovo</option>
                                                <option>Bolt</option>
                                                <option>Nike</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-6 col-12">
                                        <div class="row">
                                            <div>
                                                <div class="modal-footer-btn download-file">
                                                    <a href="javascript:void(0)" class="btn btn-submit">Download
                                                        Sample File</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-blocks image-upload-down">
                                            <label> Upload CSV File</label>
                                            <div class="image-upload download">
                                                <input type="file">
                                                <div class="image-uploads">
                                                    <img src="assets/img/download-img.png" alt="img">
                                                    <h4>Drag and drop a <span>file to upload</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Created by</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 input-blocks">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control"></textarea>
                                        <p class="mt-1">Maximum 60 Characters</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-footer-btn">
                                        <button type="button" class="btn btn-cancel me-2"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/feather.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/jquery.slimscroll.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/jquery.dataTables.min.js" type="186635e1e8d6037529661056-text/javascript"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/plugins/summernote/summernote-bs4.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/moment.min.js" type="186635e1e8d6037529661056-text/javascript"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js" type="186635e1e8d6037529661056-text/javascript"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="assets/js/theme-script.js" type="186635e1e8d6037529661056-text/javascript"></script>
    <script src="assets/js/script.js" type="186635e1e8d6037529661056-text/javascript"></script>

    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="186635e1e8d6037529661056-|49" defer></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Color Admin | POS - Counter Checkout System</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content name="description" />
<meta content name="author" />

<link href="../assets/css/vendor.min.css" rel="stylesheet" />
<link href="../assets/css/default/app.min.css" rel="stylesheet" />

</head>
<body class="pace-top">

<div id="loader" class="app-loader">
<span class="spinner"></span>
</div>


<div id="app" class="app app-content-full-height app-without-header app-without-sidebar">

<div id="content" class="app-content p-0">

<div class="pos pos-with-header pos-with-sidebar" id="pos">

<div class="pos-header">
<div class="logo">
<a href="pos_counter_checkout.html">
<div class="logo-img"><i class="fa fa-bowl-rice fs-2"></i></div>
<div class="logo-text">Pine & Dine</div>
</a>
</div>
<div class="time" id="time">00:00</div>
<div class="nav">
<div class="nav-item">
<a href="pos_kitchen_order.html" class="nav-link">
<i class="far fa-clock nav-icon"></i>
</a>
</div>
<div class="nav-item">
<a href="pos_table_booking.html" class="nav-link">
<i class="far fa-calendar-check nav-icon"></i>
</a>
</div>
<div class="nav-item">
<a href="pos_menu_stock.html" class="nav-link">
<i class="fa fa-chart-pie nav-icon"></i>
</a>
</div>
</div>
</div>


<div class="pos-content">
<div class="pos-content-container">
<div class="d-md-flex align-items-center mb-4">
<div class="pos-booking-title flex-1">
<div class="fs-24px mb-1">Available Table (13/20)</div>
<div class="mb-2 mb-md-0 d-flex">
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-gray-500 fs-9px me-1"></i> Reserved
</div>
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-warning fs-9px me-1"></i> Table In-use
</div>
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-theme fs-9px me-1"></i> Table Available
</div>
</div>
</div>
</div>
<div class="pos-table-row">
<div class="pos-table in-use selected">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">1</div>
<div class="order"><span>9 orders</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">4 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">35:20</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$318.20</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">Unpaid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">2</div>
<div class="order"><span>12 orders</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">6 / 8</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">12:69</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$682.20</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">Unpaid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">3</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">4</div>
<div class="order"><span>max 4 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">5</div>
<div class="order"><span>max 4 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">6</div>
<div class="order"><span>3 orders</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">3 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">20:52</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$56.49</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">unpaid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">7</div>
<div class="order"><span>6 order</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">3 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">58:40</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$329.02</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-check-circle"></i></span>
<span class="text">Paid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">8</div>
<div class="order"><span>0 order</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">2 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">05:12</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$0.00</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">unpaid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">9</div>
<div class="order"><span>4 order</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">2 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">52:58</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$49.50</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">Unpaid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table in-use">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">10</div>
<div class="order"><span>12 order</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">9 / 12</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">66:69</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">$768.24</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-check-circle"></i></span>
<span class="text">Paid</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table disabled">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">11</div>
<div class="order"><span>Reserved for Sean</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 4</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">12</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">13</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">14</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">15</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">16</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">17</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">18</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">19</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
<div class="pos-table available">
<a href="#" class="pos-table-container" data-toggle="select-table">
<div class="pos-table-status"></div>
<div class="pos-table-name">
<div class="name">Table</div>
<div class="no">20</div>
<div class="order"><span>max 6 pax</span></div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-user"></i></span>
<span class="text">0 / 6</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-clock"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
<div class="pos-table-info-row">
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="fa fa-receipt"></i></span>
<span class="text">-</span>
</div>
</div>
<div class="pos-table-info-col">
<div class="pos-table-info-container">
<span class="icon opacity-50"><i class="far fa-dollar-sign"></i></span>
<span class="text">-</span>
</div>
</div>
</div>
</a>
</div>
</div>
</div>
</div>


<div class="pos-sidebar">
<div class="pos-sidebar-header">
<div class="back-btn">
<button type="button" data-dismiss-class="pos-sidebar-mobile-toggled" data-target="#pos" class="btn">
<i class="fa fa-chevron-left"></i>
</button>
</div>
<div class="icon"><i class="fa fa-plate-wheat"></i></div>
<div class="title">Table 01</div>
<div class="order">Order: <b>#0001</b></div>
</div>
<div class="pos-sidebar-body">
<div class="pos-table" data-id="pos-table-info">
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-2.jpg)"></div>
<div class="info">
<div class="title">Grill Pork Chop</div>
<div class="desc">- size: large</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$12.99</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-8.jpg)"></div>
<div class="info">
<div class="title">Orange Juice</div>
<div class="desc">
- size: large<br/>
- less ice
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x2</div>
<div class="col-3 total-price">$10.00</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-13.jpg)"></div>
<div class="info">
<div class="title">Vanilla Ice-cream</div>
<div class="desc">
- scoop: 1 <br/>
- flavour: vanilla
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$3.99</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-1.jpg)"></div>
<div class="info">
<div class="title">Grill chicken chop</div>
<div class="desc">
- size: large<br/>
- spicy: medium
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$10.99</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-10.jpg)"></div>
<div class="info">
<div class="title">Mushroom Soup</div>
<div class="desc">
- size: large<br/>
- more cheese
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$3.99</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-5.jpg)"></div>
<div class="info">
<div class="title">Hawaiian Pizza</div>
<div class="desc">
- size: large<br/>
- more onion
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$15.00</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-15.jpg)"></div>
<div class="info">
<div class="title">Perfect Yeast Doughnuts</div>
<div class="desc">
- size: 1 set<br/>
- flavour: random
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$2.99</div>
</div>
<div class="row pos-table-row">
<div class="col-8">
<div class="pos-product-thumb">
<div class="img" style="background-image: url(../assets/img/pos/product-14.jpg)"></div>
<div class="info">
<div class="title">Macarons</div>
<div class="desc">
- size: 1 set<br/>
- flavour: random
</div>
</div>
</div>
</div>
<div class="col-1 total-qty">x1</div>
<div class="col-3 total-price">$4.99</div>
</div>
</div>
<div class="h-100 d-none align-items-center justify-content-center text-center p-20" data-id="pos-table-empty">
<div>
<div class="mb-3">
<svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
<path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
</svg>
</div>
<h4>No table selected</h4>
</div>
</div>
</div>
<div class="pos-sidebar-footer">
<div class="d-flex align-items-center mb-2">
<div>Subtotal</div>
<div class="flex-1 text-end h6 mb-0">$64.94</div>
</div>
<div class="d-flex align-items-center">
<div>Taxes (6%)</div>
<div class="flex-1 text-end h6 mb-0">$3.90</div>
</div>
<hr class="opacity-1 my-10px">
<div class="d-flex align-items-center mb-2">
<div>Total</div>
<div class="flex-1 text-end h4 mb-0">$68.84</div>
</div>
<div class="d-flex align-items-center mt-3">
<a href="#" class="btn btn-default w-80px rounded-3 text-center me-10px">
<i class="fab fa-paypal d-block fs-18px my-1"></i>
E-Wallet
</a>
<a href="#" class="btn btn-default w-80px rounded-3 text-center me-10px">
<i class="fab fa-cc-visa d-block fs-18px my-1"></i>
CC
</a>
<a href="#" class="btn btn-theme rounded-3 text-center flex-1">
<i class="fa fa-wallet d-block fs-18px my-1"></i>
Pay by Cash
</a>
</div>
</div>
</div>

</div>

</div>


<div class="theme-panel">
<a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
<div class="theme-panel-content" data-scrollbar="true" data-height="100%">
<h5>App Settings</h5>

<div class="theme-list">
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
<div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal" data-theme-class data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme-class="theme-cyan" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue" data-theme-class="theme-blue" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
</div>

<div class="theme-panel-divider"></div>
<div class="row mt-10px">
<div class="col-8 control-label text-body fw-bold">
<div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span></div>
<div class="lh-14">
<small class="text-body opacity-50">
Adjust the appearance to reduce glare and give your eyes a break.
</small>
</div>
</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1" />
<label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
</div>
</div>
</div>
<div class="theme-panel-divider"></div>

<div class="row mt-10px align-items-center">
<div class="col-8 control-label text-body fw-bold">Header Fixed</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked />
<label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label text-body fw-bold">Header Inverse</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse" value="1" />
<label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked />
<label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label text-body fw-bold">Sidebar Grid</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1" />
<label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
</div>
</div>
</div>
<div class="row mt-10px align-items-center">
<div class="col-8 control-label text-body fw-bold">Gradient Enabled</div>
<div class="col-4 d-flex">
<div class="form-check form-switch ms-auto mb-0">
<input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1" />
<label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
</div>
</div>
</div>

<div class="theme-panel-divider"></div>
<h5>Admin Design (6)</h5>

<div class="theme-version">
<div class="theme-version-item">
<a href="index_v2.html" class="theme-version-link active">
<span style="background-image: url(../assets/img/theme/default.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/transparent/index_v2.html" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/transparent.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/apple/index_v2.html" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/apple.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/material/index_v2.html" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/material.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/facebook/index_v2.html" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/facebook.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/google/index_v2.html" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/google.jpg);" class="theme-version-cover"></span>
</a>
</div>
</div>

<div class="theme-panel-divider"></div>
<h5>Language Version (9)</h5>

<div class="theme-version">
<div class="theme-version-item">
<a href="index.html" class="theme-version-link active">
<span style="background-image: url(../assets/img/version/html.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/ajax/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/ajax.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/angularjs/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/angular1x.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/angularjs17/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/angular10x.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/svelte/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/svelte.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="javascript:alert('Laravel 10 Version only available in downloaded version.');" class="theme-version-link">
<span style="background-image: url(../assets/img/version/laravel.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="javascript:alert('Django Version only available in downloaded version.');" class="theme-version-link">
<span style="background-image: url(../assets/img/version/django.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/vue3/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/vuejs.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/admin/react/index.html" class="theme-version-link">
<span style="background-image: url(../assets/img/version/reactjs.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="javascript:alert('.NET Core 8.0 MVC Version only available in downloaded version.');" class="theme-version-link">
<span style="background-image: url(../assets/img/version/dotnet.jpg);" class="theme-version-cover"></span>
</a>
</div>
</div>

<div class="theme-panel-divider"></div>
<h5>Frontend Design (5)</h5>

<div class="theme-version">
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/frontend/one-page-parallax/" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/frontend/e-commerce/" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/e-commerce.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/frontend/blog/" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/blog.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/frontend/forum/" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/forum.jpg);" class="theme-version-cover"></span>
</a>
</div>
<div class="theme-version-item">
<a href="https://seantheme.com/color-admin/frontend/corporate/" class="theme-version-link">
<span style="background-image: url(../assets/img/theme/corporate.jpg);" class="theme-version-cover"></span>
</a>
</div>
</div>

<div class="theme-panel-divider"></div>
<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
<a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
</div>
</div>


<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>


<script src="../assets/js/vendor.min.js" type="9bd0b06eed2eb6bc186e00e3-text/javascript"></script>
<script src="../assets/js/app.min.js" type="9bd0b06eed2eb6bc186e00e3-text/javascript"></script>


<script src="../assets/js/demo/pos-header.demo.js" type="9bd0b06eed2eb6bc186e00e3-text/javascript"></script>
<script src="../assets/js/demo/pos-counter-checkout.demo.js" type="9bd0b06eed2eb6bc186e00e3-text/javascript"></script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="9bd0b06eed2eb6bc186e00e3-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89e5b4d0ba1a5248","version":"2024.4.1","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>
</html>
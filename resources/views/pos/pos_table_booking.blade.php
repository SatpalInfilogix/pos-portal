<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Color Admin | POS - Table Booking</title>
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


<div id="app" class="app app-content-full-height app-without-sidebar app-without-header">

<div id="content" class="app-content p-0">

<div class="pos pos-with-header" id="pos">

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
<div class="pos-content-container p-4">
<div class="d-md-flex align-items-center mb-4">
<div class="pos-booking-title flex-1">
<div class="fs-24px mb-1">Available Table (8/20)</div>
<div class="mb-2 mb-md-0 d-flex">
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-gray-700 fs-9px me-1"></i> Completed
</div>
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-warning fs-9px me-1"></i> Upcoming
</div>
<div class="d-flex align-items-center me-3">
<i class="fa fa-circle fa-fw text-success fs-9px me-1"></i> In-progress
</div>
</div>
</div>
<div>
<div class="w-200px">
<input type="date" class="form-control form-control-lg fs-13px" placeholder="Today's" />
</div>
</div>
</div>
<div class="row">
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">01</div>
<div class="desc">max 4 pax</div>
</div>
<div class="text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Reserved by Sean</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info">Reserved by Irene Wong (4pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">Reserved by Irene Wong (4pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">02</div>
<div class="desc">max 8 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Reserved by John (8pax)</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">Reserved by Terry (6pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">03</div>
<div class="desc">max 8 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">Reserved by Lisa (8pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">Reserved by Lisa (8pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">Reserved by Terry</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">04</div>
<div class="desc">max 4 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">Reserved by Richard (4pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">Reserved by Richard (4pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">Reserved by Paul (3pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">Reserved by Paul (3pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">Reserved by Paul (3pax)</div>
<div class="status upcoming"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">05</div>
<div class="desc">max 4 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">06</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">07</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">08</div>
<div class="desc">max 4 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">09</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">10</div>
<div class="desc">max 4 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">11</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">12</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">13</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">14</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">15</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">16</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">17</div>
<div class="desc">max 4 pax</div>
</div>
<div class="pe-1 text-theme display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">18</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">19</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="pos-table-booking">
<div class="pos-table-booking-container">
<div class="pos-table-booking-header">
<div class="d-flex align-items-center">
<div class="flex-1">
<div class="title">TABLE</div>
<div class="no">20</div>
<div class="desc">max 6 pax</div>
</div>
<div class="text-gray-600 display-5">
<i class="iconify" data-icon="solar:check-circle-line-duotone"></i>
</div>
</div>
</div>
<div class="pos-table-booking-body">
<div class="booking">
<div class="time">08:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">09:00am</div>
<div class="info">Walk in breakfast</div>
<div class="status completed"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">10:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">11:00am</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking highlight">
<div class="time">12:00pm</div>
<div class="info">Walk in lunch</div>
<div class="status in-progress"><i class="fa fa-circle"></i></div>
</div>
<div class="booking">
<div class="time">01:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">02:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">03:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">04:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">05:00pm</div>
<div class="info-title">-</div>
<div class="info-desc"></div>
</div>
<div class="booking">
<div class="time">06:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">07:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">08:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">09:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
<div class="booking">
<div class="time">10:00pm</div>
<div class="info">-</div>
<div class="status"></div>
</div>
</div>
</div>
</a>
</div>
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


<div class="modal modal-pos-booking fade" id="modalPosBooking">
<div class="modal-dialog modal-lg">
<div class="modal-content border-0">
<div class="modal-body">
<div class="d-flex align-items-center mb-3">
<h4 class="modal-title d-flex align-items-center"><i class="fa fa-bowl-rice fs-2 me-2 my-n1"></i> Table 01 <small class="fs-13px fw-bold ms-2">max 4 pax</small></h4>
<a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">08:00am</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">09:00am</div>
<input type="text" class="form-control" placeholder value="Reserved by Sean" />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">10:00am</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">11:00am</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">12:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">01:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">02:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">03:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">04:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">05:00pm</div>
<input type="text" class="form-control" placeholder value="Reserved by Irene Wong (4pax)" />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">06:00pm</div>
<input type="text" class="form-control" placeholder value="Reserved by Irene Wong (4pax)" />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">07:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">08:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">09:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
<div class="form-group mb-2">
<div class="input-group">
<div class="input-group-text fw-bold">10:00pm</div>
<input type="text" class="form-control" placeholder />
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<a href="#" class="btn btn-default w-100px" data-bs-dismiss="modal">Cancel</a>
<button type="submit" class="btn btn-success w-100px">Book</button>
</div>
</div>
</div>
</div>


<script src="../assets/js/vendor.min.js" type="be4dd21534f1def28e4b9277-text/javascript"></script>
<script src="../assets/js/app.min.js" type="be4dd21534f1def28e4b9277-text/javascript"></script>


<script src="../assets/js/demo/pos-header.demo.js" type="be4dd21534f1def28e4b9277-text/javascript"></script>
<script src="../../../../code.iconify.design/3/3.1.1/iconify.min.js" type="be4dd21534f1def28e4b9277-text/javascript"></script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="be4dd21534f1def28e4b9277-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89e5b4d2ecf74beb","version":"2024.4.1","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>
</html>
<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->group('master', static function ($routes) {
    $routes->get('business-type', 'Businesstype::index', ['as' => 'master.businesstype']);  
    $routes->get('department', 'Department::index', ['as' => 'master.department']);
    $routes->get('designation', 'Designation::index', ['as' => 'master.designation']);
    $routes->get('call-related', 'Callrelated::index', ['as' => 'master.callrelated']);
    $routes->get('call-type', 'Calltype::index', ['as' => 'master.calltype']);
    $routes->get('currency', 'Currency::index', ['as' => 'master.currency']);
    $routes->get('customer-type', 'Customertype::index', ['as' => 'master.customertype']);
    $routes->get('invoice-status', 'Invoicestatus::index', ['as' => 'master.invoicestatus']);
    $routes->get('payment-method', 'Paymentmethod::index', ['as' => 'master.paymentmethod']);
    $routes->get('service-type', 'Servicetype::index', ['as' => 'master.servicetype']);
    $routes->get('status', 'Status::index', ['as' => 'master.status']);
    $routes->get('products', 'Product::index', ['as' => 'master.product']);
    $routes->get('product-models', 'Model::index', ['as' => 'productmodel.list']);
    $routes->match(['get', 'post'], 'product-model/create', 'Model::create', ['as' => 'productmodel.add']);
    $routes->match(['get', 'post'], 'product-model/(:num)/edit', 'Model::update/$1', ['as' => 'productmodel.edit']);
    $routes->match(['get', 'post'], 'product-model/(:num)/delete', 'Model::delete/$1', ['as' => 'productmodel.delete']);
    $routes->match(['get', 'post'], 'product/(:num)/models', 'Model::getModelByProduct/$1', ['as' => 'productmodel.getbyproduct']);
});

$routes->match(['get', 'post'], 'product/flatknitting/new','Product::addFlatKnitting', ['as' => 'flatknitting.add']);
$routes->match(['get', 'post'], 'product/circularknitting/new','Product::addCircularKnitting', ['as' => 'circularknitting.add']);
$routes->match(['get', 'post'], 'product/embroidery/new','Product::addEmbroidery', ['as' => 'embroidery.add']);

$routes->group('customer', static function ($routes) {
    $routes->get('/', 'Customer::index', ['as' => 'customer.list']);
    $routes->match(['get', 'post'], 'create', 'Customer::create', ['as' => 'customer.add']);
    $routes->match(['get', 'post'], '(:num)/edit', 'Customer::edit/$1', ['as' => 'customer.edit']);
    $routes->match(['get', 'post'], '(:num)/delete', 'Customer::delete/$1', ['as' => 'customer.delete']);
    $routes->get('(:num)/detail', 'Customer::detail/$1', ['as' => 'customer.detail']);
});

$routes->get('customer/(:num)/call/list', 'Call::index/$1', ['as' => 'customer.call.list']);
$routes->match(['get', 'post'], 'customer/(:num)/call/create', 'Call::create/$1', ['as' => 'customer.call.add']);
$routes->match(['get', 'post'], 'customer/(:num)/call/(:num)/edit', 'Call::edit/$1/$2', ['as' => 'customer.call.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/call/(:num)/delete', 'Call::delete/$1/$2', ['as' => 'customer.call.delete']);
$routes->match(['get', 'post'], 'call/allocation', 'Call::allocation', ['as' => 'call.allocation']);
$routes->match(['get', 'post'], 'call/(:num)/allocate', 'Call::allocate/$1', ['as' => 'call.allocate']);
$routes->match(['get', 'post'], 'call/allocation/modify', 'Call::modify_allocation', ['as' => 'call.modify.allocation']);

$routes->get('customer/(:num)/document/list', 'Document::index/$1', ['as' => 'customer.document.list']);
$routes->match(['get', 'post'], 'customer/(:num)/document/create', 'Document::create/$1', ['as' => 'customer.document.add']);
$routes->match(['get', 'post'], 'customer/(:num)/document/(:num)/edit', 'Document::edit/$1/$2', ['as' => 'customer.document.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/document/(:num)/delete', 'Document::delete/$1/$2', ['as' => 'customer.document.delete']);

$routes->get('enquiry/list', 'Enquiry::index', ['as' => 'enquiry.list']);
$routes->get('customer/(:num)/enquiry/list', 'Enquiry::index/$1', ['as' => 'customer.enquiry.list']);
$routes->match(['get', 'post'], 'enquiry/create', 'Enquiry::create', ['as' => 'enquiry.add']);
$routes->match(['get', 'post'], 'customer/(:num)/enquiry/create', 'Enquiry::create/$1', ['as' => 'customer.enquiry.add']);
$routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/edit', 'Enquiry::update/$1/$2', ['as' => 'customer.enquiry.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/delete', 'Enquiry::delete/$1/$2', ['as' => 'customer.enquiry.delete']);
$routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/detail', 'Enquiry::detail/$1/$2', ['as' => 'customer.enquiry.detail']);
$routes->match(['get', 'post'], 'enquiry/(:num)/edit', 'Enquiry::edit/$1', ['as' => 'enquiry.edit']);
$routes->match(['get', 'post'], 'enquiry/(:num)/delete', 'Enquiry::delete/$1', ['as' => 'enquiry.delete']);

$routes->get('invoice/list', 'Invoice::index/$1', ['as' => 'invoice.list']);
$routes->get('customer/(:num)/invoice/list', 'Invoice::index/$1', ['as' => 'customer.invoice.list']);
$routes->match(['get', 'post'], 'invoice/create', 'Invoice::create', ['as' => 'invoice.add']);
$routes->match(['get', 'post'], 'customer/(:num)/invoice/create', 'Invoice::create/$1', ['as' => 'customer.invoice.add']);
$routes->match(['get', 'post'], 'customer/(:num)/invoice/(:num)/edit', 'Invoice::edit/$1/$2', ['as' => 'customer.invoice.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/invoice/(:num)/detail', 'Invoice::detail/$1/$2', ['as' => 'customer.invoice.detail']);
$routes->match(['get', 'post'], 'customer/(:num)/invoice/(:num)/delete', 'Invoice::delete/$1/$2', ['as' => 'customer.invoice.delete']);

$routes->get('quotation/list', 'Quotation::index/$1', ['as' => 'quotation.list']);
$routes->match(['get', 'post'], 'quotation/create', 'Quotation::create', ['as' => 'quotation.add']);
$routes->get('customer/(:num)/quotation/list', 'Quotation::index/$1', ['as' => 'customer.quotation.list']);
$routes->match(['get', 'post'], 'customer/(:num)/quotation/create', 'Quotation::create/$1', ['as' => 'customer.quotation.add']);
$routes->match(['get', 'post'], 'customer/(:num)/quotation/(:num)/edit', 'Quotation::edit/$1/$2', ['as' => 'customer.quotation.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/quotation/(:num)/detail', 'Quotation::detail/$1/$2', ['as' => 'customer.quotation.detail']);
$routes->match(['get', 'post'], 'customer/(:num)/quotation/(:num)/delete', 'Quotation::delete/$1/$2', ['as' => 'customer.quotation.delete']);

$routes->get('sales-order/list', 'SalesOrder::index/$1', ['as' => 'salesorder.list']);
$routes->match(['get', 'post'], 'sales-order/create', 'SalesOrder::create', ['as' => 'salesorder.add']);
$routes->get('customer/(:num)/sales-order/list', 'SalesOrder::index/$1', ['as' => 'customer.salesorder.list']);
$routes->match(['get', 'post'], 'customer/(:num)/sales-order/create', 'SalesOrder::create/$1', ['as' => 'customer.salesorder.add']);
$routes->match(['get', 'post'], 'customer/(:num)/sales-order/(:num)/edit', 'SalesOrder::edit/$1/$2', ['as' => 'customer.salesorder.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/sales-order/(:num)/detail', 'SalesOrder::detail/$1/$2', ['as' => 'customer.salesorder.detail']);
$routes->match(['get', 'post'], 'customer/(:num)/sales-order/(:num)/delete', 'SalesOrder::delete/$1/$2', ['as' => 'customer.salesorder.delete']);

$routes->get('customer/(:num)/payment/list', 'Payment::index/$1', ['as' => 'customer.payment.list']);
$routes->match(['get', 'post'], 'customer/(:num)/payment/create', 'Payment::create/$1', ['as' => 'customer.payment.add']);
$routes->match(['get', 'post'], 'customer/(:num)/payment/(:num)/edit', 'Payment::edit/$1/$2', ['as' => 'customer.payment.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/payment/(:num)/detail', 'Payment::detail/$1/$2', ['as' => 'customer.payment.detail']);
$routes->match(['get', 'post'], 'customer/(:num)/payment/(:num)/delete', 'Payment::delete/$1/$2', ['as' => 'customer.payment.delete']);

$routes->match(['get', 'post'], 'installation/flatknitting/new','InstallationFlatKnitting::create', ['as' => 'installation.flatknitting.add']);
$routes->match(['get', 'post'], 'installation/circularknitting/new','InstallationCircularKnitting::create', ['as' => 'installation.circularknitting.add']);
$routes->match(['get', 'post'], 'installation/embroidery/new','InstallationEmbroidery::create', ['as' => 'installation.embroidery.add']);


$routes->get('supplier', 'Supplier::index', ['as' => 'supplier.list']);
$routes->match(['get', 'post'], 'supplier/create', 'Supplier::create', ['as' => 'supplier.add']);
$routes->match(['get', 'post'], 'supplier/(:num)/edit', 'Supplier::update/$1', ['as' => 'supplier.edit']);
$routes->get('supplier/(:num)/detail', 'Supplier::detail/$1', ['as' => 'supplier.detail']);
$routes->match(['get', 'post'], 'supplier/(:num)/delete', 'Supplier::delete/$1', ['as' => 'supplier.delete']);


$routes->match(['get', 'post'], 'supplier/(:num)/contact/create', 'SupplierContact::create/$1', ['as' => 'supplier.contact.add']);
$routes->match(['get', 'post'], 'supplier/(:num)/contact/(:num)/edit', 'SupplierContact::update/$1/$2', ['as' => 'supplier.contact.edit']);
$routes->match(['get', 'post'], 'supplier/(:num)/contact/(:num)/delete', 'SupplierContact::delete/$1/$2', ['as' => 'supplier.contact.delete']);

$routes->get('spare', 'Spare::index', ['as' => 'spare.list']);
$routes->match(['get', 'post'], 'spare/create', 'Spare::create', ['as' => 'spare.add']);
$routes->match(['get', 'post'], 'spare/(:num)/edit', 'Spare::edit/$1', ['as' => 'spare.edit']);
$routes->match(['get', 'post'], 'spare/(:num)/delete', 'Spare::delete/$1', ['as' => 'spare.delete']);


$routes->get('circular-knitting', 'CircularKnitting::index', ['as' => 'circularknitting.list']);
$routes->post('circular-knitting/create', 'CircularKnitting::create', ['as' => 'circularknitting.add']);
$routes->match(['get', 'post'],'circular-knitting/(:num)/edit', 'CircularKnitting::edit/$1', ['as' => 'circularknitting.edit']);
$routes->match(['get', 'post'], 'circular-knitting/(:num)/delete', 'CircularKnitting::delete/$1', ['as' => 'circularknitting.delete']);

$routes->get('circular-knitting-installation', 'CircularKnittingInstallation::index', ['as' => 'circularknittinginstallation.list']);
$routes->post('circular-knitting-installation/create', 'CircularKnittingInstallation::create', ['as' => 'circularknittinginstallation.add']);
$routes->match(['get', 'post'],'circular-knitting-installation/(:num)/edit', 'CircularKnittingInstallation::edit/$1', ['as' => 'circularknittinginstallation.edit']);
$routes->match(['get', 'post'], 'circular-knitting-installation/(:num)/delete', 'CircularKnittingInstallation::delete/$1', ['as' => 'circularknittinginstallation.delete']);


$routes->get('company', 'Company::index', ['as' => 'company.list']);
$routes->post('company/create', 'Company::create', ['as' => 'company.add']);
$routes->match(['get', 'post'],'company/(:num)/edit', 'Company::update/$1', ['as' => 'company.edit']);
$routes->match(['get', 'post'], 'company/(:num)/delete', 'Company::delete/$1', ['as' => 'company.delete']);

$routes->get('customer/(:num)/contact/list', 'Contact::index/$1', ['as' => 'customer.contact.list']);
$routes->match(['get', 'post'], 'customer/(:num)/contact/create', 'Contact::create/$1', ['as' => 'customer.contact.add']);
$routes->match(['get', 'post'], 'customer/(:num)/contact/(:num)/edit', 'Contact::edit/$1/$2', ['as' => 'customer.contact.edit']);
$routes->match(['get', 'post'], 'customer/(:num)/contact/(:num)/delete', 'Contact::delete/$1/$2', ['as' => 'customer.contact.delete']);
$routes->post('customer/(:num)/contact/detail', 'Contact::show/$1', ['as' => 'customer.contact.detail']);

$routes->group('dashboard', static function ($routes) {
    $routes->get('/', 'Dashboard::index', ['as' => 'dashboard']);
    $routes->get('admin', 'Dashboard::admin', ['as' => 'dashboard.admin']);
    $routes->get('engineer', 'Dashboard::engineer', ['as' => 'dashboard.engineer']);
});
 

$routes->get('embroidery', 'Embroidery::index/$1', ['as' => 'embroidery.list']);
$routes->match(['get', 'post'], 'embroidery/create', 'Embroidery::create/$1', ['as' => 'embroidery.add']);
$routes->match(['get', 'post'], 'embroidery/(:num)/edit', 'Embroidery::edit/$1/$2', ['as' => 'embroidery.edit']);
$routes->match(['get', 'post'], 'embroidery/(:num)/delete', 'Embroidery::delete/$1/$2', ['as' => 'embroidery.delete']);

$routes->get('embroidery-installation', 'EmbroideryInstallation::index/$1', ['as' => 'embroideryinstallation.list']);
$routes->match(['get', 'post'], 'embroidery-installation/create', 'EmbroideryInstallation::create/$1', ['as' => 'embroideryinstallation.add']);
$routes->match(['get', 'post'], 'embroidery-installation/(:num)/edit', 'EmbroideryInstallation::edit/$1/$2', ['as' => 'embroideryinstallation.edit']);
$routes->match(['get', 'post'], 'embroidery-installation/(:num)/delete', 'EmbroideryInstallation::delete/$1/$2', ['as' => 'embroideryinstallation.delete']);

// $routes->get('enquiry/list', 'Enquiry::customerEnquiryList', ['as' => 'enquiry.list']);
// $routes->get('customer/(:num)/enquiry/list', 'Enquiry::customerEnquiryList/$1', ['as' => 'customer.enquiry.list']);
// $routes->match(['get', 'post'], 'enquiry/create', 'Enquiry::create', ['as' => 'enquiry.add']);
// $routes->match(['get', 'post'], 'customer/(:num)/enquiry/create', 'Enquiry::create/$1', ['as' => 'customer.enquiry.add']);
// $routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/edit', 'Enquiry::update/$1/$2', ['as' => 'customer.enquiry.edit']);
// $routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/delete', 'Enquiry::delete/$1/$2', ['as' => 'customer.enquiry.delete']);
// $routes->match(['get', 'post'], 'customer/(:num)/enquiry/(:num)/detail', 'Enquiry::detail/$1/$2', ['as' => 'customer.enquiry.detail']);
// $routes->match(['get', 'post'], 'enquiry/(:num)/edit', 'Enquiry::edit/$1', ['as' => 'enquiry.edit']);
// $routes->match(['get', 'post'], 'enquiry/(:num)/delete', 'Enquiry::delete/$1', ['as' => 'enquiry.delete']);







$routes->match(['get', 'post'], 'auth/login', 'Auth::login', ['as' => 'login']);
$routes->match(['get', 'post'], 'auth/logout', 'Auth::logout', ['as' => 'logout']);
$routes->match(['get', 'post'], 'auth/change-password', 'Auth::change_password', ['as' => 'change-password']);
$routes->match(['get', 'post'], 'auth/forgot-password', 'Auth::forgot_password', ['as' => 'forgot-password']);
$routes->get('auth/user', 'Auth::index', ['as' => 'user.list']);
$routes->match(['get','post'],'auth/user/create/', 'Auth::create_user');
$routes->match(['get','post'],'auth/user/(:num)/edit/', 'Auth::edit_user/$1');
$routes->match(['get','post'],'auth/user/(:num)/deactivate/', 'Auth::deactivate/$1');
$routes->match(['get','post'],'auth/group/create/', 'Auth::create_group');
$routes->match(['get','post'],'auth/group/(:num)/edit/', 'Auth::edit_group/$1');
$routes->get('auth/permission', 'Permission::index', ['as' => 'permission']);


$routes->group('api', static function ($routes) {
    $routes->resource('business-type', [
        'controller' => '\App\Controllers\Api\Businesstype'
    ]);
    $routes->resource('call-type', [
        'controller' => '\App\Controllers\Api\Calltype'
    ]);
    $routes->resource('department', [
        'controller' => '\App\Controllers\Api\Department',
    ]);
    $routes->resource('designation', [
        'controller' => '\App\Controllers\Api\Designation',
    ]);
    $routes->resource('call-related', [
        'controller' => '\App\Controllers\Api\Callrelated',
    ]);
    $routes->resource('company', [
        'controller' => '\App\Controllers\Company'
    ]);
    $routes->resource('currency', [
        'controller' => '\App\Controllers\Api\Currency'
    ]);
    $routes->resource('customer-type', [
        'controller' => '\App\Controllers\Api\Customertype'
    ]);
    $routes->resource('invoice-status', [
        'controller' => '\App\Controllers\Api\Invoicestatus'
    ]);
    $routes->resource('payment-method', [
        'controller' => '\App\Controllers\Api\Paymentmethod'
    ]);
    $routes->resource('service-type', [
        'controller' => '\App\Controllers\Api\Servicetype'
    ]);
    $routes->resource('status', [
        'controller' => '\App\Controllers\Api\Status'
    ]);
    $routes->resource('product', [
        'controller' => '\App\Controllers\Api\Product'
    ]);
    $routes->resource('permission', [
        'controller' => '\App\Controllers\Api\Permission'
    ]);
});
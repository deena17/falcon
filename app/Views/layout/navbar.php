<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= img('public/dist/img/user2-160x160.jpg', false, ['class' => "img-circle elevation-2", 'alt' => "User Image"]); ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('username'); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/dashboard/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url_to('customer.list'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customer <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('customer.add'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('customer.list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('customer.confirmlist'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>Confirm Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Sales Enquiry <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('enquiry.add'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>New Enquiry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('enquiry.list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Enquiry List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Quotation <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('quotation.add'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>New Quotation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('quotation.list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Quotation List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Invoice <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('invoice.add'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('invoice.list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Invoice List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Sales Order<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('salesorder.add'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>New Sales Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('salesorder.list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Sales Order List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Masters <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('master.product'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('productmodel.list'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Model</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('spare.list'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Spare</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.businesstype'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Business Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.department');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.designation');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.callrelated');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Call Related</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.calltype');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Call Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.currency');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Currency</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.customertype');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.invoicestatus');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.paymentmethod');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Method</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.servicetype');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('master.status');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Status</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= url_to('user.list'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Product Master<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flat Knitting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Circular Knitting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Embroidery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Printing</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Installation<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flat Knitting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Circular Knitting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Embroidery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Printing</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Service Call<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url_to('call.add');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Service Call</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('call.allocation');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Call Allocation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url_to('call.allocation');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modify Allocation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/auth/logout/" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
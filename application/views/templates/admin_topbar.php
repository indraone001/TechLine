       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">

               <!-- Topbar -->
               <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   <!-- Sidebar Toggle (Topbar) -->
                   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                       <i class="fa fa-bars"></i>
                   </button>

                   <!-- Topbar Navbar -->
                   <ul class="navbar-nav ml-auto">

                       <!-- Nav Item - Messages -->
                       <li class="nav-item dropdown no-arrow mx-1">
                           <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fas fa-envelope fa-fw"></i>
                               <!-- Counter - Messages -->
                               <span class="badge badge-danger badge-counter">7</span>
                           </a>
                           <!-- Dropdown - Messages -->
                           <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                               <h6 class="dropdown-header">
                                   Order Request
                               </h6>
                               <a class="dropdown-item d-flex align-items-center" href="#">
                                   <div class="dropdown-list-image mr-3">
                                       <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                       <div class="status-indicator bg-success"></div>
                                   </div>
                                   <div class="font-weight-bold">
                                       <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                       <div class="small text-gray-500">Emily Fowler · 58m</div>
                                   </div>
                               </a>
                               <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                           </div>
                       </li>

                       <div class="topbar-divider d-none d-sm-block"></div>

                       <!-- Nav Item - User Information -->
                       <li class="nav-item dropdown no-arrow">
                           <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_user']; ?></span>
                               <img class="img-profile rounded-circle" src="<?= base_url('assets/img/users/') . $user['image']; ?>">
                           </a>
                           <!-- Dropdown - User Information -->
                           <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                               <a class="dropdown-item" href="#">
                                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Profile
                               </a>
                               <a class="dropdown-item" href="#">
                                   <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Settings
                               </a>
                               <a class="dropdown-item" href="#">
                                   <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Activity Log
                               </a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Logout
                               </a>
                           </div>
                       </li>

                   </ul>

               </nav>
               <!-- End of Topbar -->
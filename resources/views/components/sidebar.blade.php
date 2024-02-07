<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="index.html">
                <div class="sidebar-brand-icon">
                <img src="../img/paus.png" alt="" style="width:50px; height:50px;">
                </div>
                <div class="sidebar-brand-text mx-3" style="">Gallerium</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('page.home')}}">
                <i class="bi bi-house-door-fill" id="icon" style="color: #F6F6F6"></i>
                    <span  style="color: #F6F6F6" id="text">Home</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('page.album')}}">
                <i class="bi bi-images"  style="color: #F6F6F6;"></i>
                    <span style="color: #F6F6F6;">Album</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: #F6F6F6">
                Post
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-pin-angle-fill" style="color: #F6F6F6"></i>
                    <span style="color: #F6F6F6">Posts</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded" style="background-color: #F6F6F6;">
                        <h6 class="collapse-header" style="color: grey">My Posts</h6>
                        <a class="collapse-item" href="{{route('page.foto')}}">Photo</a>
                        <a class="collapse-item" href="{{route('page.album')}}">Album</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="">
                <i class="bi bi-chat-right-heart-fill" style="color: #F6F6F6"></i>
                    <span style="color: #F6F6F6">Comments</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-activity" style="color: #F6F6F6"></i>
                    <span style="color: #F6F6F6">Activity</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded" style="background-color: #F6F6F6;">
                        <h6 class="collapse-header" style="color: grey;">My Activity</h6>
                        <a class="collapse-item" href="utilities-color.html">Likes</a>
                        <a class="collapse-item" href="utilities-border.html"></i>Comments</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
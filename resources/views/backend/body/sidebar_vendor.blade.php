@php
  $route = Route::current()->getName();
  $prefix = Request::route()->getPrefix();
@endphp

<!-- Start Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
 {{-- <!-- Brand Logo -->
 <a href="#" class="brand-link">
   <img src="{{ asset('backend/dist/img/AdminLTELogo.png ') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Admin Panel</span>
 </a> --}}

 <!-- Sidebar -->
 <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="image">
       <img src="{{ asset('backend/dist/img/user2-160x160.jpg ')}}" class="img-circle elevation-2" alt="User Image">
     </div>
     <div class="info">
      <a href="#" class="d-block">{{ Auth::user()->name }}</a>

     </div>
   </div>


   <!-- Sidebar Menu -->
   <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
         <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>
             Dashboard
           </p>
         </a>
      </li>
    
      <li class="nav-item">
         <a href="#" class="nav-link 
         {{(request()->route()->getName()=='general.setting')?'active':''}}
         ">
         <i class="fa-solid fa-gear"></i>
           <p>
             Advance Setting
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('general.setting') }}" class="nav-link {{(request()->route()->getName()=='general.setting')?'active':''}}">
               <i class="far fa-circle nav-icon"></i>
               <p>General Setting</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.logout') }}" class="nav-link">
           <i class="fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
        </a>
     </li>
     </ul>
   </nav>
   <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
</aside>
<!-- End Main Sidebar Container -->
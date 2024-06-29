@php
    $routeName = request()->route()->getName();
    $isActiveParent = in_array($routeName, ['general.setting', 'class.index','batch.index']);
@endphp

<style>
 [class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #ffffff;
}
</style>

<!-- Start Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#c4268f; color:white;">
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
      <li class="nav-item {{ $isActiveParent ? 'menu-open' : '' }}">
         <a href="#" class="nav-link 
          {{(request()->route()->getName()=='general.setting')?'active':''}}
          {{(request()->route()->getName()=='class.index')?'active':''}}
          {{(request()->route()->getName()=='batch.index')?'active':''}}
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
           <li class="nav-item">
            <a href="{{ route('class.index') }}" class="nav-link {{(request()->route()->getName()=='class.index')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Class</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('batch.index') }}" class="nav-link {{(request()->route()->getName()=='batch.index')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Batch</p>
            </a>
          </li>
         </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link 
          {{(request()->route()->getName()=='exams.create')?'active':''}}
            {{(request()->route()->getName()=='exams.index')?'active':''}}
            {{(request()->route()->getName()=='exam.edit')?'active':''}}
            {{(request()->route()->getName()=='questions.create')?'active':''}}
            {{(request()->route()->getName()=='questions.index')?'active':''}}
        ">
        <i class="fas fa-desktop"></i>

          <p>
           Online Exam 
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('exams.index') }}" class="nav-link 
           
            ">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage exam</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('exams.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add exam</p>
            </a>
          </li>
         
        </ul>
     </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='category.create')?'active':''}}
             {{(request()->route()->getName()=='category.index')?'active':''}}
             {{(request()->route()->getName()=='category.edit')?'active':''}}
             {{(request()->route()->getName()=='category.view')?'active':''}}
         ">
         <i class="fa-solid fa-bag-shopping"></i>
           <p>
            Categories
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('category.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Category</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('category.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Category</p>
             </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='about.create')?'active':''}}
             {{(request()->route()->getName()=='about.index')?'active':''}}
             {{(request()->route()->getName()=='about.edit')?'active':''}}
             {{(request()->route()->getName()=='about.view')?'active':''}}
         ">
         <i class="fa-solid fa-address-card"></i>
           <p>
            About
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('about.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage About</p>
             </a>
           </li>
        </ul>
      </li>
    
   <li class="nav-item">
    <a href="#" class="nav-link 
        {{(request()->route()->getName()=='video.create')?'active':''}}
        {{(request()->route()->getName()=='video.index')?'active':''}}
        {{(request()->route()->getName()=='video.edit')?'active':''}}
        {{(request()->route()->getName()=='video.view')?'active':''}}
    ">
    <i class="fa-solid fa-video"></i>
      <p>
       Videos
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('video.index') }}" class="nav-link 
       
        ">
          <i class="far fa-circle nav-icon"></i>
          <p>Manage Videos</p>
        </a>
      </li>
   </ul>
 </li>
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='service.create')?'active':''}}
             {{(request()->route()->getName()=='service.index')?'active':''}}
             {{(request()->route()->getName()=='service.edit')?'active':''}}
             {{(request()->route()->getName()=='service.view')?'active':''}}
         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Services
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('service.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Services</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('service.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Services</p>
             </a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='agent.create')?'active':''}}
             {{(request()->route()->getName()=='agent.index')?'active':''}}
             {{(request()->route()->getName()=='agent.edit')?'active':''}}
             {{(request()->route()->getName()=='agent.view')?'active':''}}
         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Director
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('agent.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Director</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('agent.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Director</p>
             </a>
          </li>
        </ul>
      </li> --}}
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='testimonial.create')?'active':''}}
             {{(request()->route()->getName()=='testimonial.index')?'active':''}}
             {{(request()->route()->getName()=='testimonial.edit')?'active':''}}
             {{(request()->route()->getName()=='testimonial.view')?'active':''}}
         ">
         <i class="fa-solid fa-users"></i>
           <p>
            Testimonial
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('testimonial.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Testimonial</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('testimonial.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Testimonial</p>
             </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='slider.create')?'active':''}}
             {{(request()->route()->getName()=='slider.index')?'active':''}}
             {{(request()->route()->getName()=='slider.edit')?'active':''}}
             {{(request()->route()->getName()=='slider.view')?'active':''}}
         ">
         <i class="fa-solid fa-sliders"></i>
           <p>
            Slider
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('slider.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Slider</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('slider.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Slider</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link 
            {{(request()->route()->getName()=='banner.create')?'active':''}}
            {{(request()->route()->getName()=='banner.index')?'active':''}}
            {{(request()->route()->getName()=='banner.edit')?'active':''}}
            {{(request()->route()->getName()=='banner.view')?'active':''}}
        ">
        <i class="fa-solid fa-image"></i>
          <p>
           Banner
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('banner.index') }}" class="nav-link 
           
            ">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Banner</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('banner.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Banner</p>
            </a>
          </li>
        </ul>
     </li>
     <li class="nav-item">
      <a href="#" class="nav-link 
          {{(request()->route()->getName()=='brand.create')?'active':''}}
          {{(request()->route()->getName()=='brand.index')?'active':''}}
          {{(request()->route()->getName()=='brand.edit')?'active':''}}
          {{(request()->route()->getName()=='brand.view')?'active':''}}
      ">
      <i class="fa-solid fa-tags"></i>
        <p>
         Brand
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('brand.index') }}" class="nav-link 
         
          ">
            <i class="far fa-circle nav-icon"></i>
            <p>Manage Brand</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('brand.create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Brand</p>
          </a>
        </li>
      </ul>
   </li>
  
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='branch.create')?'active':''}}
             {{(request()->route()->getName()=='branch.index')?'active':''}}
             {{(request()->route()->getName()=='branch.edit')?'active':''}}
             {{(request()->route()->getName()=='branch.view')?'active':''}}
         ">
         <i class="fa-solid fa-code-branch"></i>
           <p>
           Branch
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('branch.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Branch</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('branch.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Branch</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='instructor.create')?'active':''}}
             {{(request()->route()->getName()=='instructor.index')?'active':''}}
             {{(request()->route()->getName()=='instructor.edit')?'active':''}}
             {{(request()->route()->getName()=='instructor.view')?'active':''}}
         ">
         <i class="fa-solid fa-chalkboard-teacher"></i>
           <p>
           Instructor
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('instructor.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Instructor</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('instructor.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Instructor</p>
             </a>
           </li>
         </ul>
      </li>
     
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='meritorious.create')?'active':''}}
             {{(request()->route()->getName()=='meritorious.index')?'active':''}}
             {{(request()->route()->getName()=='meritorious.edit')?'active':''}}
             {{(request()->route()->getName()=='meritorious.view')?'active':''}}
         ">
         <i class="fa-solid fa-trophy"></i>
           <p>
           Meritorious Student
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('meritorious.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage meritorious</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('meritorious.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add meritorious</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='success.create')?'active':''}}
             {{(request()->route()->getName()=='success.index')?'active':''}}
             {{(request()->route()->getName()=='success.edit')?'active':''}}
             {{(request()->route()->getName()=='success.view')?'active':''}}
         ">
         <i class="fa-solid fa-medal"></i>
           <p>
           Our Success
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('success.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage success</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('success.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add success</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='OurService.create')?'active':''}}
             {{(request()->route()->getName()=='OurService.index')?'active':''}}
             {{(request()->route()->getName()=='OurService.edit')?'active':''}}
             {{(request()->route()->getName()=='OurService.view')?'active':''}}
         ">
         <i class="fa-solid fa-hands-helping"></i>
           <p>
           Add Our Service
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('OurService.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Add Our Service</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('OurService.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Our Service</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('create.wallet') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Wallet </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('payment.details') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Payment </p>
             </a>
           </li>
         </ul>
      </li>
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='program.create')?'active':''}}
             {{(request()->route()->getName()=='program.index')?'active':''}}
             {{(request()->route()->getName()=='program.edit')?'active':''}}
             {{(request()->route()->getName()=='program.view')?'active':''}}
         ">
         <i class="fa-solid fa-photo-film"></i>
           <p>
           Add Our Program
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('program.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Add Our Service</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('program.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Our Service</p>
             </a>
           </li>
         </ul>
      </li> --}}
      <li class="nav-item">
        <a href="#" class="nav-link 
            {{(request()->route()->getName()=='material.create')?'active':''}}
            {{(request()->route()->getName()=='material.index')?'active':''}}
            {{(request()->route()->getName()=='material.edit')?'active':''}}
            {{(request()->route()->getName()=='material.view')?'active':''}}
        ">
        <i class="fa-solid fa-file"></i>
          <p>
          Add Course materials
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('material.index') }}" class="nav-link 
           
            ">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Course materials</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('material.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Course Materials</p>
            </a>
          </li>
        </ul>
     </li>
     <li class="nav-item">
      <a href="#" class="nav-link 
          {{(request()->route()->getName()=='event.create')?'active':''}}
          {{(request()->route()->getName()=='event.index')?'active':''}}
          {{(request()->route()->getName()=='event.edit')?'active':''}}
          {{(request()->route()->getName()=='event.view')?'active':''}}
      ">
      <i class="fa-solid fa-calendar-alt"></i>

        <p>
        Add Events
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('event.index') }}" class="nav-link 
         
          ">
            <i class="far fa-circle nav-icon"></i>
            <p>Manage Events</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('event.create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Events</p>
          </a>
        </li>
      </ul>
   </li>
    
      <li class="nav-item">
         <a href="#" class="nav-link 
           {{(request()->route()->getName()=='pages.create')?'active':''}}
             {{(request()->route()->getName()=='pages.index')?'active':''}}
             {{(request()->route()->getName()=='pages.edit')?'active':''}}
             {{(request()->route()->getName()=='pages.view')?'active':''}}
         ">
         <i class="fa-brands fa-windows"></i>
           <p>
            Pages
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('pages.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Pages</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('pages.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Pages</p>
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
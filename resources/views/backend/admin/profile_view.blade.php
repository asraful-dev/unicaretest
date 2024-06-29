@extends('layouts.backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row mt-3">
            <div class="col-12">
               <div class="card py-3">
                  <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                     <h3 class="card-title pl-3">My Profile</h3>
                     <a data-toggle="modal" data-target="#viewModal" href="#" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Edit Profile</a>
                     <!-- modal -->
                     <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                           <div class="modal-content">
                              <div class="modal-header bg-success">
                                 <h4 class="modal-title text-center" id="myModalLabel">Edit Profile</h4>
                                 <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{ route('profile.updated') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                       <label for="name">Name</label>
                                       <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="email">Email</label>
                                       <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="phone">Phone</label>
                                       <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                    </div>
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="address">Address</label>
                                       <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                                    </div>
                                    @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="photo">My Profile Picture</label>
                                       <input type="file" name="photo" id="photo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <img id="user_showImage" class="rounded avatar-lg" src="{{ asset(Auth::user()->photo) }}" alt="profile image" width="100px" height="80px;">
                                    </div>
                                    <div class="row mb-4 justify-content-sm-end">
                                       <input type="submit" class="btn btn-success btn-rounded" value="Update Now">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container py-5">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="card mb-4 bg-white text-light">
                              <div class="card-body text-center">
                                 <img src="{{ asset(Auth::user()->photo) }}" alt="avatar" class="rounded-circle img-fluid ms-5" style="width: 150px;">
                                 <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                 <p class="text-muted mb-1">{{ Auth::user()->username }}</p>
                                 <p class="text-muted mb-4">{{ Auth::user()->address }}</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-8">
                           <div class="card mb-4">
                              <div class="card-body">
                                 <div class="row">
                                    <p class="mb-0">Full Name : {{ Auth::user()->name }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Username : {{ Auth::user()->username }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Email : {{ Auth::user()->email }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Phone : {{ Auth::user()->phone }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Address : {{ Auth::user()->address }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Role : {{ Auth::user()->role }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Status : {{ Auth::user()->status }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Last Seen : {{ Auth::user()->last_seen }}</p>
                                 </div>
                                 <hr>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<!-- Services Image Show -->
<script type="text/javascript">
   $(document).ready(function(){
       $('#photo').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#user_showImage').attr('src', e.target.result);
           }
           reader.readAsDataURL(e.target.files[0]);
       });
   });
</script>
@endsection

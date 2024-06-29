@extends('layouts.backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
   .bg-light {
   background-color: #28a745!important;
   }
   .bg-light,
   .bg-light>a {
   color: #fff!important;
   }
</style>
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Our Service</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Our Service</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row offset-1">
            <div class="col-10">
               <div class="card card-primary card-outline shadow-lg">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3 class="card-name">Add Our Service</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                           <a href="{{ route('OurService.index') }}" class="btn btn-danger">
                           <i class="fas fa-long-arrow-alt-left"></i>
                           Back to List
                           </a>
                        </div>
                     </div>
                  </div>
                  <form action="{{ route('OurService.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
    @csrf 
    <div class="row m-4">
        <div class="col-md-12">
            <div class="form-group">
                <label for="unit" class="col-form-label" style="font-weight: bold;"> Unit:<span class="text-danger">*</span></label>
                <div class="custom_select">
                    <select class="form-control select-active w-100 form-select select-nice" name="unit">
                        <option disabled {{ old('unit') ? '' : 'selected' }}>Select Unit</option>
                        <option value="1" {{ old('unit') == 1 ? 'selected' : '' }}>ক ইউনিট</option>
                        <option value="2" {{ old('unit') == 2 ? 'selected' : '' }}>খ ইউনিট</option>
                        <option value="3" {{ old('unit') == 3 ? 'selected' : '' }}>গ ইউনিট</option>
                        <option value="4" {{ old('unit') == 3 ? 'selected' : '' }}>মেডিকেল GK</option>
                        <option value="5" {{ old('unit') == 3 ? 'selected' : '' }}>এইচএসসি ICT</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="slider_image">Banner<span class="text-danger">(Size: 1920x1280):</span></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input image" name="image" id="slider_image">
                        <label class="custom-file-label" for="slider_image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-2 mt-3">
                    <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="row mb-3 add_item">
                    <div class="col-sm-3 mt-3">
                        <label for="Our Service" class="col-form-label" style="font-weight: bold;">Our Service:<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary mt-3">
                        <div class="input-group">
                            <input type="text" name="subject[]" class="form-control" placeholder="Subject" value="{{ old('subject.0') }}">
                            <input type="text" name="total_class[]" class="form-control" placeholder="Total Class" value="{{ old('total_class.0') }}">
                            <input type="text" name="exam_test[]" class="form-control" placeholder="Exam Test" value="{{ old('exam_test.0') }}">
                            <input type="text" name="count[]" class="form-control" placeholder="Count" value="{{ old('count.0') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-success addeventmore" type="button"><i class="fa fa-plus-circle"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
          
            <div style="display: none;" class="whole_extra_item_add" id="whole_extra_item_add">
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="row mb-3 mt-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Our Service</h6>
                            <label for="Our Service" class="col-form-label" style="font-weight: bold;">Extra Facility:<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <div class="input-group">
                                <input type="text" name="subject[]" class="form-control" placeholder="Subject" value="{{ old('subject.1') }}">
                                <input type="text" name="total_class[]" class="form-control" placeholder="Total Class" value="{{ old('total_class.1') }}">
                                <input type="text" name="exam_test[]" class="form-control" placeholder="Exam Test" value="{{ old('exam_test.1') }}">
                                <input type="text" name="count[]" class="form-control" placeholder="Count" value="{{ old('count.1') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-success addeventmore" type="button"><i class="fa fa-plus-circle"></i></button>
                                    <button class="btn btn-danger removeeventmore" type="button"><i class="fa fa-minus-circle"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="container">
            <div class="row">
                <div class="row mb-3 add_item">
                    <div class="col-sm-3 mt-3">
                        <label for="Extra Facility" class="col-form-label" style="font-weight: bold;">Extra Facility:<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary mt-3">
                        <div class="input-group">
                            <input type="text" name="one_facility" class="form-control" placeholder="Write Extra Offer" value="{{ old('one_facility') }}">
                            <input type="text" name="two_facility" class="form-control" placeholder="Write Extra Offer" value="{{ old('two_facility') }}">
                            <input type="text" name="three_facility" class="form-control" placeholder="Write Extra Offer" value="{{ old('three_facility') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="Price" class="col-form-label" style="font-weight: bold;">Price:<span class="text-danger">*</span></label>
                <div class="custom_select">
                    <div class="input-group">
                        <input type="number" min="0" name="price" class="form-control" placeholder="Write price" value="{{ old('price') }}">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="Price" class="col-form-label" style="font-weight: bold;">Discount Price:<span class="text-danger">*</span></label>
                <div class="custom_select">
                    <div class="input-group">
                        <input type="number" min="0" name="discount_price" class="form-control" placeholder="Write Discount Price" value="{{ old('discount_price') }}">
                        
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group">
               <label for="course_type">Course Type :</label>
               <span class="text-danger">*</span>
               <select name="course_type" id="course_type" class="form-control">
                  <option value="1">Online</option>
                  <option value="0">Offline</option>
               </select>
            </div>
         </div>
        <div class="col-md-12">
            <div class="form-group">
               <label for="status">Status:</label>
               <span class="text-danger">*</span>
               <select name="status" id="status" class="form-control">
                  <option value="1">Active</option>
                  <option value="0">Disable</option>
               </select>
            </div>
         </div>
         <div class="col-md-12 text-right">
            <div class="form-group">
               <button class="btn btn-success" type="submit">Submit</button>
            </div>
         </div>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<script type="text/javascript">
   $(document).ready(function (){
       $('#myForm').validate({
           rules: {
               poll_topic: {
                   required : true,
               }, 
           },
           messages :{
               poll_topic: {
                   required : 'Please Enter poll topic',
               },
           },
           errorElement : 'span', 
           errorPlacement: function (error,element) {
               error.addClass('invalid-feedback');
               element.closest('.form-group').append(error);
           },
           highlight : function(element, errorClass, validClass){
               $(element).addClass('is-invalid');
           },
           unhighlight : function(element, errorClass, validClass){
               $(element).removeClass('is-invalid');
           },
       });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function(){
      var counter = 0;
      $(document).on("click",".addeventmore",function(){
         var whole_extra_item_add = $('#whole_extra_item_add').html();
         $(this).closest(".add_item").append(whole_extra_item_add);
         counter++;
      });
      $(document).on("click",'.removeeventmore',function(event){
         $(this).closest(".delete_whole_extra_item_add").remove();
         counter -= 1
      });
   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
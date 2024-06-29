@extends('layouts.backend')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meritorious</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Meritorious</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="m-0 font-weight-bold">Meritorious Details</h3>
                            <a href="{{ route('meritorious.index') }}" class="btn btn-danger">
                                <i class="fas fa-long-arrow-alt-left me-1"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 option-group">
                                <label for="option1" class="form-label">Option</label>
                                <div class="input-group">
                                    <input type="text" id="option1" name="options[]" class="form-control">
                                    <button type="button" class="btn btn-success add-option-btn"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="mb-3 option-group d-none">
                                <label class="form-label">Option</label>
                                <div class="input-group">
                                    <input type="text" name="options[]" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger remove-option-btn"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- /.content -->
</div>
<script>
    // jQuery document ready function
    $(document).ready(function () {
        // Function to add new option field
        $(".add-option-btn").click(function () {
            var optionGroup = $(this).closest('.option-group');
            var clonedField = optionGroup.clone(true);
            clonedField.find("input").val(""); // Clear input value in cloned field
            optionGroup.after(clonedField); // Append cloned field after original field
            clonedField.removeClass('d-none'); // Show cloned field
            clonedField.find('.add-option-btn').remove(); // Remove add button from cloned field
            // clonedField.append('<button type="button" class="btn btn-success add-option-btn ms-2"><i class="fa fa-plus"></i></button>'); // Add add button to cloned field
            clonedField.append('<button type="button" class="btn btn-danger remove-option-btn ms-2"><i class="fa fa-minus"></i></button>'); // Add remove button to cloned field
        });

        // Function to remove option field
        $("body").on("click", ".remove-option-btn", function () {
            $(this).closest('.option-group').remove();
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection

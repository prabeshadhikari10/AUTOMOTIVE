@extends('frontend.user.dashboard.layout.user')

@section('content')



<div class="row">

    <div class="col-md-12 grid-margin" style="display:flex; justify-content:center; align-items:center;">

        @if($user->status == '1' ||$user->status == '2')
        <div class="col-md-8 order-md-1" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius:15px; width:95%; height:78vh;  padding:30px; background-color:#f8f9fa; display:flex; justify-content:center; align-items:center;">
            <div class="container" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                <span class="material-symbols-rounded addMore" title="verified user" style="font-size: 60px; color:#39b779">verified</span>
                <h3 class="mt-3">The KYC form you have submitted is verified.</h3>
            </div>
        </div>
        @else


        <div class="col-md-8 order-md-1" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-radius:15px; width:95%;  padding:30px; background-color:#f8f9fa;">
            <h3 class="mb-3 text-center">KYC</h3>
            <form action="/create-kyc" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="middlename">Middle name</label>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your permanent address" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email address" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="DOB">Date of Birth</label>
                        <input type="Date" class="form-control" id="dob" name="dob" placeholder="" value="" required="" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <label for="formFile" class="form-label">Citizenship Image</label>
                        <input class="form-control border-0 outline-none" type="file" id="citizenshipimg" name="citizenshipimg">
                    </div>

                    <div class="col-md-3 mb-4">
                        <label for="formFile" class="form-label">License Image</label>
                        <input class="form-control border-0 outline-none" type="file" id="licenseimg" name="licenseimg">
                    </div>

                    <div class="col-md-2 mb-4">
                        <label for="licensetype" class="form-label">License Type</label>
                        <select class="form-select" id="licensetype" name="licensetype" required="">
                            <option></option>
                            <option>A</option>
                            <option>B</option>
                            <option>A & B</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid license type.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary text-white btn-lg btn-block" type="submit">Submit</button>
            </form>
        </div>

        @endif

    </div>
</div>

<script>
    // Get references to the file input and license type select elements
    const licenseImgInput = document.getElementById('licenseimg');
    const licenseTypeSelect = document.getElementById('licensetype');

    // Disable the license type select element and hide it initially
    licenseTypeSelect.disabled = true;
    licenseTypeSelect.style.display = 'none';

    // Add a change event listener to the file input
    licenseImgInput.addEventListener('change', function() {
        // Check if the file input has a selected file
        if (this.files && this.files.length > 0) {
            // If a file is selected, enable and show the license type select element
            licenseTypeSelect.disabled = false;
            licenseTypeSelect.style.display = 'block';
        } else {
            // If no file is selected, disable, hide, and select the empty option of the license type select element
            licenseTypeSelect.disabled = true;
            licenseTypeSelect.style.display = 'none';
            licenseTypeSelect.selectedIndex = 0;
        }
    });

    // Add a change event listener to the license type select element
    licenseTypeSelect.addEventListener('change', function() {
        // Check if the selected option is not one of the available options or if the licenseimg is empty
        if ((this.value !== '' && this.value !== 'A' && this.value !== 'B' && this.value !== 'A & B') || licenseImgInput.files.length === 0) {
            // If it's not one of the available options or the licenseimg is empty, select the empty option
            this.selectedIndex = 0;
        }
    });
</script>




@endsection
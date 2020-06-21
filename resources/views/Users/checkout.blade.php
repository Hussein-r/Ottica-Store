@extends('layouts.userNavbar')

@section('content')
<head>
    <title>ShopMax &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
  </head>
<body>
  <div class = "container">
    <div class="form-group">
        <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
        <div class="collapse" id="ship_different_address">
          <div class="py-2">

            <div class="form-group">
              <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
              <select id="c_diff_country" class="form-control">
                <option value="1">Select a country</option>    
                <option value="2">bangladesh</option>    
                <option value="3">Algeria</option>    
                <option value="4">Afghanistan</option>    
                <option value="5">Ghana</option>    
                <option value="6">Albania</option>    
                <option value="7">Bahrain</option>    
                <option value="8">Colombia</option>    
                <option value="9">Dominican Republic</option>    
              </select>
            </div>


            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
              </div>
              <div class="col-md-6">
                <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_diff_companyname" class="text-black">Company Name </label>
                <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
              </div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
              </div>
              <div class="col-md-6">
                <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
              </div>
              <div class="col-md-6">
                <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
              </div>
            </div>

          </div>

        </div>
      </div>
  </div>
</body>
@endsection
@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Staff Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="staffadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="staffname" name="name" require placeholder="Enter your Name">
                </div>

                <div class="form-group">
                  <label for="exampleInputGender">gender :</label>
                  
                        <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
               </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="staffaddress" name="staffaddress" require placeholder="Enter your Address">
                </div>
                

                <div class="form-group">
                  <label for="exampleInputEmail">email :</label>
                  <input type="email" class="form-control" id="staffemail" name="email" required placeholder="Enter Your email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword">Password :</label>
                  <input type="password" class="form-control" id="staffPassword"  required name="password" placeholder=" Enter Your Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">Designation :</label>
                  <input type="text" class="form-control" id="stafftxt" name="stafftxt" required placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">qualification :</label>
                  <input type="text" class="form-control" id="staffqualification" required name="staffqualification" placeholder="Enter text">
                </div>
                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
</section>
@endsection
          <!-- /.box -->
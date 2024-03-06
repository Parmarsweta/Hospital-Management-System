@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">doctor Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/doctoradd" method="post">
            @csrf
    
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="doctorname" name="doctorname" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                  <label for="exampleInputqualification">qualification :</label>
                  <input type="text" class="form-control" id="qualification" name="txt" placeholder="Enter Your Qualification "required>
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="address" name="address" required placeholder="Enter your Address"required>
                </div>
                

                <div class="form-group">
                  <label for="exampleInputGender">gender :</label>
                  
                        <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
               </div>

                <div class="form-group">
                  <label for="exampleInputMobile_no">mobile_no :</label>
                  <input type="number" class="form-control" id="doctormobile_no " name="doctornumber" required placeholder="Enter Your Mobile number">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail">email :</label>
                  <input type="email" class="form-control" id="doctoremail"  name="doctoremail"  required placeholder="Enter Your email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword">password :</label>
                  <input type="password" class="form-control" id="doctorPassword"  name="password" required  placeholder=" Enter Your Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">visiting :</label>
                  <input type="text" class="form-control" id="doctorvisiting" name="doctorvisiting" placeholder="Enter Your visiting">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">doctorcharge :</label>
                  <input type="text" class="form-control" id="doctorcharge" name="doctorcharge" placeholder="Enter Your Doctorcharge">
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
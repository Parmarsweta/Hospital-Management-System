@extends('doctor/doctormain')
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
            <form action="/drdoctoredit/{{$data->doctor_id}}" method="post">
            @csrf
    
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="doctorname" name="doctorname" value='{{$data->name}}' placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputqualification">qualification :</label>
                  <input type="text" class="form-control" id="qualification" name="txt" value='{{$data->qualification}}' placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="address" name="address" value='{{$data->address}}' placeholder="Enter text" >
                </div>
                

                <div class="form-group">
                <label for="exampleInputMobile_no">gendar :</label>
                
                <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
                </div>

                <div class="form-group">
                  <label for="exampleInputMobile_no">mobile_no :</label>
                  <input type="number" class="form-control" id="doctormobile_no " name="doctornumber" value='{{$data->mobile_no}}' placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail">email :</label>
                  <input type="email" class="form-control" id="doctoremail"  name="doctoremail" value='{{$data->email}}' placeholder="Enter email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword">password :</label>
                  <input type="password" class="form-control" id="doctorPassword"  name="password" value='{{$data->Password}}'  placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">visiting :</label>
                  <input type="text" class="form-control" id="doctorvisiting" name="doctorvisiting" value='{{$data->visiting}}' placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">doctorcharge :</label>
                  <input type="text" class="form-control" id="doctorcharge" name="doctorcharge" value='{{$data->doctorcharge}}' placeholder="Enter text">
                </div>
                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">update</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
</section>
@endsection
          <!-- /.box -->
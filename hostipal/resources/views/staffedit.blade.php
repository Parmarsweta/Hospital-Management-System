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
            <form action="/staffedit/{{$data->staff_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputdoctor">staff_id :</label>
                  <input type="number" class="form-control" id="staffid" name="staffid" value="{{$data->staff_id}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="staffname" name="staffname" value="{{$data->name}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                <label for="exampleInputMobile_no">gendar :</label>
                
                <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="staffaddress" name="staffaddress" value="{{$data->address}}" placeholder="Enter text">
                </div>
                

                <div class="form-group">
                  <label for="exampleInputEmail">email :</label>
                  <input type="email" class="form-control" id="staffemail" name="email" value="{{$data->email}}" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword">Password :</label>
                  <input type="password" class="form-control" id="staffPassword" name="password" value="{{$data->password}}" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">Designation :</label>
                  <input type="text" class="form-control" id="stafftxt" name="stafftxt" value="{{$data->designation}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">qualification :</label>
                  <input type="text" class="form-control" id="staffqualification" name="staffqualification" value="{{$data->qualification}}" placeholder="Enter text">
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
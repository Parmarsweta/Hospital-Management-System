@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/adminadd" method="post">
            @csrf
    
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputAdmin">admin_id :</label>
                  <input type="number" class="form-control" id="adminid" name="adminid"  required placeholder="Enter number">
                </div>
                <div class="form-group">
                  <label for="exampleInputAdmin_name">name :</label>
                  <input type="text" class="form-control" id="adminname" name="adminname"  required placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">Password :</label>
                  <input type="password" class="form-control" id="adminpassword" name="adminpassword" required placeholder="Password">
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
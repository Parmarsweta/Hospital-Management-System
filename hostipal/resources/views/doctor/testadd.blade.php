@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Test Details </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/drtestadd" method="post">
            @csrf
    
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputAdmin_name">name :</label>
                  <input type="text" class="form-control" id="testname" name="testname" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">Description :</label>
                  <input type="text" class="form-control" id="txt" name="txt" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">testcharge :</label>
                  <input type="number" class="form-control" id="testcharge" name="testcharge" placeholder="Enter text">
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
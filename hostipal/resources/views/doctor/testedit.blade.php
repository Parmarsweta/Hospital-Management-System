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
            <form action="/drtestedit/{{$data->test_id}}" method="post">
            @csrf
    
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputAdmin">test_id :</label>
                  <input type="number" class="form-control" id="testid" name="testid" value="{{$data->test_id}}" placeholder="Enter number">
                </div>
                <div class="form-group">
                  <label for="exampleInputAdmin_name">name :</label>
                  <input type="text" class="form-control" id="testname" name="testname" value="{{$data->name}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">description :</label>
                  <input type="text" class="form-control" id="txt" name="txt"  value="{{$data->description}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">testcharge :</label>
                  <input type="number" class="form-control" id="testcharge" name="testcharge" value="{{$data->testcharge}}" placeholder="Enter text">
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
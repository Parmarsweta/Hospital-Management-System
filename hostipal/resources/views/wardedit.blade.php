w@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ward Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/wardedit/{{$data->ward_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputWard_id">ward_id :</label>
                  <input type="number"  class="form-control" id="wardid" name="wardid" value='{{$data->ward_id}}'>
                </div>
                <div class="form-group">
                  <label for="exampleInputName">name :</label>
                  <input type="text"  class="form-control" id="wardname" name="wardname" value='{{$data->name}}' placeholder="Enter text">
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
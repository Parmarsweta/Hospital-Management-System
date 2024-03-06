@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roomtype Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/roomtypeedit/{{$data->roomtype_id}}" method="post">
            @csrf
    
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputAdmin">roomtype_id :</label>
                  <input type="number" class="form-control" id="roomtypeid" name="roomtypeid" value='{{$data->roomtype_id}}'>
                </div>
                <div class="form-group">
                  <label for="exampleInputAdmin_name">roomtype :</label>
                  <input type="text" class="form-control" id="roomtype" name="txt"  value='{{$data->roomtype}}' placeholder="Enter txt">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">nursingcharge :</label>
                  <input type="number" class="form-control" id="nursingcharge" name="nursingcharge"  value='{{$data->nursingcharge}}' placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">doctorcharge :</label>
                  <input type="number" class="form-control" id="doctorcharge" name="doctorcharge"  value='{{$data->doctorcharge}}' placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">bedcharge :</label>
                  <input type="number" class="form-control" id="bedcharge" name="bedcharge" value='{{$data->bedcharge}}'  placeholder="number">
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
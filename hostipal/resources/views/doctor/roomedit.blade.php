@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Room Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/drroomedit/{{$data->room_id}}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputroom_id">room_id :</label>
                  <input type="number" class="form-control" id="roomid" name="roomid" value="{{$data->room_id}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputroom_no">room_no :</label>
                  <input type="number" class="form-control" id="roomno" name="roomno" value='{{$data->room_no}}' placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputRoomtype_id">roomtype_id :</label>
                  <select class="form-control" id="roomtypeid" name="roomtypeid" value='{{$data->roomtype_id}}'  placeholder="Enter number">
                  @foreach( $rtdata as $d)
              		<option value='{{$d->roomtype_id}}'>{{$d->roomtype}}</option>
                  @endforeach
                  </select>
                  </div>

                <div class="form-group">
                  <label for="exampleInputno_of_beds">no_of_beds :</label>
                  <input type="number" class="form-control" id="noofbeds" name="noofbeds" value='{{$data->no_of_beds}}' placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputward_id">ward_id :</label>
                  <select class="form-control" id="wardid" name="wardid" value='{{$data->ward_id}}' placeholder="Enter number">
                  @foreach( $wdata as $d)
              		<option value='{{$d->ward_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                  
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
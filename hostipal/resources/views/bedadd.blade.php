@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bed Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="bedadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputBed_no">bed_no :</label>
                  <input type="number" class="form-control" id="bedno" name="bedno" placeholder="Enter Your Bed No" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputRoom_id">room_id :</label>
                  <select class="form-control" id="roomid" name="roomid" placeholder="Enter Your Room Id" required>
                  @foreach( $rdata as $d)
              		<option value='{{$d->room_id}}'>{{$d->room_id}}</option>
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
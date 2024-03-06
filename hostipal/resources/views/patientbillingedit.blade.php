@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patientbilling Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/patientbillingedit/{{$data->bill_id}}" method="post">
              
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputmedicinetype">bill_id :</label>
                  <input type="number" class="form-control" id="billid" name="billid" required value="{{$data->bill_id}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required  value="{{$data->admission_id}}" placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">billdate :</label>
                  <input type="date" class="form-control" id="billdate" name="billdate" value="{{$data->billdate}}" placeholder="Enter number">
                </div>
                <div class="form-group">
                  <label for="exampleInputmedicinetype">no_of_days :</label>
                  <input type="number" class="form-control" id="noofdays" name="noofdays" value="{{$data->no_of_dyas}}" placeholder="Enter number">

                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">bedcharge :</label>
                  <input type="number" class="form-control" id="bedcharge" name="bedcharge" value="{{$data->bedcharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">doctorcharge :</label>
                  <input type="number" class="form-control" id="doctorcharge" name="doctorcharge" value="{{$data->doctorcharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">nursingcharge :</label>
                  <input type="number" class="form-control" id="nursingcharge" name="nursingcharge"  value="{{$data->nursingcharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">medicinecharge :</label>
                  <input type="number" class="form-control" id="medicinecharge" name="medicinecharge" value="{{$data->medicinecharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">testcharge :</label>
                  <input type="number" class="form-control" id="testcharge" name="testcharge" value="{{$data->testcharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">doctorvisitcharge:</label>
                  <input type="number" class="form-control" id="doctorvisitingcharge" name="doctorvisitingcharge" value="{{$data->doctorvisitcharge}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">total :</label>
                  <input type="number" class="form-control" id="total" name="total"  value="{{$data->total}}" placeholder="Enter number">
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
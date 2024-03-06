@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Medicineallocation Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/drmedicineallocationedit/{{$data->medicineallocation_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputmedicineallocation">medicineallocation_id :</label>
                  <input type="number" class="form-control" id="medicineallocaionid" name="medicineallocaionid" value="{{$data->medicineallocaion_id}}" placeholder="Enter number">
                </div>
                <div class="form-group">
                  <label for="exampleInputadmission">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" value="{{$data->admission_id}}" placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">medicine_id :</label>
                  <select class="form-control" id="medicineid" name="medicineid"  value="{{$data->medicine_id}}" placeholder="Enter number">
                  @foreach( $medata as $d)
              		<option value='{{$d->medicine_id}}'>{{$d->medicine_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">quantity :</label>
                  <input type="text" class="form-control" id="txt" name="txt" value="{{$data->quantity}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">allocationdate :</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{$data->allocationdate}}" placeholder="Enter date">
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
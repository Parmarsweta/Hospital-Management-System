@extends('staff/staffmain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Treatmentadd Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/sttreatmentedit/{{$data->treatment_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputmedicinetype">treatment_id :</label>
                  <input type="number" class="form-control" id="treatmentid" name="treatmentid" value="{{$data->treatment_id}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" value="{{$data->admission_id}}" placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">medicine_id :</label>
                  <select class="form-control" id="medicineid" name="medicineid"  value="{{$data->medicine_id}}" placeholder="Enter number">
                  @foreach( $mdata as $d)
              		<option value='{{$d->medicine_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">instructions:</label>
                  <input type="text" class="form-control" id="txt" name="txt" value="{{$data->instructions}}" placeholder="Enter Text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">treatmentdate :</label>
                  <input type="date" class="form-control" id="date" name="date"  value="{{$data->treatmentdate}}" placeholder="Enter date">
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
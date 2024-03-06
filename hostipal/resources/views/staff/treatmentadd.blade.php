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
            <form action="sttreatmentadd" method="post">
              @csrf
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputname">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">medicine_id :</label>
                  <select class="form-control" id="medicineid" name="medicineid" required placeholder="Enter number">
                  @foreach( $mdata as $d)
              		<option value='{{$d->medicine_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">instructions:</label>
                  <input type="text" class="form-control" id="txt" name="txt" required placeholder="Enter Text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">treatmentdate :</label>
                  <input type="date" class="form-control" id="date" name="date" required placeholder="Enter date">
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
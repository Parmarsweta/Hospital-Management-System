@extends('staff/staffmain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">patientdischarge Details</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  <div class="input-group-btn">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
			  <tr>
		        <th>Admission_id</th>
            <th>dischargedate</th>
            <th>diagnosis</th>
            <th>treatmentdescription</th>
            <th>advicedescription</th>
		        <th>Operations</th>
        </tr>
		@foreach( $data as $d)
		<tr>
			<td>{{$d->admission_id}}</td>
			<td>{{$d->dischargedate}}</td>
			<td>{{$d->diagnosis}}</td>
			<td>{{$d->treatmentdescription}}</td>
			<td>{{$d->advicedescription}}</td>
			<td><a href="/patientdischargeadd">Add</a>|<a href="stpatientdischargeedit/{{$d->patientdischarge_id}}">Edit</a>|<a href="stpatientdischargedel/{{$d->patientdischarge_id}}">Delete</a></td>

		@endforeach
		</tr>
				
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    @endsection
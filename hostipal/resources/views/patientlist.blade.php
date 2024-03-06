@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patient Details</h3>

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
		
		<th>name</th>
        <th>weight</th>
        <th>gender</th>
        <th>address</th>
        <th>phone</th>
        <th>medicalhistory</th>
        <th>familyhistory</th>
        <th>DOB</th>
        <th>bloodgroup</th>
        <th>habits</th>
        <th>otherdetails</th>
		<th>Operations</th>
	</tr>
		@foreach( $data as $d)
		<tr>
      
      <td>{{$d->name}}</td>
      <td>{{$d->weight}}</td>
      <td>{{$d->gender}}</td>
      <td>{{$d->address}}</td>
      <td>{{$d->phone}}</td>
      <td>{{$d->medicalhistory}}</td>
      <td>{{$d->familyhistory}}</td>
      <td>{{$d->dob}}</td>
      <td>{{$d->bloodgroup}}</td>
      <td>{{$d->habits}}</td>
      <td>{{$d->otherdetails}}</td>
      <td><a href="/patientadd">Add</a>|<a href="patientedit/{{$d->patient_id}}">Edit</a>|<a href="patientdel/{{$d->patient_id}}">Delete</a></tr></tr>

		@endforeach
               
              </table>
              <td><a href="/patientprint">Print Report</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    @endsection		
@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patientbilling Details</h3>

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
		      
		      <th>admission_id</th>
          <th>bill_date</th>
          <th>no_of_days</th>
          <th>bedcharge</th>
          <th>doctorcharge</th>
          <th>nursingcharge</th>
		      <th>medicinecharge</th>
          <th>testcharge</th>
          <th>doctorvisitcharge</th>
          <th>total</th>
		      <th>Operations</th>
        </tr>
		@foreach( $data as $d)
		<tr>
      
      <td> {{$d->admission_id}}</td>
      <td>{{$d->bill_date}}</td>
      <td>{{$d->no_of_days}}</td>
      <td>{{$d->bedcharge}}</td>
      <td>{{$d->doctorcharge}}</td>
      <td>{{$d->nursingcharge}}</td>
      <td>{{$d->medicinecharge}}</td>
      <td>{{$d->testcharge}}</td>
      <td>{{$d->doctorvisitcharge}}</td>
      <td>{{$d->total}}</td>
      <td><a href="/patientbillingadd">Add</a>|<a href="patientbillingedit/{{$d->bill_id}}">Edit</a>|<a href="patientbillingdel/{{$d->bill_id}}">Delete</a></td>

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
@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patienttest Details</h3>

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
        <th>test</th>
        <th>datetime</th>
        <th>reportdescription</th>
		    <th>Operations</th>
                
        
		

	</tr>
		@foreach( $data as $d)
		<tr><td>{{$d->admission_id}}</td><td>{{$d->name}}</td><td>{{$d->datetime}}</td><td>{{$d->reportdescription}}</td><td><a href="/patienttestadd">Add</a>|<a href="patienttestedit/{{$d->patienttest_id}}">Edit</a>|<a href="patienttestdel/{{$d->patienttest_id}}">Delete</a></td>

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
@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Doctorvisit Details</h3>

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
		
		<th>doctor</th>
        <th>admission_id</th>
        <th>date</th>
        <th>purpose</th>
		<th>Operations</th>
		

	</tr>
		@foreach( $data as $d)
		<tr>
			
			<td> {{$d->name}}</td>
			<td>{{$d->admission_id}}</td>
			<td>{{$d->date}}</td>
			<td>{{$d->purpose}}</td>
			<td><a href="/doctorvisitadd">Add</a>|<a href="doctorvisitedit/{{$d->doctorvisit_id}}">Edit</a>|<a href="doctorvisitdel/{{$d->doctorvisit_id}}">Delete</a></td>

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
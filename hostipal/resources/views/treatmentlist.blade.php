@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Treatment Details</h3>

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
		    <th>name</th>
		    <th>instructions</th>
			<th>treatmentdate</th>
			<th>Operations</th>

	</tr>
		@foreach( $data as $d)
		<tr><td>{{$d->admission_id}}</td><td>{{$d->name}}</td><td>{{$d->instructions}}</td><td>{{$d->treatmentdate}}</td><td><a href="/treatmentadd">Add</a>|<a href="treatmentedit/{{$d->treatment_id}}">Edit</a>|<a href="treatmentdel/{{$d->treatment_id}}">Delete</a></td>

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
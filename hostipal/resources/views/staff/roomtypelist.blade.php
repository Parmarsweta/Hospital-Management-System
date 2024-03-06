@extends('staff/staffmain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Roomtype Details</h3>

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
		        
		        <th>roomtype</th>
            <th>nursingcharge</th>
            <th>doctorcharge</th>
            <th>bedcharge</th>
		        
        </tr>
		@foreach( $data as $d)
		<tr><td> {{$d->roomtype}}</td><td>{{$d->nursingcharge}}</td><td>{{$d->doctorcharge}}</td><td>{{$d->bedcharge}}</td><td>

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
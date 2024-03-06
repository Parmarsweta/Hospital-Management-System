@extends('doctor/doctormain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Medicineallocation Details</h3>

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
		<th>medicine</th>
		<th>quantity</th>
		<th>allocationdate</th>
		<th>Operations</th>

	</tr>
		@foreach( $data as $d)
		<tr>
			
			<td>{{$d->admission_id}}</td>
			<td>{{$d->mname}}</td>
			<td>{{$d->quantity}}</td>
			<td>{{$d->allocationdate}}</td>
			<td><a href="/drmedicineallocationadd">Add</a>|<a href="drmedicineallocationedit/{{$d->medicineallocation_id}}">Edit</a>|<a href="medicineallocationdel/{{$d->medicineallocation_id}}">Delete</a></td>
		</tr>
		

		@endforeach 
                
				
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    @endsection
	
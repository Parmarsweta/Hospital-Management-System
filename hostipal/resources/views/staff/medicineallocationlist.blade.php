@extends('staff/staffmain')
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
			<td>{{$d->name}}</td>
			<td>{{$d->quantity}}</td>
			<td>{{$d->allocationdate}}</td>
			<td><a href="/stmedicineallocationadd">Add</a>|<a href="stmedicineallocationedit/{{$d->medicineallocation_id}}">Edit</a>|<a href="stmedicineallocationdel/{{$d->medicineallocation_id}}">Delete</a></td>
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
	
@extends('doctor/doctormain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Medicine Details</h3>

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
        <th>brand</th>
        <th>storageinstruction</td>
        <th>medicinetype</th>
        <th>packing</th>
        <th>price</th>
		
		</tr>
		@foreach( $data as $d)
		<tr>
			
			<td>{{$d->name}}</td>
			<td>{{$d->brand}}</td>
			<td>{{$d->storageinstruction}}</td>
			<td>{{$d->medicinetype}}</td>
			<td>{{$d->packing}}</td>
			<td>{{$d->price}}</td>
			
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
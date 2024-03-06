@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Medicinetype Details</h3>

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
                  
                  <th>medicinetype</th>
                  <th>Operations</th>
                </tr>
				@foreach( $data as $d)
				<tr>
				
				<td>{{$d->medicinetype}}</td>
				<td><a href="/medicinetypeadd">Add</a>|<a href="medicinetypeedit/{{$d->medicinetype_id}}">Edit</a>|<a href="medicinetypedel/{{$d->medicinetype_id}}">Delete</a></td>
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
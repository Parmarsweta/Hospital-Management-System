@extends('doctor/doctormain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Test Details</h3>

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
        <th>Description</th>
        <th>testcharge</th>
		    <th>Operations</th>
        </tr>
		@foreach( $data as $d)
		<tr><td>{{$d->name}}</td><td>{{$d->description}}</td>
    <td>{{$d->testcharge}}</td><td><a href="/drtestadd">Add</a>|<a href="drtestedit/{{$d->test_id}}">Edit</a>|<a href="testdel/{{$d->test_id}}">Delete</a></td>

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
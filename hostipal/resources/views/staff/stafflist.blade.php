@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff Details</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
					    <th>staff_id</th>
					    <th>name</th>
					    <th>gender</th>
        			<th>address</th>
        			<th>email</th>
        			<th>password</th>
        			<th>Designation</th>
        			<th>qualification</th>
              <th>Operations</th>
				</tr>
		@foreach( $data as $d)
		<tr><td>
		{{$d->staff_id}}</td><td>{{$d->name}}</td><td>{{$d->gender}}</td><td>{{$d->address}}</td><td>{{$d->email}}</td><td>{{$d->password}}</td><td>{{$d->designation}}</td><td>{{$d->qualification}}</td><td><a href="/staffadd">Add</a>|<a href="staffedit/{{$d->staff_id}}">Edit</a>|<a href="staffdel/{{$d->staff_id}}">Delete</a></tr></tr>

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
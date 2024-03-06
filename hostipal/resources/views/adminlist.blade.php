@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admin Details</h3>

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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Password</th>
                  <th>Operations</th>
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  <td>{{$d->admin_id}}</td>
                  <td>{{$d->name}}</td>
                  <td>{{$d->password}}</td>
                  <td><a href="/adminadd">Add</a>|<a href="adminedit/{{$d->admin_id}}">Edit</a>|<a href="admindel/{{$d->admin_id}}">Delete</a></td>
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
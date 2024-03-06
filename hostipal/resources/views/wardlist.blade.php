@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ward Details</h3>

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
                  <th>Operations</th>
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  
                  <td>{{$d->name}}</td>
                  
                  
                  
                  <td><a href="/wardadd">Add</a>|<a href="wardedit/{{$d->ward_id}}">Edit</a>|<a href="warddel/{{$d->ward_id}}">Delete</a></td>
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
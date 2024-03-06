@extends('main')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bed Details</h3>

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
                  
                  <th>bed_no</th>
                  <th>room_id</th>
                  
                  <th>Operations</th>
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  
                  <td>{{$d->bed_no}}</td>
                  <td>{{$d->room_id}}</td>
                  
                  
                  <td><a href="/bedadd">Add</a>|<a href="bededit/{{$d->bed_id}}">Edit</a>|<a href="beddel/{{$d->bed_id}}">Delete</a></td>
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
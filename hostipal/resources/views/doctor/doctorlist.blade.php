@extends('doctor/doctormain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> My Profile</h3>

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
                  <th>Name</th>
                  <th>qualification</th>
                  <th>address</th>
                  <th>gender</th>
                  <th>mobile_no</th>
                  <th>email</th>
                  
                  <th>visiting</th>
                  <th>doctorcharge</th>
                  <th>Operations</th>
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  <td>{{$d->name}}</td>
                  <td>{{$d->qualification}}</td>
                  <td>{{$d->address}}</td>
                  <td>{{$d->gender}}</td>
                  <td>{{$d->mobile_no}}</td>
                  <td>{{$d->email}}</td>
                 
                  <td>{{$d->visiting}}</td>
                  <td>{{$d->doctorcharge}}</td>
                  
                  <td><a href="drdoctoredit/{{$d->doctor_id}}">Edit</a></td>
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
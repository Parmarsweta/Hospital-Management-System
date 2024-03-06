@extends('doctor/doctormain')
@section('content')
<section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Doctor Admission</h3>

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
                  
                  <th>admissiondate</th>
                  <th>bed_id</th>
                  <th>patient</th>
                  <th>complaint</th>
                  <th>doctor</th>
                  <th>diagnosis</th>
                  
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  
                <td>{{$d->admissiondate}}</td>
                  <td>{{$d->bed_no}}</td>
                  <td>{{$d->pname}}</td>
                  <td>{{$d->complaint}}</td>
                  <td>{{$d->dname}}</td>
                  <td>{{$d->diagnosis}}</td>
                  
                  
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
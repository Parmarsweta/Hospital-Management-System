@extends('staff/staffmain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patientbilling Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="add" method="post">
              @csrf
              <div class="form-group">
                  <label for="exampleInputmedicinetype">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" placeholder="Enter number">
                  @foreach( $data as $d)
              		<option value='{{$d->admission_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>
                

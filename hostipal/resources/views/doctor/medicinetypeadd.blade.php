@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Medicinetype Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="drmedicinetypeadd" method="post">
              @csrf
              <div class="box-body">
                

                <div class="form-group">
                  <label for="exampleInputAdmin_name">medicinetype :</label>
                  <input type="text" class="form-control" id="medicinetype" name="txt"   placeholder="Enter txt" required>
                </div>

                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
</section>
@endsection
          <!-- /.box -->
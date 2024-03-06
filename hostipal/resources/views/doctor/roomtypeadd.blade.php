@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roomtype Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/roomtypeadd" method="post">
            @csrf
    
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputqualification">roomtype :</label>
                  <input type="text" class="form-control" id="txt" name="txt" placeholder="Enter Your roomtype" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">nursingcharge :</label>
                  <input type="number" class="form-control" id="nursingcharge" name="nursingcharge" placeholder="Enter Your Nursingcharge" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">doctorcharge :</label>
                  <input type="number" class="form-control" id="doctorcharge" name="doctorcharge" placeholder="Enter Your Doctorcharge" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword">bedcharge :</label>
                  <input type="number" class="form-control" id="bedcharge" name="bedcharge" placeholder="Enter Your Bedcharge"required>
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
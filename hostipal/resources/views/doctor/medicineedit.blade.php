@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Medicine Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/drmedicineedit/{{$data->medicine_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputmedicine">medicine_id :</label>
                  <input type="number" class="form-control" id="medicineid" name="medicineid" value="{{$data->medicine_id}}" >
                </div>
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="medicinetxt" name="medicinetxt"  value="{{$data->name}}"  placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">Brand :</label>
                  <input type="text" class="form-control" id="txt" name="Brandtxt" value="{{$data->brand}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">storageinstruction :</label>
                  <input type="text" class="form-control" id="txt" name="txt" value="{{$data->storageinstruction}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">medicinetype_id :</label>
                  <select class="form-control" id="medicinetypeid" name="medicinetypeid"  value="{{$data->medicinetype_id}}" placeholder="Enter number">
                  @foreach( $mdata as $d)
              		<option value='{{$d->medicinetype_id}}'>{{$d->medicinetype}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">packing :</label>
                  <input type="text" class="form-control" id="medicinepacking" name="medicinepacking" value="{{$data->packing}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicine">price :</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}" placeholder="Enter number">
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
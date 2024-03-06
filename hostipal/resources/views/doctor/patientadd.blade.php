@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patient Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="drpatientadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="patientname" name="patientname" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputWeight">weight :</label>
                  <input type="number" class="form-control" id="patientweight" name="patientweight" placeholder="Enter number">
                </div>

                <div class="form-group">
                  <label for="exampleInputGender">gender :</label>
                  
                        <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
               </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="address" name="address" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputphone">phone :</label>
                  <input type="number" class="form-control" id="patientphone" name="patientphone" placeholder="Enter number">
                </div>
                

                <div class="form-group">
                  <label for="exampleInputEmail">medicalhistory :</label>
                  <input type="text" class="form-control" id="patientmedicalhistory" name="patientmedicalhistory" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputfamilyhistory">familyhistory :</label>
                  <input type="text" class="form-control" id="patientfamilyhistory" name="patientfamilyhistory" placeholder="Enter text">
                </div>


                
                <div class="form-group">
                  <label for="exampleInputDOB">dob :</label>
                  <input type="date" class="form-control" id="patientdate" name="patientdate" placeholder="Enter date">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputBloodgroup">bloodgroup :</label>
                  <input type="text" class="form-control" id="patientbloodgroup" name="patientbloodgroup" placeholder=" Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">habits :</label>
                  <input type="text" class="form-control" id="patienthabits" name="patienthabits" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">otherdetails :</label>
                  <input type="text" class="form-control" id="otherdetalis" name="otherdetalis" placeholder="Enter text">
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
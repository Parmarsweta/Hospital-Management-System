<html>
    <head></head>
    <body>
    <html>
<body>
  <style>
      p{
          text-align: center;
          text-decoration: underline;
          text-transform: uppercase;
          font-size: medium;
      }
    th{
       text-align: center;
    }
    td{
      text-align: center;
    }
    h1{
      text-align: center;
      text-decoration: underline;
    }
	table{
		text-align: center;
		font-size: 20px;
		
		
	}
    </style>

    
    <p>hospital name :- sharda hospital<p> 
        <p>patientbilling Charges</p>
<table border="2" width="80%" align="center">
<tr>
        <td>Patient Name :</td><td>{{ $ptdata->name }}</td>
        </tr>	  
		<tr>
        <td>Patient address :</td><td>{{$ptdata->address}}</td>
        </tr>	  
		<tr>
        <td>Admission Date :</td><td>{{$pdata->admissiondate}}</td>
        </tr>	  
		<tr>
        <td>Discharge Date :</td><td>{{$pddata->dischargedate}}</td>
        </tr>	  
		<tr>
        <td>No_of_days :</td><td>{{$billdata->no_of_days}}</td>
        </tr>	  
		<tr>
        <td>Roomcharges :</td><td>{{$billdata->bedcharge}}</td>
        </tr>
        <tr>
        <td>Doctorcharges :</td><td>{{$billdata->doctorcharge}}</td>
        </tr>	
        <tr>
        <td>Nursingcharges :</td><td>{{$billdata->nursingcharge}}</td>
        </tr>
        <tr>
        <td>Medicinecharges :</td><td>{{$billdata->medicinecharge}}</td>
        </tr>
        <tr>
        <td>Testcharges :</td><td>{{$billdata->testcharge}}</td>
        </tr>	
        </tr>	
        <tr>
        <td>Doctorvisitcharges :</td><td>{{$billdata->doctorvisitcharge}}</td>
        </tr>	
        <tr>
        <td>Total :</td><td>{{$billdata->total}}</td>
        </tr>
</table>
</body>
    </html>	
        
		

<html>
    <body>
        <style>
            h1{
                text-align: center;
            }
            h2{
                text-decoration:underline;
            }
        </style>
        <h2>Discharge Summary</h2>
  </table>
  
      <h2>Diagnosis:</h2>
      {{$pddata->diagnosis}}
  
  
  <h2>Treatment Given:</h2>
  {{$pddata->treatmentdescription}}
  
  
      <h2>Advice:</h2>
      {{$pddata->advicedescription}}
  

  
</table>
  
    </body>
</html>
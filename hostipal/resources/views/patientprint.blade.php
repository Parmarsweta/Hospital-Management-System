<html>
<body>
  <style>
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
    </style>
    
  <h1>patient Report</h1>
<table border="2" width="80%" align="center">
			  <tr>
		
		<th>name</th>
        <th>weight</th>
        <th>gender</th>
        <th>address</th>
        <th>phone</th>
        <th>medicalhistory</th>
        <th>familyhistory</th>
        <th>DOB</th>
        <th>bloodgroup</th>
        <th>habits</th>
        <th>otherdetails</th>
	</tr>
		@foreach( $data as $d)
		<tr>
      
      <td>{{$d->name}}</td>
      <td>{{$d->weight}}</td>
      <td>{{$d->gender}}</td>
      <td>{{$d->address}}</td>
      <td>{{$d->phone}}</td>
      <td>{{$d->medicalhistory}}</td>
      <td>{{$d->familyhistory}}</td>
      <td>{{$d->dob}}</td>
      <td>{{$d->bloodgroup}}</td>
      <td>{{$d->habits}}</td>
      <td>{{$d->otherdetails}}</td>
      
		@endforeach
               
              </table>
</body>
</html>            
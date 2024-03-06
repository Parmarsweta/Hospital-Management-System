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
	table{
		text-align: center;
		font-size: 25px;
		
		
	}
    </style>
    
  <h1>Room Report</h1>
<table align="center" border="1" >
			  
			  <tr>
		
		<th>Roomtype</th>
        <th>Nursingcharges</th>
        <th>Doctorcharges</th>
        <th>Bedcharges</th>
		

	</tr>
		@foreach( $data as $d)
		<tr>
    <td> {{$d->roomtype}}</td>
    <td>{{$d->nursingcharge}}</td>
    <td>{{$d->doctorcharge}}</td>
    <td>{{$d->bedcharge}}</td>

		@endforeach
	</tr>
	</table>
</body>
</html>
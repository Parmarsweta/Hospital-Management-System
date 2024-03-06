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
		font-size: 19px;
		
		
	}
    </style>
    
  <h1>Testt Report</h1>
<table align="center" border="1" >

	
<tr>
		
		<th>name</th>
        <th>Description</th>
        <th>testcharge</th>
		

	</tr>
		@foreach( $data as $d)
		<tr><td>{{$d->name}}</td>
    <td>{{$d->description}}</td>
    <td>{{$d->testcharge}}</td>
    
		@endforeach
		</tr>
  </table>
</body>
</html>
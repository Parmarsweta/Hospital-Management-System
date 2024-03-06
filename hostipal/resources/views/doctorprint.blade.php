
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
    
  <h1>Doctor Report</h1>
<table border="2" width="80%" align="center">
                    <tr>
                  
                  <th>Name</th>
                  <th>qualification</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Mobile_no</th>
                  <th>Email</th>
                  <th>visiting</th>
                  <th>Doctorcharge</th>
                  
                </tr>
				@foreach( $data as $d)
		
                <tr>
                  
                  <td>{{$d->name}}</td>
                  <td>{{$d->qualification}}</td>
                  <td>{{$d->address}}</td>
                  <td>{{$d->gender}}</td>
                  <td>{{$d->mobile_no}}</td>
                  <td>{{$d->email}}</td>
                  <td>{{$d->visiting}}</td>
                  <td>{{$d->doctorcharge}}</td>
                  
                  
				  @endforeach
                </tr>
               
              </table>
</body>
</html>
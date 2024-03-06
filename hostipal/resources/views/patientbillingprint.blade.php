<h1 align="center">patientbilling Charges</h1>
<table border="2" width="80%" align="center">
			  <tr>
		      
		      <th>admission_id</th>
          <th>bill_date</th>
          <th>no_of_days</th>
          <th>bedcharge</th>
          <th>doctorcharge</th>
          <th>nursingcharge</th>
		      <th>medicinecharge</th>
          <th>testcharge</th>
          <th>doctorvisitcharge</th>
          <th>total</th>
		      
        </tr>
		@foreach( $data as $d)
		<tr>
      
      <td> {{$d->admission_id}}</td>
      <td>{{$d->bill_date}}</td>
      <td>{{$d->no_of_days}}</td>
      <td>{{$d->bedcharge}}</td>
      <td>{{$d->doctorcharge}}</td>
      <td>{{$d->nursingcharge}}</td>
      <td>{{$d->medicinecharge}}</td>
      <td>{{$d->testcharge}}</td>
      <td>{{$d->doctorvisitcharge}}</td>
      <td>{{$d->total}}</td>
      
		@endforeach
		</tr>
				
  </table>
  
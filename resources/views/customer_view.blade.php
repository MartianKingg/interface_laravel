<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
   <table class="table table-striped table-inverse table-responsive">
       <thead class="thead-inverse">
           <tr>
               <th>Sl no</th>
               <th>Name</th>
               <th>Email</th>
               <th>Gender</th>
               <th>Address</th>
               <th>State</th>
               <th>Country</th>
               <th>Dob</th>
               <th>Status</th>
           </tr>
           </thead>
           <tbody>
               @php
                   $sl = 1;
               @endphp
               @foreach ($customer as $customers)
                <tr>
                    <td scope="row">@php
                        echo $sl++;
                    @endphp</td>

                    <td>{{$customers->name}}</td>
                    <td>{{$customers->email}}</td>
                    <td>
                        @if ($customers->gender == 'M')
                            Male
                        @elseif($customers->gender == 'F')
                            Female
                            
                        @else
                            Other
                        @endif
                    </td>
                    <td>{{$customers->address}}</td>
                    <td>{{$customers->state}}</td>
                    <td>{{$customers->country}}</td>
                    <td>{{$customers->dob}}</td>
                    <td>
                        @if ($customers->status == 'Active')
                            Active
                
                        @else
                            Inactive
                        @endif
                    </td>
                   
                </tr>
               @endforeach
               
              
           </tbody>
   </table>
  </body>
</html>
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
      <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #06090a;">
          {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{url('/customer')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/customer/add_customer')}}">Add Customer</a>
                  </li>
                  
              </ul>
              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
          </div>
      </nav>
      <div class="container">
          <br>
          <br><br>

        <a href="{{route('customer.add_customer')}}">
            <button type="button" class="btn btn-primary float-right">
                Add
            </button>
        </a>
        <br>
        <br>
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
                   <th>Action</th>
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
                        <td>{{get_formatted_date($customers->dob, 'd-m-Y')}}</td>
                        <td>
                            @if ($customers->status == 'Active')
                                Active
                    
                            @else
                                Inactive
                            @endif
                        </td>

                        <td>
                            {{-- Here normal url function is used to pass id --}}
                            <a href="{{url('/customer/edit')}}/{{$customers->customer_id}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>

                            {{-- here route() is used to transfer id --}}
                            {{-- id parameter in here and in route must be same --}}
                            <a href="{{route('customer.delete', ['id' => $customers->customer_id])}}">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                       
                    </tr>
                   @endforeach
                   
                  
               </tbody>
       </table>
      </div>
    
  </body>
</html>
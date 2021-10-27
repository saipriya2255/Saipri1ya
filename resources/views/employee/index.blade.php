@extends('employee.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>EMPLOYEE DETAILS</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New employee</a>   
            <a class="btn btn-success" href="{{ route('designation') }}"> designation</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>age</th>
            <th>salary</th>
            <th>designation</th>
          
            <th width="280px">Action</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($employee as $employees)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employees->firstname }}</td>
            <td>{{ $employees->lastname }}</td>
            <td>{{ $employees->age }}</td>
            <td>{{ $employees->salary }}</td>
            <td>{{ $employees->designation }}</td>
            
            <td>
   
                    <a class="btn btn-info" href="{{ route('employee.show',$employees->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employees->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('destroy',$employees->id) }}">Delete</a>
   
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employee->links() !!}
      
@endsection
@extends('designation.layout')

@section('content')

<div class="container">
  <form class="form-horizontal" action="{{ route('designationsave') }}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlSelect1"> User</label>
    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
     <option value="">select user</option>
    @foreach ($employee as $designations)
    <option value="{{ $designations->id }}">{{ $designations->firstname }} {{ $designations->lastname }}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">designation</label>
    <textarea class="form-control" name="designation" class="form-control" placeholder="designation"></textarea>
  </div>
<button type="submit" class="btn btn-danger">submit</button>
  </form>
</div>


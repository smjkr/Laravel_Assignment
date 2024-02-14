@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row col-md-6">
        <div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Education') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Create education</h2>
                        <form action="{{route('store.education')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="degreeName">Degree Name:</label>
                                <input type="text" class="form-control" name="degreeName" placeholder="Enter your Degree Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="institute">Institute:</label>
                                <input type="text" class="form-control" name="institute" placeholder="Enter your Institute"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="passingYear">Passing Year:</label>
                                <input type="number" class="form-control" name="passingYear" placeholder="Enter your Passing Year"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="studentID">Student ID:</label>
                                <input type="text" class="form-control" name="studentID"
                                    placeholder="Enter your Student ID" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <div class="row col-md-6">
        <div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Education List') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Education List</h2>
                        <table class="table">
                            <thead>
                                <th>Degree Name</th>
                                <th>Institute</th>
                                <th>Passing Year</th>
                                <th>Student ID</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($education as $education)
                                <tr>
                                    <td>{{$education->degreeName}}</td>
                                    <td>{{$education->institute}}</td>
                                    <td>{{$education->passingYear}}</td>
                                    <td>{{$education->studentID}}</td>
                                     <td>
                                        <a href="{{route('education.edit',$education->id)}}"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('education.delete',$education->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delte</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
@section('footerScript')
@if(Session::has('success'))
<script type="text/javascript">
$(function() {
    toastr.success("{{ Session::get('success') }}");
})
</script>
@endif
@if(Session::has('fail'))
<script type="text/javascript">
$(function() {
    toastr.error("{{ Session::get('fail') }}");
})
</script>
@endif
@stop
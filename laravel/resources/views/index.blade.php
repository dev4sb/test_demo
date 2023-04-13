<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Manage</title>
    <!-- BootStrap CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2 class="text-center my-2 mb-3">Employee List</h2>
        <span>Employee Management</span>
        <a href="{{route('create')}}" class="float-end btn btn-primary btn-sm">Add New</a>

        <div class="card border-0 shadow-lg mt-3">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Hobbies</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $emp)
                            <tr valign="middle">
                                <th>{{$emp->id}}</th>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->hobbies}}</td>
                                <td>{{$emp->address}}</td>
                                <td>{{$emp->country}}</td>
                                <td>
                                    @if($emp->image != '' && file_exists(public_path() . '/uploads/imgs/' . $emp->image))
                                        <img src="{{url('/uploads/imgs/' . $emp->image)}}" width="50" height="50" class="rounded-circle" alt="">
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('delete',$emp->id)}}" method="post">
                                        <a href="{{url('/empEdit', $emp->id)}}" class="btn btn-info badge">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger badge">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $employees->links() !!} --}}
            </div>
        </div>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>crud image tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>crud image</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="/create"> Create New Post</a>
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
            <th>S.No</th>
            <th>name</th>
            <th>email</th>
            <th>profile_photo</th>
            <th width="280px">Action</th>
        </tr>
     @foreach( $data as $data_value)
            <td>{{$data_value->id}}</td>
            <td><img src="{{ Storage::url($data_value->profile_photo) }}" height="75" width="75" alt="" /></td>
            <td>{{ $data_value->name}}</td>
            <td>{{ $data_value->email}}</td>
            <td>
                    <a class="btn btn-success" href="{{ route('show',$data_value->id) }}">show</a>
                    <a class="btn btn-primary" href="{{route('edit', $data_value->id)}}">Edit</a>
                    <a href="{{ route('destroy', $data_value->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
            </td>
        </tr>
      @endforeach
    </table>
</body>
</html>
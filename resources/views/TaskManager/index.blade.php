<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.html">Task Manager</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
        </div>

        <!-- Success Message (Hidden by default, show when needed) -->
         {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            Task created successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>  --}}

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show"
             role="alert">
            
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Title</th>
                        <th width="40%">Description</th>
                        <th width="10%">Status</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $tasks as $task )                     
                    <tr>

                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->status =='pending')
                                 <span class="badge bg-danger text-dark">{{ $task->status }}</span>
                          
                                 @else 
                                 <span class="badge bg-warning text-dark">{{ $task->status }}</span>
                                 
                                 @endif
                           
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit',$task) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.delete',$task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                   
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>

        <!-- Empty State (Show when no tasks) -->
        <!-- <div class="alert alert-info">
            No tasks found. <a href="create.html">Create your first task!</a>
        </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

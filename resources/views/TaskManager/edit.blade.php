<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit New Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.html">Task Manager</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Task</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tasks.update',$task) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
                                <!-- Error message (show when validation fails) -->
                                @error('title')
                                   <p style="color:red"> {{ $message }}</p>
                                    
                                  
                                @enderror
                                {{-- <div class="invalid-feedback">{{ The title field is required. }}</div>  --}}
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control">{{ $task->description }}</textarea>
                                @error('description')
                                  <p style="color:red"> {{ $message }}</p>
                                    
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="pending" {{ $task->status =='pending'? 'selected':''}}>Pending</option>
                                    <option value="completed" {{ $task->status== 'completed'?'selected':''}} >Completed</option>
                                </select>
                                <!-- Error message (show when validation fails) -->
                                <!-- <div class="invalid-feedback">Please select a valid status.</div> -->
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

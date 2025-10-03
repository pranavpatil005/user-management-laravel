<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Inter', sans-serif;
  }
  .navbar {
    padding: 0.8rem 1rem;
  }
  .table-container {
    max-width: 900px;
    margin: 2rem auto;
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
  }
  .btn-primary {
    border-radius: 8px;
    padding: 0.4rem 1rem;
  }
  .table th {
    font-weight: 600;
  }
  .action-icons a, .action-icons button {
    margin-right: 8px;
    text-decoration: none;
  }
  .action-icons svg {
    transition: 0.2s;
  }
  .action-icons svg:hover {
    transform: scale(1.2);
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">User Manager</a>
    
    <button class="btn btn-primary" onclick="window.location.href='{{ route('add') }}'">
      + Add User
    </button>
  </div>
</nav>

<!-- Table Section -->
<div class="table-container">
  <h4 class="mb-3">User List</h4>
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Mobile</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @if($data->isNotEmpty())
        @foreach($data as $index => $da)
        <tr>
          <td>{{ $index+1 }}</td>
          <td>{{ $da->name ?? '' }}</td>
          <td>{{ $da->phone_number ?? '' }}</td>
          <td class="text-center action-icons">

            <!-- Edit -->
            <a href="{{ route('edit', base64_encode($da->id)) }}" class="text-primary" title="Edit">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 
                14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zM13.5 
                6.207L9.793 2.5 3.293 9H3.5a.5.5 0 0 
                1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 
                0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5z"/>
              </svg>
            </a>

            <!-- Delete -->
            <form action="{{ route('delete', base64_encode($da->id)) }}" method="POST" style="display:inline-block;" 
              onsubmit="return confirm('Are you sure you want to delete this user?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link p-0 m-0 text-danger" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" 
                  class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 
                    6 6v6a.5.5 0 0 1-1 0V6a.5.5 
                    0 0 1 .5-.5m2.5 0a.5.5 0 0 1 
                    .5.5v6a.5.5 0 0 1-1 0V6a.5.5 
                    0 0 1 .5-.5m3 .5a.5.5 0 0 
                    0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 
                    1H13v9a2 2 0 0 1-2 2H5a2 2 
                    0 0 1-2-2V4h-.5a1 1 0 0 
                    1-1-1V2a1 1 0 0 1 
                    1-1H6a1 1 0 0 1 
                    1-1h2a1 1 0 0 1 1 
                    1h3.5a1 1 0 0 1 1 1z"/>
                </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4" class="text-center text-muted">No users found</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>

<!-- SweetAlert Notifications -->
<script>
function show(message_type,message){
  Swal.fire({
    title: message_type === 'success' ? "Success" : "Error",
    text: message,
    icon: message_type,
    confirmButtonColor: '#3085d6'
  });
}
</script>
@if(session()->has('success'))
<script> show('success', '{{ session("success") }}'); </script>
@endif
@if(session()->has('error'))
<script> show('error', '{{ session("error") }}'); </script>
@endif

<h1>Create User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf  <!-- ✅ security token -->

    <label>Name:</label>
    <input type="text" name="name" required> <br><br>

    <label>Email:</label>
    <input type="email" name="email" required> <br><br>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" required> <br><br>

    <button type="submit">Save</button>
</form>

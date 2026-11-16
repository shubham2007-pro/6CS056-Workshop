<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="/students/create">Add New Student</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Birth</th>
        </tr>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->date_of_birth }}</td>
            </tr>
        @empty
            <tr><td colspan="6">No students yet.</td></tr>
        @endforelse
    </table>
</body>
</html>
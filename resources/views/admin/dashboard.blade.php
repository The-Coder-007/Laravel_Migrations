<h1>Admin Dashboard</h1>
@foreach ($employees as $employee)
    <h2>{{ $employee->name }} ({{ $employee->is_active ? 'Active' : 'Inactive' }})</h2>
    <p>Joined: {{ $employee->join_date }}</p>

    <h3>Parties</h3>
    <ul>
        @foreach ($employee->parties as $party)
            <li>
                {{ $party->name }} - {{ $party->address }}
                <strong>Status:</strong>
                @if ($party->orders->where('order_date', '>=', now()->startOfMonth())->count())
                    <span style="color: green;">Active</span>
                @else
                    <span style="color: red;">Inactive</span>
                @endif
            </li>
        @endforeach
    </ul>
@endforeach

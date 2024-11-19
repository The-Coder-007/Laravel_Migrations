<h1>Employee Dashboard</h1>

<h2>Add Party</h2>
<form method="POST" action="{{ route('employee.addParty') }}">
    @csrf
    <input type="text" name="name" placeholder="Party Name" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <button type="submit">Add Party</button>
</form>

<h2>Your Parties</h2>
@foreach ($parties as $party)
    <p>{{ $party->name }} - {{ $party->address }} - {{ $party->contact }}</p>
    <p>
        Status: 
        @if ($party->orders->where('order_date', '>=', now()->startOfMonth())->count())
            <span style="color: green;">Active</span>
        @else
            <span style="color: red;">Inactive</span>
        @endif
    </p>

    <form method="POST" action="{{ route('employee.addOrder', $party->id) }}">
        @csrf
        <input type="date" name="order_date" required>
        <button type="submit">Add Order</button>
    </form>
@endforeach

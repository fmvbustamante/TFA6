@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Customer accounts</h1>
            <p class="page-intro">Customer records retrieved from the database through the Customer Eloquent model.</p>
        </div>
        <span class="count-pill">{{ $customers->count() }} records</span>
    </header>

    <div class="table-wrap">
        <table>
            <thead>
                <tr><th scope="col">#</th><th scope="col">Full name</th><th scope="col">Email address</th><th scope="col">Phone</th></tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td class="cell-muted">{{ $customer->id }}</td>
                        <td class="cell-primary">{{ $customer->full_name }}</td>
                        <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                        <td class="cell-muted">{{ $customer->phone ?: '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="cell-muted">No customers found. Run the database seeder to add sample records.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="notice">The controller retrieves these records with <code>Customer::query()</code>; the Blade view loops through the returned Eloquent collection.</p>
@endsection

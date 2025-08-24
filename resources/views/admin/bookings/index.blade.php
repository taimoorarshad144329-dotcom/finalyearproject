@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Bookings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Created</th>
                        <th>Car</th>
                        <th>Customer</th>
                        <th>Pickup</th>
                        <th>Return</th>
                        <th>Status</th>
                        <th>Total (Rs)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $b->car->name ?? '—' }}</td>
                            <td>
                                {{ $b->full_name }}<br>
                                <small>{{ $b->phone }}</small>
                            </td>
                            <td>
                                {{ $b->pickup_location }}<br>
                                <small>{{ $b->pickup_at->format('d M Y H:i') }}</small>
                            </td>
                            <td>
                                {{ $b->return_location }}<br>
                                <small>{{ $b->return_at->format('d M Y H:i') }}</small>
                            </td>
                            <td>
                            @if($b->status === 'pending')
                                <form action="{{ route('bookings.approve', $b->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                </form>

                                <form action="{{ route('bookings.reject', $b->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                </form>
                            @elseif($b->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($b->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-secondary text-uppercase">{{ $b->status }}</span>
                            @endif
                        </td>

                            <td>{{ number_format($b->total_amount ?? 0) }}</td>

                    @empty
                        <tr><td colspan="8" class="text-center text-muted">No bookings yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $bookings->links() }}</div>
    </div>
</div>
@endsection

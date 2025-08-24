@extends('admin.adminlayout')

@section('content')
<div class="col-sm-9 mt-5">
    <!-- table -->
     <p class="bg-dark text-white p-2">
        List of Cars
     </p>
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Car ID</th>
                <th scope="col">Name</th>
                <th scope="col">Model</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <th scope="row">{{ $car->id }}</th>
                <td>{{ $car->name }}</td>
                <td>{{ $car->features }}</td>
                <td>
                    <a href="{{ route('car.edit', $car->id) }}" class="btn btn-info mr-3">
                        <i class="fas fa-pen"></i>
                    </a>
                
                    <form action="{{ route('car.destroy', $car->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>

                </td>
            </tr>
            @endforeach
        </tbody>
     </table>
</div>

<div>
    <a href="{{ route('car.create') }}" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>


{{-- ✅ Toast Notification --}}
@if(session('success'))
<div id="toast-msg" class="toast-msg">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div id="toast-msg" class="toast-msg error">
    {{ session('error') }}
</div>
@endif

@endsection

@push('styles')
<style>
.toast-msg {
    position: fixed;
    bottom: -100px; /* initially hidden */
    left: 50%;
    transform: translateX(-50%);
    background: #28a745; /* green success */
    color: #fff;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    opacity: 0;
    transition: all 0.5s ease-in-out;
    z-index: 9999;
}
.toast-msg.error {
    background: #dc3545; /* red for error */
}
.toast-msg.show {
    bottom: 30px;
    opacity: 1;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    let toast = document.getElementById("toast-msg");
    if (toast) {
        // show animation
        setTimeout(() => {
            toast.classList.add("show");
        }, 100);

        // hide after 4 sec
        setTimeout(() => {
            toast.classList.remove("show");
        }, 4000);
    }
});
</script>
@endpush

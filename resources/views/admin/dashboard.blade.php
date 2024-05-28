@extends('layouts.admin')

@section('content')
    @foreach ($pendingBookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            {{-- <td>{{ $booking->users->name }}</td>
            <td>{{ $booking->courses->name }}</td> --}}
            <td>{{ $booking->status }}</td>
            <td>
                <form action="{{ route('admin.booking.accept', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Accetta</button>
                </form>
                <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection

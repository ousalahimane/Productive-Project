@extends('layouts.admin')


@section('content')
    @if ($type === 'broadcaster')
        <broadcaster :auth_user_id="{{ $id }}" env="{{ env('APP_ENV') }}"
            turn_url="{{ env('ZOOM_API_URL') }}" turn_username="{{ env('ZOOM_USERNAME_SERVER') }}"
            turn_credential="{{ env('ZOOM_CLIENT_KEY') }} {{ env('ZOOM_CLIENT_SECRET') }}" />

    @else
        <viewer stream_id="{{ $streamId }}" :auth_user_id="{{ $id }}"
            turn_url="{{ env('ZOOM_API_URL') }}" turn_username="{{ env('ZOOM_USERNAME_SERVER') }}"
            turn_credential="{{ env('ZOOM_CLIENT_KEY') }} {{ env('ZOOM_CLIENT_SECRET') }}" />
    @endif
@endsection

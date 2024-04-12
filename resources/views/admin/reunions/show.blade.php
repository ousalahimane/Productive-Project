@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reunion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reunions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reunion.fields.id') }}
                        </th>
                        <td>
                            {{ $reunion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reunion.fields.titre') }}
                        </th>
                        <td>
                            {{ $reunion->titre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reunion.fields.date') }}
                        </th>
                        <td>
                            {{ $reunion->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reunion.fields.time') }}
                        </th>
                        <td>
                            {{ $reunion->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reunion.fields.participants') }}
                        </th>
                        <td>
                            @foreach($reunion->participants as $key => $participants)
                                <span class="label label-info">{{ $participants->email }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reunions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
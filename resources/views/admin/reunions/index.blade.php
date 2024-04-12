@extends('layouts.admin')
@section('content')
@can('reunion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reunions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reunion.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reunion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Reunion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reunion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reunion.fields.titre') }}
                        </th>
                        <th>
                            {{ trans('cruds.reunion.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.reunion.fields.time') }}
                        </th>
                        <th>
                            {{ trans('cruds.reunion.fields.participants') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reunions as $key => $reunion)
                        <tr data-entry-id="{{ $reunion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reunion->id ?? '' }}
                            </td>
                            <td>
                                {{ $reunion->titre ?? '' }}
                            </td>
                            <td>
                                {{ $reunion->date ?? '' }}
                            </td>
                            <td>
                                {{ $reunion->time ?? '' }}
                            </td>
                            <td>
                                @foreach($reunion->participants as $key => $item)
                                    <span class="badge badge-info">{{ $item->email }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('reunion_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reunions.show', $reunion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reunion_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reunions.edit', $reunion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reunion_delete')
                                    <form action="{{ route('admin.reunions.destroy', $reunion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('reunion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reunions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Reunion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('projet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.projets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.projet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.projet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Projet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.projet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.projet.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.projet.fields.date_debut') }}
                        </th>
                        <th>
                            {{ trans('cruds.projet.fields.date_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.projet.fields.team') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($projets as $projet)
    {{-- @php
        $projet= App\Models\Projet::find($id);
    @endphp --}}
    <tr data-entry-id="{{ $projet->id }}">
        <td>
        </td>
        <td>
            {{ $projet->id ?? '' }}
        </td>
        <td>
            {{ $projet->nom ?? '' }}
        </td>
        <td>
            {{ $projet->date_debut ?? '' }}
        </td>
        <td>
            {{ $projet->date_fin ?? '' }}
        </td>
        <td>
            @foreach($projet->teams as $key => $item)
                <span class="badge badge-info">{{ $item->name }}</span>
            @endforeach
        </td>
        <td>
        @can('projet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.projets.show', $projet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('projet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.projets.edit', $projet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('projet_delete')
                                    <form action="{{ route('admin.projets.destroy', $projet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('projet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.projets.massDestroy') }}",
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
  let table = $('.datatable-Projet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection

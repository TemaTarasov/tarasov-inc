@if (isset($table['actions']))
  @foreach ($table['actions'] as $action)
    <p role="bulk-action" data-type="{{ $action['type'] }}">{{ $action['label'] }}</p>
  @endforeach
@endif

<table class="table table-striped" role="table">
  <thead class="table-header">
  <tr class="table-header-row">
    <th class="table-header-cell select">
      <input type="checkbox" role="table-select-all">
    </th>
    @foreach ($table['items'] as $item)
      <th class="table-header-cell" style="width: {{ isset($item['width']) ? $item['width'] : 'auto' }}">
        {{ $item['label'] }}
      </th>
    @endforeach
  </tr>
  </thead>
  <tbody class="table-body">
  @foreach ($data as $result)
    <tr class="table-body-row">
      <td class="table-body-cell select">
        <input type="checkbox" role="table-select" data-id="{{ $result['_id'] }}" data-title="{{ $result[$tableTitle] }}">
      </td>
      @foreach ($table['items'] as $item)
        <td class="table-body-cell">
          <div class="table-body-cell-content">
            <span role="{{ isset($item['role']) ? $item['role'] : '' }}">
              {{ $result[$item['name']] }}
            </span>

            @if (isset($item['actions']))
              <div class="table-body-actions">
                @foreach ($item['actions'] as $action)
                  @if ($action['type'] === 'edit')
                    <a href="{{ $route }}/{{ $result['_id'] }}/{{ $action['type'] }}" class="table-action {{ $action['type'] }}">
                      {{ $action['label'] }}
                    </a>
                  @else
                    <span class="table-action {{ $action['type'] }}" role="table-action" data-type="{{ $action['type'] }}" data-id="{{ $result['_id'] }}" data-title="{{ $result[$tableTitle] }}">
                      {{ $action['label'] }}
                    </span>
                  @endif
                @endforeach
              </div>
            @endif
          </div>
        </td>
      @endforeach
    </tr>
  @endforeach
  </tbody>
</table>

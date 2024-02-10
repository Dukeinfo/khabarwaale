@if (isset($trashdata) & (count($trashdata) > 0))
<tr>
    <th colspan="9">
        <h3> Trash data </h3>
    </th>
</tr>
<tr>
   <th> #	 </th>
   <th> image	 </th>
   <th> News Type	 </th>
   <th> Category	 </th>
   <th> User	 </th>
   <th> Posted at	 </th>
   <th colspan="3" class="text-center"> Action </th>
</tr>
@forelse ($trashdata  as $keys => $trash)
    <tr>
        <td> {{ $trash->id }}</td>
        <td>   <img src="{{ isset($trash->thumbnail) ? getThumbnail($trash->thumbnail) : asset('no_image.jpg') }}"    alt=".."    class="img-size-50  img-bordered-sm rounded-circle"    width="50">   </td>
        <td>{{ ucwords($trash->newstype['name']) ?? 'NA' }}</td>
        <td>
            @if (strpos($trash->category_id, ',') === false)
            {{-- Single category ID --}}
            <span class="badge bg-dark p-1">{{ $record->getmenu['category_en'] }}</span>
        @else
            {{-- Multiple category IDs --}}
            @php
                $categoryIdsArray = explode(',', $trash->category_id);
                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
            @endphp
            @foreach ($categories as $category)
                <span class="badge bg-dark p-1">{{ $category->category_en }}</span>
            @endforeach
        @endif
            
            
            {{-- <span class="badge bg-dark p-1">   {{ $trash->getmenu['category_en'] ?? 'NA' }}</span> --}}
        </td>

        <td>
            {{-- @if ($trash->user['role_id'] == 1)
                <span class="badge bg-success p-1">
                    {{ $trash->user['name'] ?? 'NA' }} </span>
            @else
                {{ $trash->user['name'] ?? 'NA' }}
            @endif --}}

            @role('admin')
            <span class="badge bg-success p-1">
                Admin </span>

            @else
                {{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }} 
            @endrole
        </td>
        <td>{{ $trash->created_at->diffForHumans() ?? 'NA' }}</td>





        <td colspan="3" class="text-center">

            <button class="btn btn-sm btn-danger"
                wire:click="restore({{ $trash->id }})"
                wire:target="restore({{ $trash->id }})"
                wire:loading.attr="disabled">
                Restore</button>
            <button class="btn btn-sm btn-warning"
                onclick="confirm('Are you sure you want to Peramanetly remove  this News ?') || event.stopImmediatePropagation()"
                wire:click="paramDelete({{ $trash->id }})"
                wire:target="paramDelete({{ $trash->id }})"
                wire:loading.attr="disabled">
                Peramanet Delete</button>
            {{-- <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"  ><i class="fa fa-edit fa-fw"></i></a> --}}
            {{-- <a href="javascript:void(0)" class="text-danger me-2" title="Delete" ><i class="fa fa-times fa-fw fa-lg"></i></a> --}}
        </td>
    </tr>
@empty
@endforelse
@endif
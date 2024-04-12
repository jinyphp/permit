<x-wire-table>
    <x-wire-thead>
        {{-- 테이블 제목 --}}
        <th width="150">
            역할명
        </th>
        <th width="100">
            등록자수
        </th>

        <th>
            설명
        </th>
        <th width="100">
            redirect
        </th>
        <th width="200">
            관리자
        </th>
        <th width="200">
            등록일자
        </th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width="150">
                    {{-- {!! $popupEdit($item, $item->name) !!} --}}
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->name}}
                    </x-link-void>
                </td>

                    <td width="100">
                        {{ $item->cnt }}
                    </td>
                    <td>
                        {{ $item->description }}
                    </td>
                    <td width="100">
                        {{ $item->redirect }}
                    </td>
                    <td width="200">
                        {{ $item->manager }}
                    </td>
                    <td width="200">
                        {{ $item->created_at }}
                    </td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

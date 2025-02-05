<div class="row justify-content-center">
    <div class="col-12 col-md-4">

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                이름
            </label>
            <input type="text" id="simpleinput" class="form-control"
                wire:model.defer="filter.name">
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                이메일
            </label>
            <input type="text" id="simpleinput" class="form-control"
                wire:model.defer="filter.email">
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                역할
            </label>
            <select class="form-select" wire:model.defer="filter.role">
                <option value="">전체</option>
                @foreach (DB::table('roles')->get() as $role)
                    <option value="{{ $role->id }}:{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                목록
            </label>
            <input type="checkbox" class="form-check-input"
                {{ isset($filter['_read']) && $filter['_read'] ? 'checked' : '' }}
                wire:model.defer="filter._read">
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                보기
            </label>
            <input type="checkbox" class="form-check-input"
                {{ isset($filter['_view']) && $filter['_view'] ? 'checked' : '' }}
                wire:model.defer="filter._view">
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                쓰기
            </label>
            <input type="checkbox" class="form-check-input"
                {{ isset($filter['_write']) && $filter['_write'] ? 'checked' : '' }}
                wire:model.defer="filter._write">
        </div>


        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                수정
            </label>
            <input type="checkbox" class="form-check-input"
                {{ isset($filter['_update']) && $filter['_update'] ? 'checked' : '' }}
                wire:model.defer="filter._update">
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">
                삭제
            </label>
            <input type="checkbox" class="form-check-input"
                {{ isset($filter['_delete']) && $filter['_delete'] ? 'checked' : '' }}
                wire:model.defer="filter._delete">
        </div>
    </div>
</div>


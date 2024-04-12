<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">권환</span>
            </x-navtab-link>


            <x-form-hor>
                <x-form-label>권환체크</x-form-label>
                <x-form-item>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.permit.enable")
                    !!}
                    
                </x-form-item>
            </x-form-hor>
        </x-navtab-item>

    </x-navtab>
</div>
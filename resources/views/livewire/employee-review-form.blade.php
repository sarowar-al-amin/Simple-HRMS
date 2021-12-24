<x-adminlte-modal id="reviewModal" title="Review" theme="dark" icon="fas fa-eye" size='xl' scrollable>

    <form>
        @csrf
    
        @php
            $primaryObjectives = ['Knowledge/Experience', 'Independence', 'Influence', 'Organizational Scope', 'Job Contrast/Complexity', 'Execution'];
            $indicators = ['Has ability to meet deadline', 'Is committed', 'Organize tasks properly', 'Exploring Ability', 'Client happiness', 'Communication skill', 'Has sense of urgency', 'Team player'];
            $level = config('employee_levels')[4];
        @endphp
    
        <h3>Level Evaluation</h3>
    
        @for ($i=0; $i<6; $i++)
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">
                    <b>{{ $primaryObjectives[$i] }}:</b>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, asperiores fugiat modi sint unde voluptatibus ex perspiciatis doloribus at nemo. 
                </label>
            </div>
            <x-adminlte-textarea label="Justification" class="m-2" name="justifications[]" />    
        @endfor
    
        <h3>Behavioural Evaluation</h3>
        
        @for ($i=0; $i<8; $i++)
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                    <b>{{ $indicators[$i] }}</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia voluptatum cupiditate id a veniam ullam at nesciunt consectetur iure numquam!
                </label>
            </div>
            <x-adminlte-textarea label="Justification" class="m-2" name="justifications[]" />
        @endfor
    
        <h3>Final Evaluation</h3>
    
        <div class="form-check m-2">
    
            <input class="form-check-input-xl" type="checkbox">
            <label class="form-check-label text-lg">Promotion</label>
    
        </div>
    
        <x-adminlte-select class="m-2" label="Performence" name="performance">
            <option>Need Improvement</option>
            <option>Meet Expectations Very Well</option>
            <option>Exceed Expectations Heavily</option>
        </x-adminlte-select>
        
    </form>

    <x-slot name="footerSlot">
        <x-adminlte-button wire:click="addReview" class="mr-auto" theme="dark" label="Submit" />
        <x-adminlte-button theme="dark" label="Close" data-dismiss="modal" />
    </x-slot>

</x-adminlte-modal>
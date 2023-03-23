<?php

namespace App\Http\Livewire\Admin\Pages\Result;

use Livewire\Component;
use App\Models\Result;
use Illuminate\Support\Carbon;
use App\Pools\CheckTime;
use App\Models\Constants\TimeConstant;

class CreateResultDialog extends Component
{
    public bool $initializing = true;
    public array $prize = [];
    public $date = "";

    protected array $rules = [
        'prize.periode' =>'required|numeric|integer',
        'prize.first' => 'required|numeric|max_digits:6',
        'prize.second' => 'required|numeric|max_digits:6',
        'prize.third' => 'required|numeric|max_digits:6',
    ];
    protected array $validationAttributes = [
        'prize.periode' =>'periode',
        'prize.first' => 'first',
        'prize.second' => 'second',
        'prize.third' => 'third',
    ];

    protected function checkResultTime(){
        $now = Carbon::now();

        if ($now < Carbon::parse(TimeConstant::FIRST_FINISH_TIME)){
            return Carbon::parse(TimeConstant::FIRST_FINISH_TIME);
        }else{
            return Carbon::parse(TimeConstant::FIRST_FINISH_TIME);
        }

        return null;
    }

    public function init()
    {
        $dt = Carbon::now();
        $dt->between($dt->createFromTimeString('00:00'),$dt->createFromTimeString('12:00'));
        $periode = Result::max('periode')+1;

        $this->date = $dt->format('Y-m-d');
        $this->prize['periode'] = $periode;
        $this->prize['first'] = random_int(100000,999999);
        $this->prize['second'] = random_int(100000,999999);
        $this->prize['third'] = random_int(100000,999999);

        $this->initializing = false;
    }

    public function submit()
    {
        $this->validate($this->rules, [], $this->validationAttributes);
        $resultTime = $this->checkResultTime();

        try {
            Result::create([
                'periode' => $this->prize['periode'],
                'first' => $this->prize['first'],
                'second' => $this->prize['second'],
                'third' => $this->prize['third'],
                'starter' => random_int(100000,999999),
                'consolation' => random_int(100000,999999),
                'complete' => 0,
                'created_at' => Carbon::parse($this->date)->addHour($resultTime->hour)->addMinute($resultTime->minute),
            ]);
        } catch (\Exception $e) {
            return $this->dispatchBrowserEvent('flash', ['type' => 'error', 'message' => 'Terjadi Kesalahan Mohon Ulangi Kembali!']);
        }

        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('flash', ['type' => 'success', 'message' => 'Berhasil Input Prize!']);
        $this->dispatchBrowserEvent('close-create-dialog');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.pages.result.create-result-dialog');
    }
}
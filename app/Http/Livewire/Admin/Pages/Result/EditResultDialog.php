<?php

namespace App\Http\Livewire\Admin\Pages\Result;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Result;
use Carbon\Carbon;

class EditResultDialog extends Component
{
    public bool $initializing = true;
    public array $prize = [];
    public $date = "";

    protected array $rules = [
        'prize.first' => 'required|numeric|max_digits:6',
        'prize.second' => 'required|numeric|max_digits:6',
        'prize.third' => 'required|numeric|max_digits:6',
    ];
    protected array $validationAttributes = [
        'prize.first' => 'first',
        'prize.second' => 'second',
        'prize.third' => 'third',
    ];

    public function init($id)
    {
        $prize = Result::find($id);

        $dt = Carbon::parse($prize->created_at);
        $this->date = $dt->format('Y-m-d');
        $this->prize = $prize->toArray();

        $this->initializing = false;
    }

    public function submit()
    {
        $this->validate($this->rules, [], $this->validationAttributes);

        try {
            Result::findOrFail($this->prize['id'])->update([
                'first' => $this->prize['first'],
                'second' => $this->prize['second'],
                'third' => $this->prize['third'],
                'created_at' => Carbon::parse($this->date),
            ]);
        } catch (\Exception $e) {
            return $this->dispatchBrowserEvent('flash', ['type' => 'error', 'message' => 'Terjadi Kesalahan Mohon Ulangi Kembali!']);
        }

        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('flash', ['type' => 'success', 'message' => 'Prize berhasil diubah!']);
        $this->dispatchBrowserEvent('close-edit-dialog');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.pages.result.edit-result-dialog');
    }
}
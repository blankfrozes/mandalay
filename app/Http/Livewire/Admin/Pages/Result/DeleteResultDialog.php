<?php

namespace App\Http\Livewire\Admin\Pages\Result;

use Livewire\Component;
use App\Models\Result;

class DeleteResultDialog extends Component
{
    public $_id;
    public $periode = "";
    public $initializing = true;
    public $canDelete = true;

    public function init($id)
    {
        $result = Result::find($id);
        $this->_id = $result->id;
        $this->periode = $result->periode;
        $this->canDelete = true;

        $this->initializing = false;
    }

    public function submit()
    {
        try {
            Result::destroy($this->_id);
        } catch (\Exception $e) {
            return $this->dispatchBrowserEvent('flash', ['type' => 'error', 'message' => 'Terjadi Kesalahan Mohon Ulangi Kembali!']);
        }
        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('flash', ['type' => 'success', 'message' => 'Prize berhasil Dihapus!']);
        $this->dispatchBrowserEvent('close-delete-dialog');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.pages.result.delete-result-dialog');
    }
}

<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Traits\DeleteConfirm;
use Livewire\Component;

class Show extends Component
{
    use DeleteConfirm;
    public $contact;
    protected $listeners = ['confirmed' => 'deleted'];
    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function deleted()
    {
        try {
            Contact::find($this->model_id)->delete();
            $this->flash('success', 'Berhasil',[
                'text' => 'Data berhasil dihapus',
            ], route('contact.index'));
        }catch (\Exception $e) {
            $this->alert('error', 'Kesalahan',[
                'text' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.contact.show');
    }
}

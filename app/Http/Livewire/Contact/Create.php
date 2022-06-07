<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nickname, $other_detail, $first_name, $last_name, $handphone, $email, $id_type;
    public $identity_number, $company_name, $npwp, $telepon, $fax, $address, $bank_name, $bank_account_number;
    public $branch_office, $account_owner, $debit_account, $credit_account;
    public $contact_type = [];

    protected $rules = [
        'nickname' => 'required',
        'first_name' => 'required',
        'handphone' => 'required',
        'email' => 'required|email|unique:contacts',
        'contact_type' => 'required',
        'debit_account' => 'required|integer',
        'credit_account' => 'required|integer',
    ];

    public function store()
    {


        $this->validate();;
        try {
            DB::beginTransaction();
            $contact = Contact::create([
                'nickname' => $this->nickname,
                'other_details' => $this->other_detail,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'handphone' => $this->handphone,
                'email' => $this->email,
                'id_type' => $this->id_type,
                'identity_number' => $this->identity_number,
                'company_name' => $this->company_name,
                'npwp' => $this->npwp,
                'telepon' => $this->telepon,
                'fax' => $this->fax,
                'address' => $this->address,
                'bank_name' => $this->bank_name,
                'bank_account_number' => $this->bank_account_number,
                'branch_office' => $this->branch_office,
                'account_owner' => $this->account_owner,
                'debit_account' => $this->debit_account,
                'credit_account' => $this->credit_account,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

            $type_contact = [];

            foreach ($this->contact_type as $key => $value) {
                $type_contact[$key] = new ContactType([
                    'type' => $value,
                ]);
            }

            $contact->contactType()->saveMany($type_contact);

            $this->alert('success', 'Berhasil',[
                'text' => 'Data Berhasil Disimpan'
            ]);

            $this->reset();

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
    public function render()
    {
        return view('livewire.contact.create');
    }
}

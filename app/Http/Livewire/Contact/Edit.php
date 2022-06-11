<?php

namespace App\Http\Livewire\Contact;

use App\Models\ChartOfAccount;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $nickname, $other_details, $first_name, $last_name, $handphone, $email, $id_type;
    public $identity_number, $company_name, $npwp, $telepon, $fax, $address, $bank_name, $bank_account_number;
    public $branch_office, $account_owner, $debit_account, $credit_account;
    public $contact_type = [];

    public $contact_id;

    public function rules()
    {
        $id = $this->contact_id;
        return[
            'nickname' => 'required',
            'first_name' => 'required',
            'handphone' => 'required',
            'email' => 'required|email|unique:contacts,email,'.$id,
            'contact_type' => 'required',
            'debit_account' => 'required|integer',
            'credit_account' => 'required|integer',
        ];
    }

    public function mount(Contact $contact)
    {
        $this->nickname = $contact->nickname;
        $this->other_details = $contact->other_details;
        $this->first_name = $contact->first_name;
        $this->last_name = $contact->last_name;
        $this->handphone = $contact->handphone;
        $this->email = $contact->email;
        $this->id_type = $contact->id_type;
        $this->identity_number = $contact->identity_number;
        $this->company_name = $contact->company_name;
        $this->npwp = $contact->npwp;
        $this->telepon = $contact->telepon;
        $this->fax = $contact->fax;
        $this->address = $contact->address;
        $this->bank_name = $contact->bank_name;
        $this->bank_account_number = $contact->bank_account_number;
        $this->branch_office = $contact->branch_office;
        $this->account_owner = $contact->account_owner;
        $this->debit_account = $contact->debit_account;
        $this->credit_account = $contact->credit_account;
        $this->contact_id = $contact->id;

        foreach ($contact->contactType as $contact_type) {
            $this->contact_type[] = $contact_type->type;
        }
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $contact = Contact::where('id', $this->contact_id)->update([
                'nickname' => $this->nickname,
                'other_details' => $this->other_details,
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

            $contact = Contact::find($this->contact_id);
            $contact->contactType()->delete();
            $contact->contactType()->saveMany($type_contact);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data Berhasil Disimpan'
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.contact.edit', [
            'chart_of_accounts' => ChartOfAccount::latest()->get()
        ]);
    }
}

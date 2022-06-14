<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Models\ChartOfAccount;
use App\Models\ChartOfAccountCategory;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $name, $code, $category_id, $description, $report_type, $default_balance;
    public $lock_status = 'unlocked', $status, $account_id;

    public function setLockStatus()
    {
        if ($this->lock_status == 'unlocked'){
            $this->lock_status = 'locked';
        }else{
            $this->lock_status = 'unlocked';
        }
    }

    public function rules()
    {
        $code = $this->code;
        return [
            'name' => 'required',
            'code' => 'required|'. Rule::unique('chart_of_accounts')->ignore($code, 'code'),
            'report_type' => 'required',
            'default_balance' => 'required',
        ];
    }

    public function mount(ChartOfAccount $account)
    {
        $this->name = $account->name;
        $this->code = $account->code;
        $this->category_id = $account->chart_of_account_category_id;
        $this->description = $account->description;
        $this->report_type = $account->report_type;
        $this->default_balance = $account->default_balance;
        $this->lock_status = $account->lock_status;
        $this->status = $account->status;
        $this->account_id   =  $account->id;
    }
    public function update()
    {
        $this->validate();
        try {

            $chart_of_account = ChartOfAccount::where('id', $this->account_id)->update([
                'name' => $this->name,
                'code' => $this->code,
                'chart_of_account_category_id' => $this->category_id,
                'parent_id' => 1,
                'report_type' => $this->report_type,
                'default_balance' => $this->default_balance,
                'lock_status' => $this->lock_status,
                'description' => $this->description,
            ]);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil diubah',
            ]);

        }catch (\Exception $exception){
            return $this->alert('error', 'Kesalahan', [
                'text' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.chart-of-account.edit',[
            'categories' => ChartOfAccountCategory::orderBy('code', 'asc')->get(),
        ]);
    }
}

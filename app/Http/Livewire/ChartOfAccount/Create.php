<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Models\ChartOfAccount;
use App\Models\ChartOfAccountCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $name, $code, $category_id, $description, $report_type, $default_balance;
    public $lock_status = 'unlocked', $status;


    public function setLockStatus()
    {
        if ($this->lock_status == 'unlocked'){
            $this->lock_status = 'locked';
        }else{
            $this->lock_status = 'unlocked';
        }
    }

    public function generateCode($category_id)
    {
        //mengambil data chart of account
        $cart_of_account = ChartOfAccount::where('chart_of_account_category_id', $category_id)->latest()->first();

        //mengambil nomor terakhir
        $last_code = 0;

        if (empty($cart_of_account)){
            $last_code = 0;
        }else{
            $last_code = $cart_of_account->code+1;
        }

        return $last_code;
    }

    public function updatedCategoryId($value)
    {
        $this->code = $this->generateCode($value);

    }

    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:chart_of_accounts,code',
            'report_type' => 'required',
            'default_balance' => 'required',
        ];
    }

    public function store()
    {
        $this->validate();
        try {
            $chart_of_account = ChartOfAccount::create([
                'name' => $this->name,
                'code' => $this->code,
                'chart_of_account_category_id' => $this->category_id,
                'parent_id' => 1,
                'report_type' => $this->report_type,
                'default_balance' => $this->default_balance,
                'lock_status' => $this->lock_status,
            ]);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil disimpan'
            ]);

            $this->reset();

        }catch (\Exception $exception){
            dd($exception);
            return $this->alert('error', 'Kesalahan', [
                'text' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.chart-of-account.create',[
            'categories' => ChartOfAccountCategory::orderBy('code', 'asc')->get()
        ]);
    }
}

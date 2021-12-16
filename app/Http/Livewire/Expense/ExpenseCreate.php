<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use App\Models\Expense;
class ExpenseCreate extends Component
{
    public $description;
    public $amount = '0.00';    
    public $type;

    protected $rules =[
        'amount' => 'required',
        'type' => 'required',
        'description' => 'required'
    ];

    public function createExpense(){
        $this->validate();

        auth()->user()->expenses()->create([
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'user_id' => 1

        ]);
        session()->flash('message', 'Registro criado com sucesso!');
        $this->amount = $this->type = $this->description = null;

        //dd($this->description, $this->amount, $this->type);
    }
    public function render()

    {
        return view('livewire.expense.expense-create');
    }
}

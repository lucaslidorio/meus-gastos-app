<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{
    public function render()
    {
        $expenses = auth()->user()->expenses()->count() ? 
        Auth()->user()->expenses()->orderBy('created_at', 'DESC')->paginate(5) : []; 

        return view('livewire.expense.expense-list', compact('expenses'));
    }
    public function remove($expense){
       $exp = auth()->user()->expenses()->find($expense);

        $exp->delete();
        session()->flash('message', 'Registro removido com sucesso');

    }
}

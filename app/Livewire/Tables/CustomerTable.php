<?php

namespace App\Livewire\Tables;

use App\Models\Customer;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search = '';

    public $sortField = 'name';

    public $sortAsc = false;

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $customers = Customer::query()
            ->where('company_name', 'like', '%' . trim($this->search) . '%')
            ->orWhere('gst_no', 'like', '%' . trim($this->search) . '%')
            ->paginate($this->perPage);
//        return view('livewire.tables.customer-table', [
//            'customers' => Customer::where("user_id", auth()->id())
//                ->with('orders', 'quotations')
//                ->search($this->search)
//                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
//                ->paginate($this->perPage)
//        ]);
        return view('livewire.tables.customer-table', ['customers' => $customers]);
    }
}

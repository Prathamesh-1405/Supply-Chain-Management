<?php

namespace App\Livewire\Tables;

use App\Models\Item;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search = '';

    public $sortField = 'invoice_no';

    public $sortAsc = false;

    public function sortBy($field): void
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = ! $this->sortAsc;

        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
//        return view('livewire.tables.order-table', [
//            'orders' => Order::where("user_id",auth()->id())
//                ->with(['customer', 'details'])
//                ->search($this->search)
//                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
//                ->paginate($this->perPage)
//        ]);
        $orders = Order::query()->where('id', '=', trim($this->search))
            ->paginate($this->perPage);
        return view('livewire.tables.order-table', [
            'orders' =>  Order::all()
        ]);
    }
}

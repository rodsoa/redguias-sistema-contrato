<?php

namespace App\Http\Controllers;

use App\Domain\Services\CustomerService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * @var CustomerService
     */
    private $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function index(): Renderable
    {
        $customers = $this->service->listAll();
        return view('customers.index', compact('customers'));
    }

    public function create(): Renderable
    {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
           $this->service->create($request->all());
        } catch (\Exception $e) {
            return back()
                    ->withInput()
                    ->with([
                        'status' => 'error',
                        'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                    ]);
        }

        return redirect()->route('customers.index')->with([
           'status' => 'success',
           'message' => 'cliente adicionado com sucesso!'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|RedirectResponse|View
     */
    public function edit(int $id)
    {
        try {
           $customer = $this->service->findById($id);
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return view('customers.edit', compact('customer', $customer));
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\Models\Tables\Customer;
use App\Domain\Models\Tables\User;
use App\Domain\Services\AgreementService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgreementsController extends Controller
{
    /**
     * @var CustomerService
     */
    private $service;

    public function __construct(AgreementService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): Renderable
    {
        $filters = $request->has('customer') ? $request->input('customer') : null;
        $agreements = $this->service->listAll($filters);
        return view('agreements.index', compact('agreements'));
    }

    public function create(Request $request)//: Renderable
    {
        $employees   = User::role('employee')->get();
        $customers   = Customer::all();
        $customer_id = $request->has('customer') ? $request->input('customer') : null;
        $customer    = null;
        $renew = false;

        if ($customer_id) {
            $customer =  $customers->filter(function($item) use ($customer_id) { return $item->id == $customer_id; })->first();
        }

        return view('agreements.create', compact('employees', 'customers', 'customer_id', 'customer', 'renew'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->service->create($request->all());

        try {
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return redirect()->route('agreements.index')->with([
            'status' => 'success',
            'message' => 'cliente adicionado com sucesso!'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|RedirectResponse|View
     */
    public function edit(int $id)
    {
        $employees = User::role('employee')->get();
        $renew = false;

        try {
            $agreement = $this->service->findById($id);
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return view('agreements.edit', compact('agreement', 'employees', 'renew'));
    }

    public function renew(int $id)
    {
        $employees = User::role('employee')->get();
        $renew = true;

        try {
            $agreement = $this->service->findById($id);
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return view('agreements.edit', compact('agreement', 'employees', 'renew'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id) //: RedirectResponse
    {
        $this->service->update($request->all(), $id);
        try {
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return redirect()->route('agreements.index')->with([
            'status' => 'success',
            'message' => 'Cliente atualizado com sucesso!'
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        try {
            $this->service->delete($id);
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with([
                    'status' => 'error',
                    'message' => 'Ocorreu algum erro no processamento. Tente novamente em instantes'
                ]);
        }

        return redirect()->route('agreements.index')->with([
            'status' => 'success',
            'message' => 'Cliente apagado da base de dados.'
        ]);
    }
}

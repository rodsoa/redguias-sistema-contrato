<?php

namespace App\Http\Controllers;

use App\Domain\Models\Tables\Config;
use App\Domain\Models\Tables\Customer;
use App\Domain\Models\Tables\User;
use App\Domain\Services\AgreementService;
use App\Mail\AgreementMail;
use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
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
        try {
            $agreement = $this->service->create($request->all());
            if ($request->input('sendMail') == true) {
                $preview = false;
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML(
                    view('agreements.agreement_v2', compact('agreement', 'preview'))
                ) ->setPaper('a4', 'landscape');

                $this->sendEmail($agreement, $pdf);
            }
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
            'message' => 'Contrato adicionado com sucesso!'
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
        try {
            $agreement = $this->service->update($request->all(), $id);
            if ($request->input('sendMail') == true) {
                $preview = false;
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML(
                    view('agreements.agreement_v2', compact('agreement', 'preview'))
                ) ->setPaper('a4', 'landscape');

                $this->sendEmail($agreement, $pdf);
            }
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
            'message' => 'Contrato atualizado com sucesso!'
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
            'message' => 'Contrato apagado da base de dados.'
        ]);
    }

    public function download(int $id, bool $preview = false)
    {
        $agreement = $this->service->findById($id);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(
            view('agreements.agreement_v2', compact('agreement', 'preview'))
        ) ->setPaper('a4', 'landscape');

        if ($preview) {
            return view('agreements.agreement_v2', compact('agreement', 'preview'));
        }

        $this->sendEmail($agreement, $pdf);
        return redirect()
            ->back()
            ->with([
                'status' => 'success',
                'message' => 'Contrato Enviado'
            ]);
    }

    private function sendEmail($agreement, $pdf)
    {
        $emails = collect();
        $adminEmails = Config::first();

        $emails->add($agreement->employee->email);
        $emails->add($agreement->customer->email);
        $emails->add($adminEmails->primary_email);
        $emails->add($adminEmails->secondary_email);

        Mail::to($emails)
            ->send(new AgreementMail($pdf->output('contrato.pdf')));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankCustomer;
use App\Models\Billing_address;
use App\Models\Customer;
use App\Models\Status;
use App\Models\City;
use App\Models\Country;
use App\Models\Shipping_address;
use App\Models\State;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    const UPLOAD_PATH = 'public/customer/avatar';

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $status = Status::all();
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        return view('customers.create', compact('status', 'countries', 'states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('avatar')) {
            $avatar = $this->_procesarArchivo($request);
        } else {
            $avatar = [];
        }

        try {
            DB::beginTransaction();
            $customer = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'website' => $request->website,
                'notes' => $request->notes,
                'id_status' => $request->id_status,
                'avatar' => $avatar
            ];
            $cus = Customer::create($customer);

            $billing = [
                'id_customer' => $cus->id,
                'name' => $request->nameb,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'id_country' => $request->id_country,
                'id_state' => $request->id_state,
                'id_city' => $request->id_city,
                'pincode' => $request->pincode
            ];
            Billing_address::create($billing);

            $shipping = [
                'id_customer' => $cus->id,
                'name' => $request->names,
                'address1' => $request->address1s,
                'address2' => $request->address2s,
                'id_country' => $request->id_countrys,
                'id_state' => $request->id_states,
                'id_city' => $request->id_citys,
                'pincode' => $request->pincodes
            ];
            Shipping_address::create($shipping);
            $bank = [
                'id_customer' => $cus->id,
                'name' => $request->name,
                'account' => $request->account,
                'titular' => $request->titular,
                'branch' => $request->branch,
                'ifsc' => $request->ifsc
            ];

            BankCustomer::create($bank);
            DB::commit();
            Toastr::success(__('added successfully'),  __('Customer') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return to_route('customers');
    }

    private function _procesarArchivo(Request $request)
    {

        $request->validate([
            'avatar' => 'file|image|max:2048',
        ]);

        $ruta = self::UPLOAD_PATH;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = date('Ymd') . '_' . $avatar->getClientOriginalName();
            $name = str_replace(' ', '_', $filename);
            $this->_eliminarArchivo($name);
            $avatar->storeAs($ruta, $name);
        } else {
            $user = Customer::where('id', $request->id)->first();
            if ($user) {
                $name = $user->avatar;
            }
        }
        return $name;
    }
    public function _eliminarArchivo($name)
    {
        $archivo = self::UPLOAD_PATH . '/' . $name;
        app(FilesystemManager::class)->disk('public')->delete($archivo);
        app(FilesystemManager::class)->disk('local')->delete($archivo);
        Storage::disk('public')->delete($archivo);
        Storage::disk('local')->delete($archivo);
    }
    public function eliminar_avatar($name)
    {
        $this->_eliminarArchivo($name);
        return redirect()->back();
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
    public function edit(Customer $customer)
    {
        $status = Status::all();
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        return view('customers.edit', compact('customer', 'status', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function activar(Customer $customer)
    {
        $customer->id_status = "1";
        $customer->update();
        Toastr::success(__('Updated successfully'),  __('Activado') . ': ' . $customer->name);

        return redirect()->back();
    }

    public function desactivar(Customer $customer)
    {
        $customer->id_status = "2";
        $customer->update();
        Toastr::error(__('Updated successfully'),  __('Desactivado') . ': ' . $customer->name);

        return redirect()->back();
    }
}

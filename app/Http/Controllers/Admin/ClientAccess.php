<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientAccess extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function createForm()
    {
        return view('admin.layouts.client');
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function createClient(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'c_name' => 'required|max:255|unique:clients,c_name',
            'c_manager' => 'required|numeric',
            'c_company_code' => 'required|numeric|max:99999999|min:10000000|unique:clients,c_company_code',
            'c_contact_person_1' => 'required|max:255',
            'c_position_1' => 'required|max:255',
            'c_phone_1' => 'required|max:255|regex:/^([+]?380[0-9]{9})$/i',
            'c_email_1' => 'required|max:255|email',
            'c_contact_person_2' => 'max:255',
            'c_position_2' => 'max:255',
            'c_phone_2' => $request->c_phone_2 ? 'max:255|regex:/^([+]?380[0-9]{9})$/i' : '',
            'c_email_2' => $request->c_email_2 ? 'max:255|email' : '',
            'c_contact_person_3' => 'max:255',
            'c_position_3' => 'max:255',
            'c_phone_3' => $request->c_phone_3 ? 'max:255|regex:/^([+]?380[0-9]{9})$/i' : '',
            'c_email_3' => $request->c_email_3 ? 'max:255|email' : '',
            'c_city' => 'required|max:255',
            'c_legal_address' => 'max:255',
            'с_physical_adress' => 'max:255',
            'с_notice' => 'max:255',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем данные введенные из формы
        $client = $request->all();
        unset($client['_token']);
        $client += ["с_created_uid" => Auth::user()->id];

        Client::create($client);

        return json_encode('Client '. $request->c_name .' успешно добавлен');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function clientView($id)
    {
        $client = Client::findOrFail($id);

        return $client->toJson();
    }

    public function updateClient(Request $request, $id)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'c_name' => 'max:255',
            'c_manager' => 'numeric',
            'c_company_code' => 'numeric|max:99999999|min:10000000',
            'c_contact_person_1' => 'max:255',
            'c_position_1' => 'max:255',
            'c_phone_1' => $request->c_phone_1 ? 'max:255|regex:/^([+]?380[0-9]{9})$/i' : '',
            'c_email_1' => $request->c_email_1 ? 'max:255|email' : '',
            'c_contact_person_2' => 'max:255',
            'c_position_2' => 'max:255',
            'c_phone_2' => $request->c_phone_2 ? 'max:255|regex:/^([+]?380[0-9]{9})$/i' : '',
            'c_email_2' => $request->c_email_2 ? 'max:255|email' : '',
            'c_contact_person_3' => 'max:255',
            'c_position_3' => 'max:255',
            'c_phone_3' => $request->c_phone_3 ? 'max:255|regex:/^([+]?380[0-9]{9})$/i' : '',
            'c_email_3' =>  $request->c_email_3 ? 'max:255|email' : '',
            'c_city' => 'max:255',
            'c_legal_address' => 'max:255',
            'с_physical_adress' => 'max:255',
            'с_notice' => 'max:255',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //cохраняем изминения
        $client = Client::findOrFail($id);
        $changes = $request->all();
        unset($changes['_token']);
        $changes += ["c_edit_uid" => Auth::user()->id];
        $client->update($changes);

        //отправляем сообщение об успешном изминении
        $massag = 'Client '. $request->c_name .' успешно изменен';
        return json_encode($massag);
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return json_encode('Client  успешно удален');
    }
}

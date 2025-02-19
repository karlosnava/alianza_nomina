<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\DocumentType;

class Create extends Component
{
    public $countries, $cities = [], $user = null;
    public $first_name, $middle_name, $first_surname, $second_surname, $document_type_id = 0, $document, $boss_id, $address, $country_id = 0, $city_id = 0, $phone, $email, $password;

    protected $rules = [
        'first_name'       => ['required', 'string', 'min:3', 'max:20'],
        'middle_name'      => ['nullable', 'string', 'min:3', 'max:20'],
        'first_surname'    => ['required', 'string', 'min:3', 'max:20'],
        'second_surname'   => ['nullable', 'string', 'min:3', 'max:20'],
        'document_type_id' => ['required', 'integer', 'min:1', 'exists:document_types,id'],
        'document'         => ['required', 'numeric', 'unique:users,document'],
        'boss_id'          => ['required', 'integer', 'min:1', 'exists:users,id'],
        'address'          => ['required', 'string', 'min:5', 'max:30'],
        'country_id'       => ['required', 'integer', 'min:1', 'exists:countries,id'],
        'city_id'          => ['required', 'integer', 'min:1', 'exists:cities,id'],
        'phone'            => ['required', 'numeric', 'unique:users,phone'],
        'email'            => ['required', 'email:rfc,dns,filter_unicode', 'string', 'min:5', 'max:20', 'unique:users,email'],
        'password'         => ['nullable', 'string', 'min:5', 'max:20'],
    ];

    public function mount() {
        $this->countries = Country::orderBy('name')->get();    
    }

    public function submit()
    {
        $this->validate();
        $user = User::create([
            'first_name'       => $this->first_name,
            'middle_name'      => $this->middle_name,
            'first_surname'    => $this->first_surname,
            'second_surname'   => $this->second_surname,
            'document_type_id' => $this->document_type_id,
            'document'         => $this->document,
            'boss_id'          => $this->boss_id,
            'address'          => $this->address,
            'country_id'       => $this->country_id,
            'city_id'          => $this->city_id,
            'phone'            => $this->phone,
            'email'            => $this->email,
            'password'         => Hash::make($this->password),
        ]);
        return redirect()->route('users.show', $user);
    }

    public function updated($name, $value) {
        if ($name === 'country_id') {
            $this->cities = City::where('country_id', $value)->orderBy('name')->get();    
        }
    }

    public function render()
    {
        $document_types = DocumentType::all();
        $bosses = User::orderBy('first_name')->get();
        return view('livewire.users.create', compact('document_types', 'bosses'));
    }
}

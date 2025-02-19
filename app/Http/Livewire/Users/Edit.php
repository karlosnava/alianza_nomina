<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\DocumentType;
use App\Models\User;
use App\Models\Country;
use App\Models\City;

class Edit extends Component
{
    public $user, $countries, $cities = [];
    public $first_name, $middle_name, $first_surname, $second_surname, $document_type_id = 0, $document, $boss_id, $address, $country_id = 0, $city_id = 0, $phone, $email, $password;

    protected function rules()
    {
        return [
            'first_name'       => ['required', 'string', 'min:3', 'max:20'],
            'middle_name'      => ['nullable', 'string', 'min:3', 'max:20'],
            'first_surname'    => ['required', 'string', 'min:3', 'max:20'],
            'second_surname'   => ['nullable', 'string', 'min:3', 'max:20'],
            'document_type_id' => ['required', 'integer', 'min:1', 'exists:document_types,id'],
            'document'         => ['required', 'numeric', Rule::unique('users', 'document')->ignore($this->user->id)],
            'boss_id'          => ['nullable', 'integer', 'min:1', 'exists:users,id'],
            'address'          => ['required', 'string', 'min:5', 'max:30'],
            'country_id'       => ['required', 'integer', 'min:1', 'exists:countries,id'],
            'city_id'          => ['required', 'integer', 'min:1', 'exists:cities,id'],
            'phone'            => ['required', 'numeric', Rule::unique('users', 'phone')->ignore($this->user->id)],
            'email'            => ['required', 'email:rfc,dns,filter_unicode', 'string', 'min:5', 'max:20', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password'         => ['nullable', 'string', 'min:5', 'max:20'],
        ];
    }

    public function mount(User $user) {
        $this->user = $user;
        $this->countries = Country::orderBy('name')->get();

        // user info
        $this->first_name       = $this->user->first_name;
        $this->middle_name      = $this->user->middle_name;
        $this->first_surname    = $this->user->first_surname;
        $this->second_surname   = $this->user->second_surname;
        $this->document_type_id = $this->user->document_type_id;
        $this->document         = $this->user->document;
        $this->boss_id          = $this->user->boss_id;
        $this->address          = $this->user->address;
        $this->country_id       = $this->user->country_id;
        $this->city_id          = $this->user->city_id;
        $this->phone            = $this->user->phone;
        $this->email            = $this->user->email;

        $this->cities = City::where('country_id', $this->country_id)->orderBy('name')->get();
    }

    public function submit()
    {
        $this->validate();
        $this->user->update([
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
            'password'         => $this->password ? Hash::make($this->password) : NULL,
        ]);
        return redirect()->route('users.show', $this->user->id);
    }

    public function updated($name, $value) {
        if ($name === 'country_id') {
            $this->cities = City::where('country_id', $value)->orderBy('name')->get();    
        }
    }

    public function render() {
        $document_types = DocumentType::all();
        $bosses = User::whereNotIn('id', [$this->user->id])->orderBy('first_name')->get();
        return view('livewire.users.edit', compact('document_types', 'bosses'));
    }
}

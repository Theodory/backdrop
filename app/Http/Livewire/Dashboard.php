<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class Dashboard extends Component
{
    public $country ="Afghanistan",$countryRecord,$countries;

    protected $listeners = ['updateReport' => 'updateData'];


    public function mount(){
        $this->countryRecord = $this->countryData();
       $this->countries = $this->getCountries();
    }

    public function countryData()
    {
        $data = Country::join('records','records.country_id','countries.id')
        ->when(!is_null($this->country),function($q){
            $q->where('name',$this->country);
        })
        ->orderBy('year','asc')
        ->get()
        ->map(function($record){
           
            return [
                $record->year,
                $record->life_expectancy,
                $record->name
            ];
        })
        ->values()
        ->toArray();

        return json_encode($data);
    }

    public function updateData(){
         $this->countryRecord = $this->countryData();
         return view('livewire.dashboard',['countryRecord' =>$this->countryRecord]);
    }

    public function getCountries(){
        return Country::orderBy('name','asc')->pluck('name');
    }

    public function changeCountryData(){
        // $this->countryRecord = $this->countryData();
        // dd($this->countryRecord);
        // $this->emit('updateReport');
       
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    } 
    public function update(Request $req){ 

        $companies = Company::find(1);
        $companies->name = $req->name;
        $companies->address = $req->address;
        $companies->tin = $req->tin; 
        $companies->save();
        return Company::all();
    }
    public function newCompany(){ 

        $companies = new Company;
        $companies->name = 'sample Company Name';
        $companies->address = "address";
        $companies->tin = "000000000"; 
        $companies->save();
        return Company::all();
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\GovernancePolicy;
use App\Models\GovernancePolicyFaq;
use App\Models\StructuresProcessesFaq;
use App\models\SuccessStorySpec;


use App\Models\Team;


class GovernaceController extends Controller
{
    public function index()
    {
       

        $settings=Setting::first();

        $governancepolicy=GovernancePolicy::first();
        $governancepolicyfaqs=GovernancePolicyFaq::all();
        $structuresprocessesfaqs=StructuresProcessesFaq::all();
   
        return view("frontend.governace",compact("governancepolicy","settings","governancepolicyfaqs","structuresprocessesfaqs"));
    }
}

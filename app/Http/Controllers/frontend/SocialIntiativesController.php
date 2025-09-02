<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\SocialInitiative;

use App\models\SuccessStorySpec;




class SocialIntiativesController  extends Controller
{
    public function index()
    {
       

        $settings=Setting::first();

        $governancepolicy=GovernancePolicy::first();
 
   
        return view("frontend.governace",compact("governancepolicy","settings","governancepolicyfaqs","structuresprocessesfaqs"));
    }
}

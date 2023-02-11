@extends('layouts.app') @section('content')
<div class="container">
    @if ($errors->has('message'))
    <div class="text-danger">
        <strong>Error!</strong>
        {{ $errors->first('message') }}
    </div>
    @endif
    <form method="post" action="{{ route('store') }}">
        @csrf
        <div class="form-group">
            <label>Keyword</label>
            <input
                type="text"
                class="form-control {{ $errors->has('keyword') ? 'error' : '' }}"
                name="keyword"
                id="keyword">
            <!-- Error -->
            @if ($errors->has('keyword'))
            <div class="text-danger">
                <strong>Error!</strong>
                {{ $errors->first('keyword') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Country</label>
            <select class="form-control" required="required" name="country_code">
                <option value="2004">
                    Afghanistan</option>
                <option value="2008">
                    Albania</option>
                <option value="2010">
                    Antarctica</option>
                <option value="2012">
                    Algeria</option>
                <option value="2016">
                    American Samoa</option>
                <option value="2020">
                    Andorra</option>
                <option value="2024">
                    Angola</option>
                <option value="2028">
                    Antigua and Barbuda</option>
                <option value="2031">
                    Azerbaijan</option>
                <option value="2032">
                    Argentina</option>
                <option value="2036">
                    Australia</option>
                <option value="2040">
                    Austria</option>
                <option value="2044">
                    The Bahamas</option>
                <option value="2048">
                    Bahrain</option>
                <option value="2050">
                    Bangladesh</option>
                <option value="2051">
                    Armenia</option>
                <option value="2052">
                    Barbados</option>
                <option value="2056">
                    Belgium</option>
                <option value="2064">
                    Bhutan</option>
                <option value="2068">
                    Bolivia</option>
                <option value="2070">
                    Bosnia and Herzegovina</option>
                <option value="2072">
                    Botswana</option>
                <option value="2076">
                    Brazil</option>
                <option value="2084">
                    Belize</option>
                <option value="2090">
                    Solomon Islands</option>
                <option value="2096">
                    Brunei</option>
                <option value="2100">
                    Bulgaria</option>
                <option value="2104">
                    Myanmar (Burma)</option>
                <option value="2108">
                    Burundi</option>
                <option value="2116">
                    Cambodia</option>
                <option value="2120">
                    Cameroon</option>
                <option value="2124">
                    Canada</option>
                <option value="2132">
                    Cape Verde</option>
                <option value="2140">
                    Central African Republic</option>
                <option value="2144">
                    Sri Lanka</option>
                <option value="2148">
                    Chad</option>
                <option value="2152">
                    Chile</option>
                <option value="2156">
                    China</option>
                <option value="2162">
                    Christmas Island</option>
                <option value="2166">
                    Cocos (Keeling) Islands</option>
                <option value="2170">
                    Colombia</option>
                <option value="2174">
                    Comoros</option>
                <option value="2178">
                    Republic of the Congo</option>
                <option value="2180">
                    Democratic Republic of the Congo</option>
                <option value="2184">
                    Cook Islands</option>
                <option value="2188">
                    Costa Rica</option>
                <option value="2191">
                    Croatia</option>
                <option value="2196">
                    Cyprus</option>
                <option value="2203">
                    Czechia</option>
                <option value="2204">
                    Benin</option>
                <option value="2208">
                    Denmark</option>
                <option value="2212">
                    Dominica</option>
                <option value="2214">
                    Dominican Republic</option>
                <option value="2218">
                    Ecuador</option>
                <option value="2222">
                    El Salvador</option>
                <option value="2226">
                    Equatorial Guinea</option>
                <option value="2231">
                    Ethiopia</option>
                <option value="2232">
                    Eritrea</option>
                <option value="2233">
                    Estonia</option>
                <option value="2239">
                    South Georgia and the South Sandwich Islands</option>
                <option value="2242">
                    Fiji</option>
                <option value="2246">
                    Finland</option>
                <option value="2250">
                    France</option>
                <option value="2258">
                    French Polynesia</option>
                <option value="2260">
                    French Southern and Antarctic Lands</option>
                <option value="2262">
                    Djibouti</option>
                <option value="2266">
                    Gabon</option>
                <option value="2268">
                    Georgia</option>
                <option value="2270">
                    The Gambia</option>
                <option value="2276">
                    Germany</option>
                <option value="2288">
                    Ghana</option>
                <option value="2296">
                    Kiribati</option>
                <option value="2300">
                    Greece</option>
                <option value="2308">
                    Grenada</option>
                <option value="2316">
                    Guam</option>
                <option value="2320">
                    Guatemala</option>
                <option value="2324">
                    Guinea</option>
                <option value="2328">
                    Guyana</option>
                <option value="2332">
                    Haiti</option>
                <option value="2334">
                    Heard Island and McDonald Islands</option>
                <option value="2336">
                    Vatican City</option>
                <option value="2340">
                    Honduras</option>
                <option value="2348">
                    Hungary</option>
                <option value="2352">
                    Iceland</option>
                <option value="2356">
                    India</option>
                <option value="2360">
                    Indonesia</option>
                <option value="2368">
                    Iraq</option>
                <option value="2372">
                    Ireland</option>
                <option value="2376">
                    Israel</option>
                <option value="2380">
                    Italy</option>
                <option value="2384">
                    Cote d'Ivoire</option>
                <option value="2388">
                    Jamaica</option>
                <option value="2392">
                    Japan</option>
                <option value="2398">
                    Kazakhstan</option>
                <option value="2400">
                    Jordan</option>
                <option value="2404">
                    Kenya</option>
                <option value="2410">
                    South Korea</option>
                <option value="2414">
                    Kuwait</option>
                <option value="2417">
                    Kyrgyzstan</option>
                <option value="2418">
                    Laos</option>
                <option value="2422">
                    Lebanon</option>
                <option value="2426">
                    Lesotho</option>
                <option value="2428">
                    Latvia</option>
                <option value="2430">
                    Liberia</option>
                <option value="2434">
                    Libya</option>
                <option value="2438">
                    Liechtenstein</option>
                <option value="2440">
                    Lithuania</option>
                <option value="2442">
                    Luxembourg</option>
                <option value="2450">
                    Madagascar</option>
                <option value="2454">
                    Malawi</option>
                <option value="2458">
                    Malaysia</option>
                <option value="2462">
                    Maldives</option>
                <option value="2466">
                    Mali</option>
                <option value="2470">
                    Malta</option>
                <option value="2478">
                    Mauritania</option>
                <option value="2480">
                    Mauritius</option>
                <option value="2484">
                    Mexico</option>
                <option value="2492">
                    Monaco</option>
                <option value="2496">
                    Mongolia</option>
                <option value="2498">
                    Moldova</option>
                <option value="2499">
                    Montenegro</option>
                <option value="2504">
                    Morocco</option>
                <option value="2508">
                    Mozambique</option>
                <option value="2512">
                    Oman</option>
                <option value="2516">
                    Namibia</option>
                <option value="2520">
                    Nauru</option>
                <option value="2524">
                    Nepal</option>
                <option value="2528">
                    Netherlands</option>
                <option value="2531">
                    Curacao</option>
                <option value="2534">
                    Sint Maarten</option>
                <option value="2535">
                    Caribbean Netherlands</option>
                <option value="2540">
                    New Caledonia</option>
                <option value="2548">
                    Vanuatu</option>
                <option value="2554">
                    New Zealand</option>
                <option value="2558">
                    Nicaragua</option>
                <option value="2562">
                    Niger</option>
                <option value="2566">
                    Nigeria</option>
                <option value="2570">
                    Niue</option>
                <option value="2574">
                    Norfolk Island</option>
                <option value="2578">
                    Norway</option>
                <option value="2580">
                    Northern Mariana Islands</option>
                <option value="2581">
                    United States Minor Outlying Islands</option>
                <option value="2583">
                    Federated States of Micronesia</option>
                <option value="2584">
                    Marshall Islands</option>
                <option value="2585">
                    Palau</option>
                <option value="2586">
                    Pakistan</option>
                <option value="2591">
                    Panama</option>
                <option value="2598">
                    Papua New Guinea</option>
                <option value="2600">
                    Paraguay</option>
                <option value="2604">
                    Peru</option>
                <option value="2608">
                    Philippines</option>
                <option value="2612">
                    Pitcairn Islands</option>
                <option value="2616">
                    Poland</option>
                <option value="2620">
                    Portugal</option>
                <option value="2624">
                    Guinea-Bissau</option>
                <option value="2626">
                    Timor-Leste</option>
                <option value="2634">
                    Qatar</option>
                <option value="2642">
                    Romania</option>
                <option value="2646">
                    Rwanda</option>
                <option value="2654">
                    Saint Helena, Ascension and Tristan da Cunha</option>
                <option value="2659">
                    Saint Kitts and Nevis</option>
                <option value="2662">
                    Saint Lucia</option>
                <option value="2666">
                    Saint Pierre and Miquelon</option>
                <option value="2670">
                    Saint Vincent and the Grenadines</option>
                <option value="2674">
                    San Marino</option>
                <option value="2678">
                    Sao Tome and Principe</option>
                <option value="2682">
                    Saudi Arabia</option>
                <option value="2686">
                    Senegal</option>
                <option value="2688">
                    Serbia</option>
                <option value="2690">
                    Seychelles</option>
                <option value="2694">
                    Sierra Leone</option>
                <option value="2702">
                    Singapore</option>
                <option value="2703">
                    Slovakia</option>
                <option value="2704">
                    Vietnam</option>
                <option value="2705">
                    Slovenia</option>
                <option value="2706">
                    Somalia</option>
                <option value="2710">
                    South Africa</option>
                <option value="2716">
                    Zimbabwe</option>
                <option value="2724">
                    Spain</option>
                <option value="2740">
                    Suriname</option>
                <option value="2748">
                    Eswatini</option>
                <option value="2752">
                    Sweden</option>
                <option value="2756">
                    Switzerland</option>
                <option value="2762">
                    Tajikistan</option>
                <option value="2764">
                    Thailand</option>
                <option value="2768">
                    Togo</option>
                <option value="2772">
                    Tokelau</option>
                <option value="2776">
                    Tonga</option>
                <option value="2780">
                    Trinidad and Tobago</option>
                <option value="2784">
                    United Arab Emirates</option>
                <option value="2788">
                    Tunisia</option>
                <option value="2792">
                    Turkey</option>
                <option value="2795">
                    Turkmenistan</option>
                <option value="2798">
                    Tuvalu</option>
                <option value="2800">
                    Uganda</option>
                <option value="2804">
                    Ukraine</option>
                <option value="2807">
                    North Macedonia</option>
                <option value="2818">
                    Egypt</option>
                <option value="2826">
                    United Kingdom</option>
                <option value="2831">
                    Guernsey</option>
                <option value="2832">
                    Jersey</option>
                <option value="2834">
                    Tanzania</option>
                <option value="2840">
                    United States</option>
                <option value="2854">
                    Burkina Faso</option>
                <option value="2858">
                    Uruguay</option>
                <option value="2860">
                    Uzbekistan</option>
                <option value="2862">
                    Venezuela</option>
                <option value="2876">
                    Wallis and Futuna</option>
                <option value="2882">
                    Samoa</option>
                <option value="2887">
                    Yemen</option>
            </select>
        </div>
        <div class="form-group">
            <label>Device</label>
            <select class="form-control" required="required" name="device">
                <option value="desktop">Desktop</option>
                <option value="mobile">Mobile</option>
            </select>
        </div>
        <div class="form-group">
            <label>Repetitions</label>
            <input
                type="number"
                min="1"
                class="form-control"
                id="repetitions"
                name="repetitions"
                placeholder="1"></div>
        @if ($errors->has('repetitions'))
        <div class="text-danger">
                <strong>Error!</strong>
                {{ $errors->first('repetitions') }}
            </div>
        @endif
        <input
            type="submit"
            name="send"
            value="Submit"
            onclick="this.disabled=true;this.form.submit();" 
            class="btn btn-dark btn-block mt-2">
    </div>
</form>
</div>
@endsection
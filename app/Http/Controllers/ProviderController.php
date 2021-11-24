<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;


class ProviderController extends Controller
{
    public function index() {
        return view('app.providers.index');
    }

    // search for providers
    public function list(Request $request) {
        $providers = Provider::where('name', 'like', '%'.$request->input('name').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('app.providers.list', ['providers' => $providers, 'request' => $request->all()]);
    }

    public function create(Request $request) {

        $msg = "";

        // if request doesn´t has id we´ll make create
        if ($request->input('_token') != '' && $request->input('id') == '') {
            // ** Validation
            // rules
            $rules = [
                'name'  => 'required|min:3',
                'uf'    => 'required',
                'email' => 'email',
                'site'  => 'required'
            ];

            // messages
            $messages = [
                'name.required' => 'The name field is required.',
                'uf.required'   => 'The uf field is required.',
                'email.email'   => 'The email field is required.',
                'site.required' => 'The site field is required.',
            ];

            $request->validate($rules, $messages);
            // ** end Validation

            // getting all coming from request and saving in database
            $data = $request->all();
            Provider::create($data);

            $msg = "Provider registered successfully!";
        }

        // if request has id we´ll make update
        if ($request->input('_token') != '' && $request->input('id') != '') {

            $provider = Provider::findOrFail($request->input('id'));
            $feedback = $provider->update($request->all());

            if ($feedback) {
                $msg = "Provider updated successfully!";
            }
            else {
                echo "Unable to update!";
            }

            return redirect()->route('app.providers.edit', ['request' => $request->all(), 'id' => $request->input('id'), 'msg' => $msg]);

        }

        return view('app.providers.create', ['msg' => $msg]);
    }

    public function show($id)
    {
        $provider = Provider::findOrFail($id)->with('products')->find($id);
        $total = count($provider->products);

        echo "Name: $provider->name<br />Location: $provider->uf<br />
              Email: $provider->email<br />Site: $provider->site<br /><br /><br />";
        echo "<strong>Products: $total registered product(s).</strong><br /><br /><br />";

        if (count($provider->products) > 0) {
            echo
                '<table class="table" style="border: 1px solid #dee2e6;">
                    <thead>
                        <tr>
                            <th scope="col" style="border: 1px solid #dee2e6;">Product</th>
                            <th scope="col" style="border: 1px solid #dee2e6;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>';

                    foreach($provider->products as $product) {
                        echo 
                            '<tr>';
                            echo 
                                '<td style="border: 1px solid #dee2e6;">' . $product->name . '</td>' .
                                '<td style="border: 1px solid #dee2e6;">' . $product->weight . '</td>';
                        echo
                            '</tr>';
                    }  
            echo
                    '</tbody>
                </table>';
        }
        else {
            echo "No products registered.<br />";
        }
        
        echo "<br /><a href='/app/providers'>Return</a>";
    }


    public function edit(Request $request, $id, $msg=null) {
        $provider = Provider::findOrFail($id);
        return view('app.providers.create', ['request' => $request->all(), 'provider' => $provider, 'msg' => $msg]);
    }

    public function destroy($id) {
        $msg = "";
        $provider = Provider::findOrFail($id)->delete();
        $msg = "Provider deleted successfully!";
        return redirect()->route('app.providers.index', compact('msg'));
    }
}

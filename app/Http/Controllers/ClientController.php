<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::paginate(5);
        return view('app.clients.index', ['clients' => $clients, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        // gettin all coming from request and saving in database
        $data = $request->all();
        Client::create($data);
        return redirect()->route('app.clients.index', ['msg' => 'Customer registered successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id)->with('orders')->find($id);
        $total = count($client->orders);

        echo "Name: $client->name<br /><br />";
        echo "<strong>Orders: $total registered order(s).</strong><br /><br /><br />";

        if (count($client->orders) > 0) {
            echo
                '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="border: 1px solid #dee2e6;">Order ID</th>
                            <th scope="col" style="border: 1px solid #dee2e6;">Purchase date</th>
                        </tr>
                    </thead>
                    <tbody>';

                    foreach($client->orders as $order) {
                        echo 
                            '<tr>';
                            echo 
                                '<td style="border: 1px solid #dee2e6;">' . $order->id . '</td>' .
                                '<td style="border: 1px solid #dee2e6;">' . $order->created_at->format('d/m/Y') . '</td>';
                        echo
                            '</tr>';
                    }  
            echo
                    '</tbody>
                </table>';
        }
        else {
            echo "No orders registered.<br />";
        }

        echo "<br /><a href='/app/clients'>Return</a>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('app.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $data = $request->all();
        $client->update($data);
        return redirect()->route('app.clients.index', ['msg' => 'Client updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('app.clients.index', ['msg' => 'Client deleted successfully!']);
    }
}

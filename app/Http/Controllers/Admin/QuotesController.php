<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Http\Requests;
use Stoneworking\Http\Requests\QuoteRequest;

class QuotesController extends Controller
{
    /**
     * Display quote form
     * 
     * @return Illuminate\Http\Response
     */
    public function show()
    {
        return view('public/quotes/quote');
    }

    /**
     * Process Quote Form
     * 
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function processQuote(QuoteRequest $request)
    {        
        $data = [
            'name'      => $request->name,
            'mobile'    => $request->mobile,
            'email'     => $request->email,
            'blueprint' => $request->blueprint[0],
            'size1'     => $request->input('size-1'),
            'size2'     => $request->input('size-2'),
            'size3'     => $request->input('size-3'),
            'message'   => $request->message,
            'image'     => $request->file('image'),
        ];

        switch ($data['blueprint']) {
            case 'single':
                $data['blueprint'] = 'Barra Simple';
                break;

            case 'squared':
                $data['blueprint'] = 'Barra Escuadra';
                break;

            case 'u':
                $data['blueprint'] = 'Barra U';
                break;

            case 'double':
                $data['blueprint'] = 'Barra Doble';
                break;
            
            default:
                $data['blueprint'] = 'No se envió ningún plano';
                break;
        }

        \Mail::send('emails.quote', ['data' => $data], function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->replyTo($data['email'], $data['name']);

            $message->to('stoneworkingmexico@gmail.com', 'Guillermo Humberto Luna Lopez');
            $message->subject('Solicitud de Cotización de Stoneworking');

            $message->attach($data['image'], [
                'as' => $data['image']->getClientOriginalName(),
                'mime' => 'image/jpeg'
            ]);
        });

        session()->flash('sended', true);

        return redirect()->route('quote-thanks');
    }

    /**
     * Thanks page
     * 
     * @return Illuminate\Http\Response
     */
    public function quoteThanks()
    {
        if(session('sended')) {
            return view('public/quotes/thanks');
        }

        return redirect()->route('homepage');
    }
}

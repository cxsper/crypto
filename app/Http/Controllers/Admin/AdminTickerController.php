<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticker;
use App\Http\Requests\UpdateOrCreateTickerRequest;

class AdminTickerController extends Controller
{

    public function index()
    {
        $paginatedTickers = Ticker::withCount('sells')
            ->orderBy('sells_count', 'desc')
            ->paginate(10);

        $tickers = $paginatedTickers->items();

        return view('admin.tickers.tickers')->with(compact('paginatedTickers', 'tickers'));
    }

    public function show(Ticker $ticker)
    {
        return view('admin.tickers.ticker')->with(compact('ticker'));
    }

    public function update(UpdateOrCreateTickerRequest $request, Ticker $current_ticker)
    {
        $current_ticker->name = $request->name;
        $current_ticker->ticker = 't' . strtoupper($request->ticker) . 'USD';
        $current_ticker->wallet = $request->wallet;
        $current_ticker->save();

        return redirect()->back()->withSuccess('Информация успешно сохранена');
    }

    public function add()
    {
        return view('admin.tickers.ticker');
    }

    public function create(UpdateOrCreateTickerRequest $request)
    {
        $ticker = new Ticker;
        $ticker->ticker = 't' . strtoupper($request->ticker) . 'USD';
        $ticker->name = $request->name;
        $ticker->wallet = $request->wallet;
        $ticker->save();

        return redirect()->route('admin.tickers')->withSuccess('Валюта успешно добавлена');
    }

    public function remove(Ticker $ticker)
    {
        $ticker->delete();

        return redirect()->route('admin.tickers')->withFailure('Валюта успешно удалена');
    }
}

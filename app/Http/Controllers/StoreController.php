<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $stores = Auth::user()->stores()->paginate(10);
        return view('stores.index', compact('stores'));
    }

    /**
     * @param Store $store
     *
     * @return View
     */
    public function show(Store $store): View
    {
        return view('stores.view', [
            'store' => $store
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('stores.form');
    }

    /**
     * @param Store $store
     *
     * @return View
     */
    public function edit(Store $store): View
    {

        return view('stores.form', compact('store'));
    }

    /**
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $store = Store::create(array_merge($validated, ['user_id' => Auth::user()->id]));

        return redirect(route('stores.index'))->withSuccess('Store ' . $store->title . ' created successfully.');
    }

    
    /**
     * @param StoreRequest $request
     * @param Store $store
     *
     * @return RedirectResponse
     */
    public function update(StoreRequest $request, Store $store): RedirectResponse
    {

        $store->update($request->validated());

        return redirect(route('stores.edit', $store))->withSuccess('Store updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $title = $store->title;
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store ' . $title . ' has been deleted successfully.');

    }
}

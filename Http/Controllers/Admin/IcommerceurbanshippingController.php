<?php

namespace Modules\Icommerceurbanshipping\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icommerceurbanshipping\Entities\Icommerceurbanshipping;
use Modules\Icommerceurbanshipping\Http\Requests\CreateIcommerceurbanshippingRequest;
use Modules\Icommerceurbanshipping\Http\Requests\UpdateIcommerceurbanshippingRequest;
use Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class IcommerceurbanshippingController extends AdminBaseController
{
    /**
     * @var IcommerceurbanshippingRepository
     */
    private $icommerceurbanshipping;

    public function __construct(IcommerceurbanshippingRepository $icommerceurbanshipping)
    {
        parent::__construct();

        $this->icommerceurbanshipping = $icommerceurbanshipping;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$icommerceurbanshippings = $this->icommerceurbanshipping->all();

        return view('icommerceurbanshipping::admin.icommerceurbanshippings.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icommerceurbanshipping::admin.icommerceurbanshippings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateIcommerceurbanshippingRequest $request
     * @return Response
     */
    public function store(CreateIcommerceurbanshippingRequest $request)
    {
        $this->icommerceurbanshipping->create($request->all());

        return redirect()->route('admin.icommerceurbanshipping.icommerceurbanshipping.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icommerceurbanshipping::icommerceurbanshippings.title.icommerceurbanshippings')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Icommerceurbanshipping $icommerceurbanshipping
     * @return Response
     */
    public function edit(Icommerceurbanshipping $icommerceurbanshipping)
    {
        return view('icommerceurbanshipping::admin.icommerceurbanshippings.edit', compact('icommerceurbanshipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Icommerceurbanshipping $icommerceurbanshipping
     * @param  UpdateIcommerceurbanshippingRequest $request
     * @return Response
     */
    public function update(Icommerceurbanshipping $icommerceurbanshipping, UpdateIcommerceurbanshippingRequest $request)
    {
        $this->icommerceurbanshipping->update($icommerceurbanshipping, $request->all());

        return redirect()->route('admin.icommerceurbanshipping.icommerceurbanshipping.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icommerceurbanshipping::icommerceurbanshippings.title.icommerceurbanshippings')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Icommerceurbanshipping $icommerceurbanshipping
     * @return Response
     */
    public function destroy(Icommerceurbanshipping $icommerceurbanshipping)
    {
        $this->icommerceurbanshipping->destroy($icommerceurbanshipping);

        return redirect()->route('admin.icommerceurbanshipping.icommerceurbanshipping.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icommerceurbanshipping::icommerceurbanshippings.title.icommerceurbanshippings')]));
    }
}

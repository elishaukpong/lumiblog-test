<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * @var BaseInterface
     */
    protected $interface;
    /**
     * @var Request
     */
    protected $request;
    protected $limit = 10;
    protected $viewIndex = '';
    protected $editView = '';
    protected $routeIndex;

    public function __construct(BaseInterface $interface, Request $request)
    {
        $this->interface = $interface;
        $this->request = $request;
    }

    public function index()
    {
        return view($this->viewIndex)->with('entities',$this->interface->simplePaginate($this->limit));
    }

    public function edit($id)
    {
        return view($this->editView,['entity'=> $this->interface->findOrFail($id)]);
    }

    public function show($id)
    {

    }

    public function update($entityId)
    {
        $entity = $this->interface->update($entityId, $this->request->except(['_token', '_method']));

        return $this->makeResponse($entity);
    }

    public function destroy($entityId)
    {
        $deleted = $this->interface->delete($entityId);
        return $this->makeResponse($deleted);
    }

    public function makeResponse($entity)
    {
        if ($entity) {
            return redirect()->to($this->routeIndex)->with('success','Action Successful');
        }

        if (null === $entity) {
            return redirect()->to($this->routeIndex)->with('warning', 'Something Went Wrong!');
        }

        return redirect()->to($this->routeIndex)->with('info','Action Not Taken!');
    }

}

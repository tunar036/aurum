<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormMenuRequest;
use App\Models\Menu;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menus index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nested = nestable()->make(Menu::all())->renderAsArray();
        $menus = $this->buildMenuTree($nested);

        return view('backend.menus.index', compact('menus'));
    }

    public function create()
    {
        abort_if(Gate::denies('menus create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menus = Menu::with(['parent', 'children'])->get();
        $edit = false;
        return view('backend.menus.form', compact('menus', 'edit'));
    }

    public function store(FormMenuRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('menus create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu = Menu::create($request->validated());

        if ($request->hasFile('background_image')) {
            $uploadImageService->upload($menu, 'background_image', 'background_images', false, false);
        }
        if ($request->hasFile('about_image')) {
            $uploadImageService->upload($menu, 'about_image', 'about_images', false, false);
        }

        return redirect(route('backend.menus.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Menu $menu)
    {
        abort_if(Gate::denies('menus show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        // dd(Media::where('model_id',$menu->id)->get());
        // $media = Media::findOrFail($request['id']);
        abort_if(Gate::denies('menus edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menus = Menu::with(['parent', 'children'])->notId($menu->id)->get();
        $edit = true;

        return view('backend.menus.form', compact('menu', 'menus', 'edit'));
    }

    public function update(FormMenuRequest $request, Menu $menu,UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('menus edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($request->validated());
        $menu->update($request->validated());
        if ($request->hasFile('background_image')) {
            $uploadImageService->upload($menu, 'background_image', 'background_images', false, false);
        }
        if ($request->hasFile('about_image')) {
            $uploadImageService->upload($menu, 'about_image', 'about_images', false, false);
        }

        return redirect(route('backend.menus.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Menu $menu)
    {
        abort_if(Gate::denies('menus delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $menu->delete();
            return response(['status' => 1]);
            session()->flash('success', trans('backend.messages.success.delete'));

        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            session()->flash('error', trans('backend.messages.error.delete'));
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('menus delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function refresh(Request $request)
    {
        try {
            $this->updateMenuTree($request->list);
            return response(['status' => 'ok']);

        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    protected function buildMenuTree($menus, $parent_id = 0): string
    {
        $html = '';
        if (count($menus)) {
            $html = "<ol class='dd-list'>";

            foreach ($menus as $menu) {
                $name = collect($menu['translations'])->filter(function ($item) {
                        return $item['locale'] == config('app.locale');
                    })->first()['name'] ?? '';
                $html .= "<li class='dd-item' data-id='" . $menu['id'] . "'>";
                $html .= "<div class='dd-handle'>$name</div>";
                $html .= "<div class='dd-button'>";
                $html .= $this->permissions($menu['id']);
                $html .= "</div>";

                if (count($menu['children'])) {
                    $html .= $this->buildMenuTree($menu['children'], $menu['id']);
                }

                $html .= "</li>";
            }

            $html .= "</ol>";
        }
        return $html;

    }

    protected function updateMenuTree($menus, $parent_id = 0)
    {
        if (count($menus)) {
            foreach ($menus as $order => $menu) {
                $query = Menu::find($menu['id']);
                $query->update(['parent_id' => $parent_id]);
                $query->sort(++$order);

                if (array_key_exists('children', $menu)) {
                    $this->updateMenuTree($menu['children'], $menu['id']);
                }
            }
        }
    }

    protected function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('menus show')) {
            $result .= "<a href='" . route('backend.menus.show', ['menu' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('menus edit')) {
            $result .= "<a href='" . route('backend.menus.edit', ['menu' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('menus delete')) {
            $result .= "<a href='" . route('backend.menus.destroy', ['menu' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}

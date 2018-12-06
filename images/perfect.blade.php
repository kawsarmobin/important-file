<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Illuminate\Http\Request;
use App\Models\Admin\MiscForm;
use App\Http\Controllers\Controller;
use App\Models\Admin\MiscFormCategory;
use App\Http\Requests\Admin\CreateMiscFormRequest;
use App\Http\Requests\Admin\UpdateMiscFormRequest;

class MiscFormsController extends Controller
{
    public function store(CreateMiscFormRequest $request)
    {
        $miscForm = new MiscForm();

        if ($attach = $request->file('attach')) {
            $newName = str_random(10) . time() . '.' . $attach->getClientOriginalExtension();
            $attach->move('uploads\miscForm', $newName);
        }

        $miscForm->category_id = $request->category_id;
        $miscForm->form_name = $request->form_name;
        $miscForm->slug = str_slug($request->form_name);
        $miscForm->attach = $newName;

        if ($miscForm->save()) {
            Flash::success('Miscellaneous form create successfull.');
        }

        return redirect()->back();
    }


    public function update(UpdateMiscFormRequest $request, $id)
    {
        $miscForm = MiscForm::find($id);

        if ($attach = $request->file('attach')) {
          $newName = str_random(10) . time() . '.' . $attach->getClientOriginalExtension();
          $attach->move('uploads/miscForm', $miscForm->attach);
        }

        $miscForm->category_id = $request->category_id;
        $miscForm->form_name = $request->form_name;
        $miscForm->slug = str_slug($request->form_name);

        if ($miscForm->save()) {
            Flash::success('Miscellaneous form update successfull.');
        }

        return redirect()->route('miscForms.index');
    }
}

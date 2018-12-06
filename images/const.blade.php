{{-- *****Model***** --}}
<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MiscAcaCal extends Model
{
    use SoftDeletes;

    const ATTACH_UPLOAD_PATH = 'uploads/miscAcademicCalender';

    protected $fillable = ['attach'];

    protected $dates = ['deleted_at'];

    public function getAttachAttribute($value)
    {
        return asset(MiscAcaCal::ATTACH_UPLOAD_PATH . '/' . $value);
    }
}

// *****Controller*****
<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Illuminate\Http\Request;
use App\Models\Admin\MiscAcaCal;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateMiscAcaCalRequest;
use App\Http\Requests\Admin\UpdateMiscAcaCalRequest;

class MiscAcaCalsController extends Controller
{

    public function store(CreateMiscAcaCalRequest $request)
    {
        $miscAcaCal = new MiscAcaCal();

        if ($attach = $request->file('attach')) {
            $newName = str_random(10) . time() . '.' . $attach->getClientOriginalExtension();
            $attach->move(MiscAcaCal::ATTACH_UPLOAD_PATH, $newName);
        }

        $miscAcaCal->attach = $newName;

        if ($miscAcaCal->save()) {
            Flash::success('Miscellaneous academic calender create successfull.');
        }
        return redirect()->route('miscAcaCals.index');
    }


    public function update(UpdateMiscAcaCalRequest $request, $id)
    {
        $miscAcaCal = MiscAcaCal::find($id);

        if ($attach = $request->file('attach')) {
            $newName = str_random(10) . time() . '.' . $attach->getClientOriginalExtension();
            $attach->move(MiscAcaCal::ATTACH_UPLOAD_PATH, $miscAcaCal->attach);
        }

        if ($miscAcaCal->save()) {
            Flash::success('Miscellaneous academic calender update successfull.');
        }
        return redirect()->route('miscAcaCals.index');
    }


    public function destroy($id)
    {
        $miscAcaCal = MiscAcaCal::find($id);
        if ($miscAcaCal->delete()) {
            unlink(MiscAcaCal::ATTACH_UPLOAD_PATH . '/' . $miscAcaCal->getOriginal('attach'));
            Flash::success('Miscellaneous form delete successfull.');
        }
        return redirect()->back();
    }
}

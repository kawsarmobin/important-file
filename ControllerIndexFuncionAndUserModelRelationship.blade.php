{{-- Projects Controller --}}
public function __construct()
{
    $this->middleware('auth');
}

public function index()
{
    $projects = auth()->user()->projects;
    {{-- $projects = Project::where('owner_id', auth()->id())->get(); --}}
    return view('projects.index', compact('projects'));

    {{-- Different Style --}}
    return view('projects.index', [
        'projects' => auth()->user()->projects,
    ]);
}


{{-- User Model --}}
public function projects()
{
    return $this->hasMany(Project::class, 'owner_id');
}
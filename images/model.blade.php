public function getImageAttribute($value)
{
    return asset('uploads/profiles/'. $value);
}

*********************************************************************

public function getImageAttribute($value)
{
    if ($value) {
        return asset('uploads/profiles/'. $value);
    } else {
        return asset('admin/assets/images/users/no-image.jpg');
    }
}

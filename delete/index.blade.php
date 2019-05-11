<td>
    @include('includes._confirm_delete',[
    'action' => route('admin.dealers.destroy', $dealer->id),
    'id' => $dealer->id
    ])
</td>
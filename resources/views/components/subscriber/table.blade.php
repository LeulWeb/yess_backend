@props(['subscriberList'])

<table>
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse ($subscriberList as $item)
            <tr>    
                <td>{{$item->name}}</td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    Edit
                    Delete
                </td>
            </tr>
    @empty
        <p>Empty data</p>
    @endforelse
    </tbody>
</table>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Avatar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->product_code}}</td>
            <td>{{$item->product_name}}</td>
            <td>${{$item->product_price}}</td>
            <td><img src="/storage/files/{{$item->product_image}}" alt="" class="d-flex align-self-start rounded mr-3" style="width: 100px;"></td>
        </tr>
    @endforeach
    </tbody>
</table>
